@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Cadastrar Ordens de Serviço</p>
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
            <a href="{{route('service.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
        <div class="row" id="pai">
        <table class="table table-hover">
            <tbody>
                <?php foreach($order as $data){ ?>
                <tr class="float-left">
                    <td>Protocolo:</td>
                    <td>{{$data->protocol}}</td>
                </tr>
                <tr class="float-left">
                    <td>Nome Cliente:</td>
                    <td>{{$data->name}}</td>
                </tr>
                <tr class="float-left">
                    <td>Serviço:</td>
                    <td>{{$data->service}}</td>
                    <td>Prioridade:</td>
                    <td>{{$data->priority}}</td>
                    <td>Status:</td>
                    <td>{{$data->status}}</td>
                    <td>Responsavel:</td>
                    <td>{{$data->responsible}}</td>
                </tr>
                <tr class="float-left">
                    <td>Descrição:</td>
                    <td>
                        {{$data->description}}
                    </td>
                    <td>Data Execução:</td>
                    <td>
                        {{date("d/m/Y", strtotime($data->dateExec))}}
                    </td>
                </tr>
                <?php }?>
        </div><hr>
        <!--
        <button type="submit" class="btn btn-secondary" onclick="fechar_div();">Cadastrar Veiculo</button>
        <div class="pai" id="filho" style="display:none;">
        <p class="login-box-msg">Veiculos</p>
        <?php if(empty($id) == null){ ?>
            <form action="{{ route('service.store', $id)}}" method="post">
                {!! csrf_field() !!}
                <?php }?>
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-2">
                        <label>Quilometro Entrada</label>
                        <input type="text" name="km" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Média dia</label>
                        <input type="text" name="kmDay" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                       <label>Placa</label>
                       <input type="text" name="board" class="form-control">
                    </div>
                    <div class="form-group col-md-2">
                       <label>Marca</label>
                       <input type="text" name="brand" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
        </div>-->
    </div>
    <!-- /.form-box -->
    @section('post-script')
    <script>
        $('select[name=name]').change(function () {
            var id = $(this).val();
            $.get('get-auto/' + id, function (autos) {
                $('select[name=brand]').empty();
                $.each(autos, function (key, value) {
                    $('select[name=brand]').append('<option value=' + value.id + '>' + value.brand + '</option>');
                });
            });
        });
        
        function fechar_div(){
            var x = document.getElementById('filho');
            var y = document.getElementById('pai');
            if (x.style.display === 'none') {
                x.style.display = 'block';
                y.style.display = 'none';
            } else {
                x.style.display = 'none';
                y.style.display = 'block';
            }
        }
    </script>
@endsection
@stop