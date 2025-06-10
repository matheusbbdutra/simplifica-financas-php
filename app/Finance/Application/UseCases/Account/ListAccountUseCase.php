<?php

namespace App\Finance\Application\UseCases\Account;

use App\Finance\Adapter\Http\DTOs\Account\AccountResponseDTO;
use App\Finance\Ports\Repository\AccountRepositoryInterface;
use App\Finance\Ports\UseCases\Account\ListAccountUseCaseInterface;

readonly class ListAccountUseCase implements ListAccountUseCaseInterface
{
    public function __construct(private AccountRepositoryInterface $repository)
    {
    }

    public function __invoke(): array
    {
        $user = auth()->user();
        if (!$user) {
            throw new \Exception('User not authenticated');
        }

        $accounts =  $this->repository->listByUserId($user->id);
        $serializer = array_map(
            fn($account) => new AccountResponseDTO(
                $account->getId(),
                $account->getName(),
                $account->getBalance(),
                $account->getUserId()
            ),
            $accounts
        );

        return $serializer;
    }
}
