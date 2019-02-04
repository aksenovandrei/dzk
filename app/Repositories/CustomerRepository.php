<?php

namespace App\Repositories;


use App\Customer;

class CustomerRepository extends Repository
{
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }
    public function addCustomer($data)
    {
        $this->model->fill($data);
        return ($this->model->save());
    }
    public function getAjax($request){
        $searchString = $request->session()->get('search');
        $customers = $this->model/*->where('code', 'like', '%' . $request->session()->get('search') . '%')
            ->orWhereHas('product', function ($query) use ($searchString){
                $query->where('title', 'like', '%' . $searchString . '%');
            })
            ->orWhereHas('address', function ($query) use ($searchString){
                $query->where('address','like', '%' . $searchString . '%' );
            })*/
        ->orderBy($request->session()->get('field'), $request->session()->get('sort'))->paginate(10);
        return $customers;
    }
}