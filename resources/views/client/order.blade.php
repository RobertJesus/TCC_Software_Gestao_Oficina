@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Ordens de Serviço</p>
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
    <a href="{{route('client.index')}}"> 
        <button type="submit" class="btn btn-info" >Voltar</button>
    </a>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Filtro Avançado</button><br>
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
                        <form action="{{ route('service.orders') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <div class="form-group" style="width:350px;">
                                <label for="message-text" class="col-form-label">Protocolo:</label><br>
                                <input type="text" class="form-control" name="protocol">
                            </div>
                            <div class="form-group" style="width:200px;">
                                <label for="inputCity">Status</label>
                                <select name="status" class="form-control stateClient">
                                    <option></option>
                                    <option>Aberto</option>
                                    <option>Em andamento</option>
                                    <option>Fechado</option>
                                </select>
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
    <div class="pai">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Protocolo</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Status</th>
                    <th scope="col">Responsavel</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Observações</th>
                    <th scope="col">PDF</th>
                </tr>
            </thead>
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $data){ ?>
                    <tr>
                        <td>{{$data->protocol}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->service}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->responsible}}</td>
                        <td><a href="{{ route('service.edit', $data->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{ route('service.notes', $data->id)}}" class="text-info"><i class="fa fa-file-word-o"></i></td>
                        <td><a href="{{ route('service.pdf', $data->id)}}" class="text-warning"><i class="fa fa-file-pdf-o"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </div>
</div>
<!-- /.form-box -->
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
</script>
@stop