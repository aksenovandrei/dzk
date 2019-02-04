
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
                <th><a href="javascript:ajaxLoad('{{url('admin/customers?field=id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">ID </a>{!! request()->session()->get('field')=='id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/customers?field=product_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Имя</a>{!! request()->session()->get('field')=='product_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/customers?field=product_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Фамилия</a>{!! request()->session()->get('field')=='product_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th>Телефон</th>
                <th>Email</th>
                <th><a href="javascript:ajaxLoad('{{url('admin/customers?field=status&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Что купил</a>{!! request()->session()->get('field')=='status'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/customers?field=paymentDate&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Номер заказа</a>{!! request()->session()->get('field')=='paymentDate'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/customers?field=sum&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Номер сертификата</a>{!! request()->session()->get('field')=='sum'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}</th>
                <th>Создан</th>
                <th>Изменен</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($customers) && is_object($customers))
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->firstName ?? '-'}}</td>
                        <td>{{$customer->lastName ?? '-'}}</td>
                        <td>{{$customer->phone ?? '-'}}</td>
                        <td>{{$customer->email ?? '-'}}</td>
                        <td>{{$customer->product->title ?? '-'}}</td>
                        <td>{{$customer->order->id ?? '-'}}</td>
                        <td>{{$customer->certificate->code ?? '-'}}</td>
                        <td>{{$customer->updated_at}}</td>
                        <td>{{$customer->created_at}}</td>
                        <td>
                            <a href="{{route('customers.edit', $customer->id)}}" class="fa fa-pencil"></a>
                            {{Form::open(['route'=>['customers.destroy', $customer->id], 'method'=>'delete'])}}
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
        @if(isset($customers) && method_exists($customers, 'links'))
            {{$customers->links()}}
        @endif
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->





