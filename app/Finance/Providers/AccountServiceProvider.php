<?php

namespace App\Finance\Providers;

use App\Finance\Application\UseCases\Account\CreateAccountUseCase;
use App\Finance\Application\UseCases\Account\ListAccountUseCase;
use App\Finance\Infrastructure\Persistence\Repository\AccountRepository;
use App\Finance\Ports\Repository\AccountRepositoryInterface;
use App\Finance\Ports\UseCases\Account\CreateAccountUseCaseInterface;
use App\Finance\Ports\UseCases\Account\ListAccountUseCaseInterface;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AccountRepositoryInterface::class,
            AccountRepository::class
        );
        $this->app->bind(
            CreateAccountUseCaseInterface::class,
            CreateAccountUseCase::class
        );
        $this->app->bind(
            ListAccountUseCaseInterface::class,
            ListAccountUseCase::class
        );
    }
}
