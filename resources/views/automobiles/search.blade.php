@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Ordens de Serviço</p>
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
        <a href="{{route('automobiles.new')}}"> 
            <button type="submit" class="btn btn-success" >Novo</button>
        </a>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Filtro Avançado</button>
        <div class="pai">
            <div class="form-row">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filtro Avançado</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('automobiles.search') }}" method="post">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="form-group" style="width:300px;">
                                        <label for="message-text" class="col-form-label">Cliente:</label><br>
                                        <input type="text" class="form-control" name="client">
                                    </div>
                                    <div class="form-group" style="width:200px;">
                                        <label for="message-text" class="col-form-label">Placa:</label>
                                        <input type="text" class="form-control" name="board">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Filtrar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div><hr>
        </div>
        <div class="table-responsive" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Data Revisão</th>
                        <th scope="col">Visualizar</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <?php if(empty($auto) == null){ ?>
                    <?php foreach($auto as $data){ ?>
                        <tr>
                            <td>{{$data->client}}</td>
                            <td>{{$data->brand}}</td>
                            <td>{{$data->board}}</td>
                            <td>{{date("d/m/Y", strtotime($data->dateReview))}}</td>
                            <td><a href="{{ route('automobiles.view', $data->id)}}" class="text-info"><i class="fa fa-file-word-o"></i></a></td>
                            <td><a href="{{ route('automobiles.edit', $data->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                            <td><a href="{{ route('automobiles.destroy', $data->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja arquivar este registro?')"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php }?>
                <?php }?>
            </table>
        </div>
<!--
<script>
   $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>-->
@stop