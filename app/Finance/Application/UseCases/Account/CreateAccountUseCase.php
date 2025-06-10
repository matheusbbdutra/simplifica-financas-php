<?php

namespace App\Finance\Application\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\CreateAccountDTO;
use App\Finance\Application\Mappers\AccountMapper;
use App\Finance\Domain\Entities\Account;
use App\Finance\Ports\Repository\AccountRepositoryInterface;
use App\Finance\Ports\UseCases\Account\CreateAccountUseCaseInterface;

readonly class CreateAccountUseCase implements CreateAccountUseCaseInterface
{
    public function __construct(private AccountRepositoryInterface $repository)
    {
    }

    public function __invoke(CreateAccountDTO $dto): void
    {
        $account = AccountMapper::accountDomainFromCreateAccountDto($dto);
        $account = $this->repository->save($account);
    }
}
