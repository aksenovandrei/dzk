<?php

namespace App\API\Yandex;


use YandexCheckout\Client;

class YandexApiService
{
    protected $apiClient;

    public function __construct()
    {
        $apiClient = new Client();
        $apiClient->setAuth(config('yandex.shopId'), config('yandex.secretKey'));
        $this->apiClient = $apiClient;
    }

    public function createPayment($value, $productName, $metaData)
    {
        try {
            $payment = $this->apiClient->createPayment(
                array(
                    'amount' => array(
                        'value' => $value,
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'return_url' => 'https://www.kramatorskrodinabot.tk/?success=true',
                    ),
                    'description' => $productName,
                    'capture' => true,
                    'metadata' => (array) $metaData
                ),
                uniqid('', true)
            );
            return $payment;
        } catch (\Exception $exception) {
            return back()->with(['error' => 'Что то пошло не так. Повторите попытку позже']);
        }

    }
}