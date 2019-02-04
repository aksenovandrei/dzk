<?php

namespace App\Http\Controllers;

use App\API\Yandex\YandexApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function index()
    {
        $apiClient = new YandexApiService();
        $payment = $apiClient->createPayment();
        dd($payment, $payment->getId(), $payment->getStatus(), $payment->getAmount(), $payment->getAmount()->getValue(), $payment->amount->getCurrency());
        return $payment->getConfirmation()->confirmationUrl; // todo проверить на существование confirmationUrl
    }

    public function callback(Request $request)
    {

//        Log::info('yyy' . json_decode(file_get_contents("php://input")));
        try {
            file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
                . '/sendMessage?chat_id=' . '350981322'
                . '&text=' . 'yyy'
                . '&parse_mode=HTML');
        } catch (\Exception $exception) {
            Log::info('catch');
        }
//        file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
//            . '/sendMessage?chat_id=' . '350981322'
//            . '&text=' . 'yyy'
//            . '&parse_mode=HTML');
//        $source = file_get_contents('php://input');
//        $json = json_decode($source, true);



        Log::info($request);

//        if ($request->method() == 'post') {
//
//            Log::info('post');
//            foreach ($request->all() as $item) {
//                Log::info($item);
//            }
//            header("Status: 200");
//        } else {
//            Log::info('get');
//            foreach ($request->all() as $item) {
//                Log::info('get ' . $item);
//            }
//        }
    }
}
