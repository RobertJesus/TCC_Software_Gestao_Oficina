@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
    
<div class="register-box-body">
    <p class="login-box-msg">Cadastro do cliente</p>
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
            <a href="{{route('client.index')}}"> 
                <button type="submit" class="btn btn-info" >Voltar</button>
            </a>
        </div>
    <div class="pai">
    <table class="table table-hover">
        <tbody>
            <?php foreach($list as $client){ ?>
                <tr class="float-left">
                    <td>Nome:</td>
                    <td>{{$client->name}}</td>
                </tr>
                <tr class="float-left">
                    <td>Data de Nascimento:</td>
                    <td>{{date("d/m/Y", strtotime($client->date))}}</td>
                </tr>
                <tr class="float-left">
                    <td>CPF/CNPJ:</td>
                    <td>{{$client->record}}</td>
                </tr>
                <tr class="float-left">
                        <td>Sexo:</td>
                        <td>{{$client->sex}}</td>
                </tr>
                <tr class="float-left">
                        <td>Email:</td>
                        <td>{{$client->email}}</td>
                </tr>
                <tr class="float-left">
                        <td>Celular:</td>
                        <td>{{$client->phoneP}}</td>
                        <td>{{$client->phoneS}}</td>
                        <td>{{$client->tell}}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">MSG</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nova Mensagem</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('client.msg', $client->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Mensagem</label>
                                            <textarea class="form-control" id="message-text" name="msg"></textarea>
                                            <label class="col-form-label">Telefone</label>
                                            <input type="tel" class="form-control" name="num" value="55{{$client->phoneP}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Tem certeza que deseja enviar um SMS para o cliente?')">Enviar SMS</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                </tr>
                <tr class="float-left">
                    <td>Endereço:</td>
                    <td>{{$client->address}}, {{$client->numberHouse}} - {{$client->cep}} - {{$client->city}}/{{$client->state}} - {{$client->comp}}</td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>

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
    <!-- /.form-box -->
@stop