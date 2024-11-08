<?php

namespace App\Services;

use App\Dtos\CustomerDto;
use App\Enums\LoanType;

/**
 * Class LoanService
 *
 * Serviço responsável por determinar as modalidades de empréstimo que um cliente tem acesso.
 */
class LoanService
{
    /**
     * Retorna um array com a lista de empréstimos que o cliente tem acesso.
     *
     * @param CustomerDto $customerDto
     * @return array
     */
    public function getLoans(CustomerDto $customerDto): array
    {
        $loans = [];

        if ($this->haveAccessToPersonalLoans(customerDto: $customerDto)) {
            $loan = LoanType::PERSONAL;
            $loans[] = ['type' => $loan->value, 'interest_rate' => $loan->interestRate()];
        }

        if ($this->haveAccessToConsignmentLoans(customerDto: $customerDto)) {
            $loan = LoanType::CONSIGNMENT;
            $loans[] = ['type' => $loan->value, 'interest_rate' => $loan->interestRate()];
        }

        if ($this->haveAccessToGuaranteedLoans(customerDto: $customerDto)) {
            $loan = LoanType::GUARANTEED;
            $loans[] = ['type' => $loan->value, 'interest_rate' => $loan->interestRate()];
        }

        $data = [
            'customer' => $customerDto->name,
            'loans' => $loans,
        ];

        return $data;
    }

    public function haveAccessToPersonalLoans(CustomerDto $customerDto): bool
    {
        return $customerDto->income <= 3000 || ($customerDto->income >= 3000 && $customerDto->income <= 5000 && $customerDto->age < 30 && $customerDto->location == 'SP');
    }

    public function haveAccessToConsignmentLoans(CustomerDto $customerDto): bool
    {
        return $customerDto->income >= 5000;
    }

    public function haveAccessToGuaranteedLoans(CustomerDto $customerDto): bool
    {
        return $customerDto->income <=  3000 || ($customerDto->income >= 3000 && $customerDto->income <= 5000 && $customerDto->age < 30 && $customerDto->location == 'SP');
    }
}
