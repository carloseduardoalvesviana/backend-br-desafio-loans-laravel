<?php

namespace App\Dtos;

/**
 * CustomerDto
 */
class CustomerDto
{
    public int $age;
    public string $cpf;
    public string $name;
    public float $income;
    public string $location;

    /**
     * __construct
     *
     * @param integer $age
     * @param string $cpf
     * @param string $name
     * @param float $income
     * @param string $location
     */
    public function __construct(
        int $age,
        string $cpf,
        string $name,
        float $income,
        string $location
    ) {
        $this->age = $age;
        $this->cpf = $cpf;
        $this->name = $name;
        $this->income = $income;
        $this->location = $location;
    }
}
