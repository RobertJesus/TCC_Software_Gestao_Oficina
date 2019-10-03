@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')

    <div class="register-box-body">
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif
 
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
        <div class="row">
        <form action="{{ route('user.update') }}" method="post">
            {!! csrf_field() !!}
            <?php foreach($user as $users){ ?>
            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" name="name" class="form-control inputName" value="{{$users->name}}"
                        placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="office">Cargo</label><br>
                <select class="selectOffice" id="exampleFormControlSelect1" style="margin-top: 8px;">
                    <option value="1">Administrador</option>
                    <option value="2">Mecânico</option>
                </select>
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control inputEmail" value="{{$users->email}}"
                        placeholder="{{ trans('adminlte::adminlte.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong class="error">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control inputPassword"
                        placeholder="{{ trans('adminlte::adminlte.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong class="errorPassword">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control inputPassword"
                     placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block inputName">
                        <strong class="error">{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <?php } ?>
            <button type="submit"
                    class="btn btn-success"
            >{{ trans('adminlte::adminlte.register') }}</button>
        </form>
        </div>
    </div>
    <!-- /.form-box -->
@stop