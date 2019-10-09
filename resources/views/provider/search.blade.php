@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Lista de Fornecedores</p>
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
    <a href="{{route('provider.pdf')}}">
        <button type="button" class="btn btn-success">
        Gerar PDF
        </button>
    </a>
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Filtro Avançado</button><br><br>
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
                    <form action="{{ route('provider.search') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="modal-body" style="width:350px;">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nome Fantasia:</label><br>
                            <input type="text" class="form-control" name="nameFant">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Razão Social:</label><br>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group" style="width:200px;">
                            <label for="message-text" class="col-form-label">CNPJ:</label>
                            <input type="name" class="form-control" name="record">
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
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Email</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Produtos</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <?php if(empty($list) == null){ ?>
                <?php foreach($list as $provider){ ?>
                    <tr>
                        <td>{{$provider->name}}</td>
                        <td>{{$provider->email}}</td>
                        <td>{{$provider->address}}</td>
                        <td>{{$provider->phoneP}}</td>
                        <td>
                            <a href="{{ route('provider.products', $provider->id)}}" classs="text-success"><i class="fa fa-barcode"></i></a>
                            <a href="{{ route('provider.pdfProdcts', $provider->id)}}" classs="text-success" style="padding-left:15px"><i class="fa fa-file-pdf-o"></i></a>
                        </td>
                        <td><a href="{{ route('provider.view', $provider->id)}}" class="text-success"><i class="fa fa-eye"></i></a></td>
                        <td><a href="{{ route('provider.edit', $provider->id)}}" class="text-success"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{ route('provider.destroy', $provider->id)}}" class="text-danger" onclick="return confirm('Tem certeza que deseja deletar este registro?')"><i class="fa fa-trash"></i></a></td>
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