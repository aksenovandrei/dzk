{{--@extends(env('THEME').'.layouts.site')--}}

{{--@section('content')--}}
<div id="content-home" class="content group">
    <div class="hentry group">
        <form action="{{ route('login') }}" id="contact-form-contact-us" class="contact-form" method="post">
            {{csrf_field()}}
            <fieldset>
                <ul>
                    <li class="text-field">
                        <label for="login">
                            <span class="label">Name</span>
                            <br><span class="sublabel">This is the name</span><br>
                        </label>
                        <div class="input-pretend"><span class="add-on">
                                    <i class="icon-user"></i></span>
                            <input type="text" name="email" class="required" value="">
                        </div>
                        @if($errors->has('login'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                        @endif
                    </li>
                    <li class="text-field">
                        <label for="password">
                            <span class="label">Password</span>
                            <br><span class="sublabel">This is the password</span><br>
                        </label>
                        <div class="input-pretend"><span class="add-on">
                                    <i class="icon-user"></i></span>
                            <input type="password" name="password" class="required" value="">
                        </div>
                        @if($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                        @endif
                    </li>
                    <input type="submit" value="Отправить">
                </ul>
            </fieldset>
        </form>
    </div>
</div>
{{--@endsection--}}
