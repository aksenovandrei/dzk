<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Certificate;
use App\Product;
use App\Repositories\CertificateRepository;
use App\Status;
use Illuminate\Http\Request;

class CertificatesController extends AdminController
{
    public function __construct(CertificateRepository $certificateRepository)
    {
        parent::__construct();
        $this->certificateRepository = $certificateRepository;
        $this->template = 'admin.certificates.index';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));

        $request->session()->put('field', $request
            ->has('field') ? $request->get('field') : ($request->session()
            ->has('field') ? $request->session()->get('field') : 'id'));

        $request->session()->put('sort', $request
            ->has('sort') ? $request->get('sort') : ($request->session()
            ->has('sort') ? $request->session()->get('sort') : 'desc'));
        $this->title = 'Менеджер сертификатов';
        $certificates = $this->certificateRepository->getAjax($request);
        if ($request->ajax()) {
            return view('admin.certificates.content')->with('certificates', $certificates);
        } else {
            $this->content = view('admin.certificates.content')->with('certificates', $certificates);
            return $this->renderOutput();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = 'Добавление нового сертификата';

        $addresses = Address::pluck('address', 'id')->all();
        $statuses = Status::pluck('title', 'id')->all();
        $products = Product::pluck('title', 'id')->all();

        $this->content = view('admin.certificates.create')->with(['addresses' => $addresses, 'statuses' => $statuses, 'products' => $products]);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO +365 дней к сроку годности
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        $this->title = 'Редактирование сертификата - ' . $certificate->title . ', код: ' . $certificate->code;
        $addresses = array_reverse(Address::pluck('address', 'id')->all(), true);
        $statuses = Status::pluck('title', 'id')->all();
        $this->content = view('admin.certificates.create')
            ->with([
                'addresses' => $addresses,
                'statuses' => $statuses,
                'certificate' => $certificate
            ]);
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
