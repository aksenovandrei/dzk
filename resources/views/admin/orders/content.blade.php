
@include('admin.errors')
<!-- Default box -->
<div class="box">
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <div class="row">
            <div class="form-group col-lg-1">
                <a href="{{route('orders.create')}}" class="btn btn-success">Добавить</a>
            </div>
            <div class="col-sm-5">
                <div class="pull-right">
                    <div class="input-group">
                        <input class="form-control" id="search"
                               value="{{ request()->session()->get('search') }}"
                               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/orders')}}?search='+this.value)"
                               placeholder="Search Title" name="search"
                               type="text" {{--id="search"--}}/>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary"
                                    onclick="ajaxLoad('{{url('admin/orders')}}?search='+$('#search').val())">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th><a href="javascript:ajaxLoad('{{url('admin/orders?field=id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">ID </a>{!! request()->session()->get('field')=='id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/orders?field=id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">ID заказа в Яндексе</a>{!! request()->session()->get('field')=='id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/orders?field=product_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Услуга</a>{!! request()->session()->get('field')=='product_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th>Номер сертификата</th>
                <th>Клиент</th>
                <th><a href="javascript:ajaxLoad('{{url('admin/orders?field=status&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Статус</a>{!! request()->session()->get('field')=='status'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/orders?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Дата создания</a>{!! request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/orders?field=sum&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Сумма оплаты</a>{!! request()->session()->get('field')=='sum'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}</th>
                <th>Промокод</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($orders) && is_object($orders))
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->product->title ?? 'услуга отсутствует'}}</td>
                        <td>{{$order->certificate->code ?? 'Сертификат отсутствует' }}</td>
                        <td>{{--<a href="{{ route('customers.show', $order->customer->id) }}">--}}{{$order->customer->firstName ?? ''}} {{$order->customer->lastName ?? ''}}{{--</a>--}}</td>
                        <td>{{$order->status ?? 'нет статуса'}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->updated_at}}</td>
                        <td></td>
                        <td>
                            <a href="{{route('orders.edit', $order->id)}}" class="fa fa-pencil"></a>
                            {{Form::open(['route'=>['orders.destroy', $order->id], 'method'=>'delete'])}}
                            <button onclick="return confirm('Вы уверены? Действие нельзя отменить!')" type="submit"
                                    class="delete">
                                <i class="fa fa-remove"></i>
                            </button>
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach

            @endif
            </tbody>
        </table>
        @if(isset($orders) && method_exists($orders, 'links'))
            {{$orders->links()}}
        @endif
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->





