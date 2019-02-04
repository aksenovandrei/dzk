<?php

namespace App\Http\Controllers;

use App\API\Yandex\YandexApiService;
use App\Product;
use App\Repositories\CertificateRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    const onlineCertificate = 1;

    protected $orderRepository;
    protected $customerRepository;
    protected $certificateRepository;

    public function __construct(OrderRepository $orderRepository, CustomerRepository $customerRepository, CertificateRepository $certificateRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;
        $this->certificateRepository = $certificateRepository;
    }

    public function makePayment(Request $request)
    {
        //todo валидацию данных
        $product = Product::where('id', $request->get('product_id'))->first();
        if (!$product) {
            return redirect()->back()->with(['error' => 'Такой услуги не существует']);
        }

        $metaData = $request->only('firstName', 'lastName', 'email', 'phone', 'address_id');
        $metaData['product_id'] = $product->id;

        $apiClient = new YandexApiService();
        $payment = $apiClient->createPayment($product->value, $product->title, $metaData);

        if (!$this->orderRepository->addOrder($payment, $product->id)) {
            return redirect()->back()->with(['error' => 'Что то пошло не так. Повторите попытку позже']);
        }

        $metaData['order_id'] = $payment->getId();
        if (!$this->customerRepository->addCustomer($metaData)) {
            return redirect()->back()->with(['error' => 'Что то пошло не так. Повторите попытку позже']);
        }

        return redirect($payment->getConfirmation()->confirmationUrl); // todo проверить на существование confirmationUrl
    }

    public function callbackFromYandex(Request $request)
    {

        $responseObject = $request->get('object');
        file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
            . '/sendMessage?chat_id=' . '350981322'
            . '&text=' . 'письмо из начала метода ' . $responseObject['id']
            . '&parse_mode=HTML');
        /*
            приходит ответ
            обновляем статус
            создаем код сертификата
            прыжок или сертификат?
            прыжок:
            отправляем письмо с кодом и инструкциями
            сертификат:
            онлайн или офлайн?
            -онлайн:
            генерируем катинку
            шлем письмо
            -оффлан
            отправляем пиьсмо с адресом и пином
         * */

        try {
            $this->orderRepository->updateOrderStatus($responseObject);
        } catch (\Exception $exception) {
            Log::info($exception, (array) $request);
        }

        $product = Product::where('id', $responseObject['metadata']['product_id'])->first();
        $productCategory = $product->productCategory_id;



        file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
            . '/sendMessage?chat_id=' . '350981322'
            . '&text=' . 'бла бла' . $productCategory
            . '&parse_mode=HTML');

        if (($responseObject['status'] == 'succeeded') && (!$this->certificateRepository->getCertificateByOrderId($responseObject['id']))){
            $data['order_id'] = $responseObject['id'];
            $certificateCode = $this->certificateRepository->createCertificate($data);
            file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
                . '/sendMessage?chat_id=' . '350981322'
                . '&text=' . 'письмо из первого ифа'
                . '&parse_mode=HTML');
            if ($responseObject['metadata']['address_id'] == self::onlineCertificate) {

                file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
            . '/sendMessage?chat_id=' . '350981322'
            . '&text=' . 'письмо с онлайн сертификатом'.$certificateCode . ' '  . $responseObject['id']
            . '&parse_mode=HTML');
            } else {
                file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
                    . '/sendMessage?chat_id=' . '350981322'
                    . '&text=' . 'письмо с оффлайн сертификатом'  . $responseObject['id']
                    . '&parse_mode=HTML');
            }


            /* какой то код по созданию картинки с сертификатом*/

        }
        file_get_contents('https://api.telegram.org/bot' . '561353685:AAFVHFTMIychcLnJzi1MziPwGYng3tYHlqI'
            . '/sendMessage?chat_id=' . '350981322'
            . '&text=' . 'письмо из метода'  . $responseObject['id']
            . '&parse_mode=HTML');


        http_response_code(200);

//        $certificateCode = $this->certificateRepository->createCertificate();
//
//        $customerData = $request->get('object')['metadata'];
//        $customerData['order_id'] = $this->orderRepository->getOrderByOrderId($request->get('object')['id'])->id;
//        Log::info($customerData);
//        $this->customerRepository->addCustomer($customerData);
//        if ($request->get('object')['status'] != 'succeeded') {
//
//        }
//        $request->session()->flash('status', 'Task was successful!');
//        $request->session()->put('error', 'value3');
//        $request->session()->put('status', 'value4');
//        Log::info($request->get('object')['status']);
//        Log::info($request);
    }
}
