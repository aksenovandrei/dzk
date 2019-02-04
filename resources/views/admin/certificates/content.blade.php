
@include('admin.errors')
<!-- Default box -->
<div class="box">
    <!-- /.box-header -->
    <div class="box-body table-responsive">
        <div class="row">
            <div class="form-group col-lg-1">
                <a href="{{route('certificates.create')}}" class="btn btn-success">Добавить</a>
            </div>
            <div class="col-sm-5">
                <div class="pull-right">
                    <div class="input-group">
                        <input class="form-control" id="search"
                               value="{{ request()->session()->get('search') }}"
                               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/certificates')}}?search='+this.value)"
                               placeholder="Search Title" name="search"
                               type="text" {{--id="search"--}}/>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary"
                                    onclick="ajaxLoad('{{url('admin/certificates')}}?search='+$('#search').val())">
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
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">ID </a>{!! request()->session()->get('field')=='id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=title&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Название </a>{!! request()->session()->get('field')=='title'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=code&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Код </a>{!! request()->session()->get('field')=='code'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=status_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Статус </a>{!! request()->session()->get('field')=='status_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=order_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Номер заказа </a>{!! request()->session()->get('field')=='order_id'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=expirationDate&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Срок годности </a>{!! request()->session()->get('field')=='expirationDate'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=address_id&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Адрес</a>{!! request()->session()->get('field')=='Адрес'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}</th>
                <th>Пин код ячейки</th>
                <th>Владелец</th>
                <th>Кто активировал</th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=created_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Создан </a>{!! request()->session()->get('field')=='created_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th><a href="javascript:ajaxLoad('{{url('admin/certificates?field=updated_at&sort='.(request()->session()->get('sort')=='asc'?'desc':'asc'))}}')">Изменен </a>{!! request()->session()->get('field')=='updated_at'?(request()->session()->get('sort')=='asc'?'&#9652;':'&#9662;'):''!!}
                </th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($certificates) && is_object($certificates))
                @foreach($certificates as $certificate)
                    <tr>
                        <td>{{$certificate->id}}</td>
                        <td><a href="{{route('certificates.edit', $certificate->id)}}">{{$certificate->product->title}}</a></td>
                        <td>{{$certificate->code}}</td>
                        <td>{{$certificate->status->title ?? 'нет статуса'}}</td>
                        <td>{{$certificate->order->id ?? '-'}}</td>
                        <td>{{$certificate->expirationDate}}</td>
                        <td>{{$certificate->address->address ?? 'не указан адрес'}}</td>
                        <td>{{$certificate->pinCode ?? '-'}}</td>
                        <td>{{$certificate->customerOwner->firstName ?? '-'}} {{$certificate->customerOwner->lastName ?? '-'}}</td>
                        <td>{{$certificate->customerActivator->firstName ?? '-'}} {{$certificate->customerActivator->lastName ?? '-'}}</td>
                        <td>{{$certificate->updated_at}}</td>
                        <td>{{$certificate->created_at}}</td>
                        <td>
                            <a href="{{route('certificates.edit', $certificate->id)}}" class="fa fa-pencil"></a>
                            {{Form::open(['route'=>['certificates.destroy', $certificate->id], 'method'=>'delete'])}}
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
        @if(isset($certificates) && method_exists($certificates, 'links'))
            {{$certificates->links()}}
        @endif
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->





