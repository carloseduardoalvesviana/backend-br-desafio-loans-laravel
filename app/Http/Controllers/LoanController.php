<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Dtos\CustomerDto;
use App\Http\Requests\LoanRequest;
use App\Services\LoanService;
use Illuminate\Http\JsonResponse;

/**
 * LoanController
 */
class LoanController extends Controller
{
    public $loanService;

    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    /**
     * Loans
     *
     * @param LoanRequest $loanRequest
     * @return JsonResponse
     */
    public function loans(LoanRequest $loanRequest): JsonResponse
    {
        $customerDto = new CustomerDto(
            age: $loanRequest->get('age'),
            cpf: $loanRequest->get('cpf'),
            name: $loanRequest->get('name'),
            income: $loanRequest->get('income'),
            location: $loanRequest->get('location')
        );

        $loans = $this->loanService->getLoans(customerDto: $customerDto);

        return response()->json($loans, 200);
    }
}
