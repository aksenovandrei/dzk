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
            ->orWhereHas('status', function ($query) use ($searchString){
                $query->where('title','like', '%' . $searchString . '%' );
            })
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))->paginate(10);
        return $certificates;
    }

    public function createCertificate($data)
    {
        $this->model->fill($data);
        $this->model->code = $this->createUniqueCertificateCode();
//        $this->model->expirationData = date('Y');
        $this->model->save();

        return $this->model->code;
    }

    public function createUniqueCertificateCode() {
        $code = rand(1000000,9999999);
        if ($this->model->where('code', $code)->first()) {
            $this->createUniqueCertificateCode();
        }
        return $code;
    }

    public function getCertificateByOrderId($orderId)
    {
        return $this->model->where('order_id', $orderId)->first();
    }
}