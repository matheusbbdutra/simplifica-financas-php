<?php

namespace App\Finance\Adapter\Http\Controller;

use App\Finance\Adapter\Http\Requests\Account\CreateAccountRequest;
use App\Finance\Adapter\Http\Requests\Account\DeleteAccountRequest;
use App\Finance\Adapter\Http\Requests\Account\ShowAccountRequest;
use App\Finance\Adapter\Http\Requests\Account\UpdateAccountRequest;
use App\Finance\Ports\UseCases\Account\CreateAccountUseCaseInterface;
use App\Finance\Ports\UseCases\Account\DeleteAccountUseCaseInterface;
use App\Finance\Ports\UseCases\Account\ListAccountUseCaseInterface;
use App\Finance\Ports\UseCases\Account\ShowAccountUseCaseInterface;
use App\Finance\Ports\UseCases\Account\UpdateAccountUseCaseInterface;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function __construct(
        private readonly CreateAccountUseCaseInterface $accountUseCase,
        private readonly ListAccountUseCaseInterface $listAccountUseCase,
        private readonly UpdateAccountUseCaseInterface $updateAccountUseCase,
        private readonly DeleteAccountUseCaseInterface $deleteAccountUseCase,
        private readonly ShowAccountUseCaseInterface $showAccountUseCase
    ) {
    }

    public function create(CreateAccountRequest $request): JsonResponse
    {
        try {
            ($this->accountUseCase)($request->getDTO());

            return response()->json(
                ['message' => "Account created successfully."],
                Response::HTTP_CREATED
            );
        } catch (UniqueConstraintViolationException $e) {
            return response()->json(['error' => 'Account already exists.'], Response::HTTP_CONFLICT);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function list(): JsonResponse
    {
        return response()->json(($this->listAccountUseCase)());
    }

    public function update(UpdateAccountRequest $request): JsonResponse
    {
        try {
            ($this->updateAccountUseCase)($request->getDTO());

            return response()->json(['message' => 'Account updated successfully.'], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete(DeleteAccountRequest $request): JsonResponse
    {
        try {
            ($this->deleteAccountUseCase)($request->getDTO());

            return response()->json(['message' => 'Account deleted successfully.'], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(ShowAccountRequest $request): JsonResponse
    {
        try {
            $account = ($this->showAccountUseCase)($request->getDTO());

            return response()->json(['account' => $account], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
