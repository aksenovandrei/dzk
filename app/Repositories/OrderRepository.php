<?php

namespace App\Repositories;

use App\API\Yandex\YandexApiService;
use App\Order;
use Illuminate\Support\Facades\Redirect;

class OrderRepository extends Repository
{
    public function __construct(Order $order)
    {
        $this->model = $order;
    }
    public function getAjax($request){
        $searchString = $request->session()->get('search');
        $orders = $this->model/*->where('code', 'like', '%' . $request->session()->get('search') . '%')
            ->orWhereHas('product', function ($query) use ($searchString){
                $query->where('title', 'like', '%' . $searchString . '%');
            })
            ->orWhereHas('address', function ($query) use ($searchString){
                $query->where('address','like', '%' . $searchString . '%' );
            })*/
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))->paginate(10);
        return $orders;
    }

    public function addOrder($payment, $productId)
    {

        $data['order_id'] = $payment->getId();
        $data['status'] = $payment->getStatus();
        $data['sum'] = $payment->getAmount()->getValue();
        $data['currency'] = $payment->amount->getCurrency();
        $data['product_id'] = $productId;
        $data['created_at'] = $payment->getCreatedAt();
        $this->model->fill($data);
        return ($this->model->save());

    }

    public function updateOrderStatus($request)
    {
        $this->model = $this->getOrderByOrderId($request['id']);
        $this->model->status = $request['status'];
        return $this->model->save();
    }

    public function getOrderByOrderId($orderId)
    {
        return $this->model->where('order_id', $orderId)->first();
    }
}
//if($request->get('object')['status'] != 'succeeded') {
//    return false;
//}
//$this->orderRepository->updateOrder($request->get('object'));
//Log::info($request->get('object')['status']);
//Log::info(json_encode($request));