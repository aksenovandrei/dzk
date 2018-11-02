<?php

namespace App\Repositories;


use App\Customer;

class CustomerRepository extends Repository
{
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }
    public function addCustomer()
    {
        
    }
}