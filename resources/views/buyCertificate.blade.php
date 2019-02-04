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
@include('errors')
<div class="{{--flex-center position-ref full-height--}}">
    @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/admin') }}">Adminka</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Купить сертификат
        </div>

    </div>
        <div class="form" style="width: 25%">
            {!! Form::open([
            'url'	=> route('makePayment'),
            'method' => 'post',
            'class' => 'contact-form'
            ])!!}
            {{Form::select('product_id', $products)}}
            @if(isset($addresses))
            {{Form::select('address_id', $addresses)}}
            @endif
            {{Form::text('firstName', '', ['class' => 'form-control ', 'placeholder' => 'введите имя'])}}
            {{Form::text('lastName', '', ['class' => 'form-control ', 'placeholder' => 'введите фамилию'])}}
            {{Form::email('email', '', ['class' => 'form-control ', 'placeholder' => 'введите email'])}}
            {{Form::tel('phone', '', ['class' => 'form-control ', 'placeholder' => 'введите телефон'])}}
            {!!Form::button('Купить', ['class' => 'btn btn-the-salmon-dance-3 btn-success','type'=>'submit']) !!}
            {{Form::close()}}

        </div>

</div>
<script src="/js/admin.js"></script>
</body>
</html>