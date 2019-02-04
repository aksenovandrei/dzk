
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
                {{--<th><a href="javascript:ajaxLoad('{{url('admin/customers?field=id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">ID </a>{!! request()->session()->get('field')=='id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}--}}
                {{--</th>--}}
                {{--<th><a href="javascript:ajaxLoad('{{url('admin/customers?field=product_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Имя</a>{!! request()->session()->get('field')=='product_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}--}}
                {{--</th>--}}
                {{--<th><a href="javascript:ajaxLoad('{{url('admin/customers?field=product_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Фамилия</a>{!! request()->session()->get('field')=='product_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}--}}
                {{--</th>--}}
                {{--<th>Телефон</th>--}}
                {{--<th>Email</th>--}}
                {{--<th><a href="javascript:ajaxLoad('{{url('admin/customers?field=status&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Что купил</a>{!! request()->session()->get('field')=='status'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}--}}
                {{--</th>--}}
                {{--<th><a href="javascript:ajaxLoad('{{url('admin/customers?field=paymentDate&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Номер заказа</a>{!! request()->session()->get('field')=='paymentDate'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}--}}
                {{--</th>--}}
                {{--<th><a href="javascript:ajaxLoad('{{url('admin/customers?field=sum&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Номер сертификата</a>{!! request()->session()->get('field')=='sum'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}</th>--}}
                <th>ID</th>
                <th>Дата</th>
                <th>Интервал</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($days) && is_object($days))
                @foreach($days as $day)
                    <tr>
                        <td>{{$day->id}}</td>
                        <td>{{$day->date ?? '-'}}</td>
                        <td>{{$day->intervals->implode('interval', ', ')}}</td>

                        <td>
                            <a href="{{route('customers.edit', $day->id)}}" class="fa fa-pencil"></a>
                            {{Form::open(['route'=>['customers.destroy', $day->id], 'method'=>'delete'])}}
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
        @if(isset($days) && method_exists($days, 'links'))
            {{$days->links()}}
        @endif
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->





