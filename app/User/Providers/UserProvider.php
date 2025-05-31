<?php

namespace App\User\Providers;

use App\User\Application\UseCases\LoginUserUseCase;
use App\User\Application\UseCases\UpdateUserUseCase;
use App\User\Infrastructure\Persistence\Repository\UserRepository;
use App\User\Ports\Repository\UserRepositoryInterface;
use App\User\Ports\UseCases\LoginUserCaseInterface;
use App\User\Ports\UseCases\UpdateUserUseCaseInterface;
use Illuminate\Support\ServiceProvider;
use App\User\Ports\UseCases\CreateUserUseCaseInterface;
use App\User\Application\UseCases\CreateUserUseCase;

class UserProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CreateUserUseCaseInterface::class,
            CreateUserUseCase::class
        );
        $this->app->bind(
            LoginUserCaseInterface::class,
            LoginUserUseCase::class
        );
        $this->app->bind(
            UpdateUserUseCaseInterface::class,
            UpdateUserUseCase::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

    }
}
