<?php

namespace App\Http\Controllers;

use App\Address;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    const JUMP_CERTIFICATE = 1;
    const JUMP = 2;
    public function index()
    {
        return view('welcome');
    }

    public function showCertificateOrderForm()
    {
        $productName = 'Купить Сертификат';
        $products = Product::where('productCategory_id', self::JUMP_CERTIFICATE)->pluck('title', 'id');

        $addresses = Address::pluck('address', 'id');
        return view('buyCertificate')->with(['products' => $products, 'addresses' => $addresses, 'productName' => $productName]);
    }

    public function showJumpOrderForm()
    {
        $productName = 'Купить Прыжок';
        $products = Product::where('productCategory_id', self::JUMP)->pluck('title', 'id');
        return view('buyCertificate')->with(['products' => $products, 'productName' => $productName]);
    }


}
