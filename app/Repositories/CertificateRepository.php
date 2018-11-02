<?php

namespace App\Repositories;


use App\Certificate;

class CertificateRepository extends Repository
{
    public function __construct(Certificate $certificate)
    {
        $this->model = $certificate;
    }
    public function getAjax($request){
        $searchString = $request->session()->get('search');
        $certificates = $this->model->where('code', 'like', '%' . $request->session()->get('search') . '%')
            ->orWhereHas('product', function ($query) use ($searchString){
                $query->where('title', 'like', '%' . $searchString . '%');
            })
            ->orWhereHas('address', function ($query) use ($searchString){
                $query->where('address','like', '%' . $searchString . '%' );
            })
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))->paginate(10);
        return $certificates;
    }
    public function checkCode($code){
        $certificate = $this->model->where('code', $code)
                                   ->whereNotIn('status_id', [1, 4, 5])
                                   ->first();
        return $certificate ?? false;
    }

}