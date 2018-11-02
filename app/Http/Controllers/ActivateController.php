<?php

namespace App\Http\Controllers;

use App\Repositories\CertificateRepository;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class ActivateController extends Controller
{
    protected $certificateRepository;
    protected $customerRepository;

    public function __construct(CertificateRepository $certificateRepository, CustomerRepository $customerRepository)
    {
        $this->middleware('check.code');
        $this->certificateRepository = $certificateRepository;
        $this->customerRepository = $customerRepository;
    }
    public function showBookingForm(Request $request)
    {
        if (($request->get('certificate'))) {
            return view('front.activation')->with(['certificate' => $request->get('certificate')]);
        }
        return redirect('/')->with('status', 'Такого кода не существует');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd(1);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd(1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd(1);
    }
}
