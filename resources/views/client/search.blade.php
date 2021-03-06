@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Clientes</p>
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
    <a href="{{route('client.pdf')}}">
        <button type="button" class="btn btn-success">
        Gerar PDF
        </button>
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
                        <form action="{{ route('client.search') }}" method="post">
                        {!! csrf_field() !!}
                            <div class="modal-body">
                                <div class="form-group" style="width:300px;">
                                    <label for="message-text" class="col-form-label">Nome:</label><br>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group" style="width:200px;">
                                    <label for="message-text" class="col-form-label">CPF/CNPJ</label><br>
                                    <input type="text" class="form-control" name="record">
                                </div>
                                <div class="form-group" style="width:300px;">
                                    <label for="message-text" class="col-form-label">Status</label><br><br>
                                    <select class="selectOffice" name="status" id="exampleFormControlSelect1">
                                        <option></option>
                                        <option value="1">Ativo</option>
                                        <option value="2">Arquivado</option>
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
    <div class="table-responsive" style="width: 100%;margin-bottom : .5em;table-layout: fixed;text-align: center;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">OS</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $client){ ?>
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->phoneP}}</td>
                        <td><a href="{{ route('client.view', $client->id)}}" class="text-info"><i class="fa fa-file-word-o"></i></a></td>
                        <td><a href="{{ route('client.edit', $client->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{ route('client.orders', $client->id)}}" class="text-warning"><i class="fa fa-file-text-o"></i></a></td>
                        <td><a href="{{ route('client.toFile', $client->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja arquiva este registro?')"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="pai">
    {{ $list->links() }}
    </div>
</div>
<!-- /.form-box -->
<!--<script>
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