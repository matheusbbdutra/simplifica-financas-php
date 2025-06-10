<?php

namespace App\Finance\Adapter\Http\Controller;

use App\Finance\Adapter\Http\Requests\Account\CreateAccountRequest;
use App\Finance\Ports\UseCases\Account\CreateAccountUseCaseInterface;
use App\Finance\Ports\UseCases\Account\ListAccountUseCaseInterface;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function __construct(
        private readonly CreateAccountUseCaseInterface $accountUseCase,
        private readonly ListAccountUseCaseInterface $listAccountUseCase,
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
}

