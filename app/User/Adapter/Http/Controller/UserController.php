<?php

namespace App\User\Adapter\Http\Controller;

use App\User\Adapter\Http\Requests\CreateUserRequest;
use App\User\Adapter\Http\Requests\LoginUserRequest;
use App\User\Adapter\Http\Requests\UpdateUserRequest;
use App\User\Ports\UseCases\CreateUserUseCaseInterface;
use App\User\Ports\UseCases\LoginUserCaseInterface;
use App\User\Ports\UseCases\UpdateUserUseCaseInterface;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        private readonly CreateUserUseCaseInterface $createUserUseCase,
        private readonly LoginUserCaseInterface $loginUserUseCase,
        private readonly UpdateUserUseCaseInterface $updateUserUseCase
    ) {
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        try {
            $auth = ($this->loginUserUseCase)($request->getDTO());

            return response()->json([
                'message' => 'Login successful.',
                'user' => $auth['user'],
                'token' => $auth['token'],
            ], Response::HTTP_OK);
        } catch (\DomainException $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function create(CreateUserRequest $request): JsonResponse
    {
        try {
            $user = ($this->createUserUseCase)($request->getDTO());

            return response()->json(
                ['message' => "User {$user->getName()} created successfully."],
                Response::HTTP_CREATED
            );
        } catch (UniqueConstraintViolationException $e) {
            return response()->json(['error' => 'User already exists.'], Response::HTTP_CONFLICT);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(UpdateUserRequest $request): JsonResponse
    {
        try {
            $user = ($this->updateUserUseCase)($request->getDTO());

            return response()->json(
                ['message' => "User {$user->getName()} updated successfully."],
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
