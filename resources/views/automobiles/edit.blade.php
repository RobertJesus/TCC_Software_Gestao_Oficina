@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Dados do Veiculo</p>
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
        <div class="form-group">
            <a href="{{route('automobiles.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
    <div class="pai">
    <?php foreach($auto as $data){ ?>
        <form action="{{ route('automobiles.update', $data->id)}}" method="post" onsubmit="return valida_form_auto(this)">
        {!! csrf_field() !!}
            <fieldset disabled>
                <div class="form-row">
                    <div class="form-group col-md-4 has-feedback {{$errors->has('cidade') ? 'has-error' : '' }}">
                        <label for="inputCity">Cliente</label>
                        <input type="text" id="disabledTextInput" name="client" class="form-control" placeholder="{{$data->client}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong class="error">{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                </fieldset>
                <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>Quilometro Entrada</label>
                            <input type="text" name="km" id="km" class="form-control" value="{{$data->km}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Média dia</label>
                            <input type="text" name="kmDay" id="kmDay" class="form-control" value="{{$data->kmDay}}" onblur="calcular()">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Proxima Revisão</label>
                            <input type="date" name="dateReview" id="dateReview" value="{{$data->dataReview}}" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Placa</label>
                            <input type="text" name="board" id="board" value="{{$data->board}}"class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Marca</label>
                            <input type="text" name="brand" id="brand" value="{{$data->brand}}"class="form-control">
                        </div>
                </div>    
                    <button type="submit" class="btn btn-success">Salvar</button>
        </form>
        <?php }?>
</div>
    <!-- /.form-box -->
    @section('post-script')
<script >
    function calcular(){
        var km, kmDay, revisao, total, cont, atual;
        total = 0;
        cont = 0;
        km = Number(document.getElementById('km').value);
        kmDay = Number(document.getElementById('kmDay').value);
        revisao = km + 1000;
        total = revisao / kmDay;
        total = Math.round(total);
        
        var hoje = new Date();
        var dataVenc = new Date(hoje.getTime() + (total * 24 * 60 * 60 * 1000));
    
        alert('A proxima revisão sera proximo ao dia ' +  dataVenc.getDate() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getFullYear());
        //document.getElementById('dateRe').value = + dataVenc.getFullYear() + "/" + (dataVenc.getMonth() + 1) + "/" + dataVenc.getDate();
        return;
    }
        $('select[name=cliente]').change(function () {
            var idclient = $(this).val();
            $.get('get-client/' + idclient, function (clients) {
                $('select[name=record]').empty();
                $('select[name=email]').empty();
                $.each(clients, function (key, value) {
                    $('select[name=record]').append('<option value=' + value.id + '>' + value.record + '</option>');
                    $('select[name=email]').append('<option value=' + value.id + '>' + value.email + '</option>');
                });
            });
        });
    </script>
@endsection
@stop