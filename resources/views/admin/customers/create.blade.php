@include('admin.errors')
{!! Form::open([
    'url'	=> (isset($certificate->id)) ? route('certificates.update', ['id' => $certificate->id]) : route('certificates.store'),
    'method' => 'post',
    'class' => 'contact-form'
])!!}
<!-- Default box -->
<div class="box">
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Выберите услугу</label>
                {{Form::select('product_id',
                    $products,
                    $certificate->product_id ?? 1,
                    ['class' => 'form-control select2'])
                }}
            </div>
            <div class="form-group">
                <label>Адрес</label>
                {{Form::select('address_id',
                    $addresses,
                    $certificate->address_id ?? 1,
                    ['class' => 'form-control select2'])
                }}
            </div>
            <div class="form-group">
                <label>Пин код</label>
                {{Form::number('pinCode', $certificate->pinCode ?? old('pinCode'),
                    ['class' => 'form-control select2'])
                }}
            </div>
            @if(isset($certificate->status_id))
                <div class="form-group">
                    <label>Статус</label>
                    {{Form::select('status_id',
                        $statuses,
                        $certificate->status_id ?? 1,
                        ['class' => 'form-control select2'])
                    }}
                </div>
        @endif
        <!-- Date -->
            <div class="form-group">
                <label>Дата:</label>

                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{Form::text('publish_date', $article->publish_date ?? old('publish_date'), ['id' => 'datepicker', 'class' => 'form-control pull-right'])}}
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <!-- /.box-body -->

    </div>
    <div class="box-body">
        @if(isset($certificate->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        {!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3 btn-success','type'=>'submit']) !!}
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->
{{Form::close()}}
