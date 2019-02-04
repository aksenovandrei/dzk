<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/admin.css">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
<div class="form" style="width: 25%">
    {!! Form::open([
    'url'	=> route('activation.store'),
    'method' => 'post',
    'class' => 'contact-form'
    ])!!}
    {{Form::text('code', $certificate->code ?? 'Введите код', ['class' => 'form-control pull-left col-md-3', 'placeholder' => 'введите код сертификата'])}}
    <select name="test1">
    @foreach($availableDays as $availableDay)

        @foreach($availableDay->intervals as $interval)
{{--                {{dd($interval)}}--}}
            <option name="test">{{$availableDay->date . ' Время: ' . $interval->interval . ' Свободно мест: ' . $interval->pivot->numberOfAvailableSeats}}</option>
        @endforeach
    @endforeach
    </select>
    {{Form::text('first_name', '', ['class' => 'form-control ', 'placeholder' => 'введите имя'])}}
    {{Form::text('last_name', '', ['class' => 'form-control ', 'placeholder' => 'введите фамилию'])}}
    {{Form::email('email', '', ['class' => 'form-control ', 'placeholder' => 'введите email'])}}
    {{Form::tel('phone', '', ['class' => 'form-control ', 'placeholder' => 'введите телефон'])}}
    {{Form::date('date', '', ['id' => 'datepicker', 'class' => 'form-control pull-right'])}}
    {!!Form::button('Активировать', ['class' => 'btn btn-the-salmon-dance-3 btn-success','type'=>'submit']) !!}
    {{Form::close()}}

</div>
<script src="/js/admin.js"></script>
</body>
</html>