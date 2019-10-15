@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content')
<div class="card" style="margin-top:0px!important;">
    <?php if(empty($note) == null){ ?>
        <?php foreach($note as $data){ ?>
        <h5 class="card-header">Ocorrências - Código Ordem Serviço: {{$data->protocol}}</h5>
        <?php if(empty($list) == null){ ?>
            <?php foreach($list as $notes){ ?>
                <div class="card-body">
                    <div class="card" style="margin-top:0px!important;">
                    <h5 class="card-header">Data/Hora Ocorrência: {{date("d/m/Y ", strtotime($notes->created_at))}}</h5>
                        <form>
                            <fieldset disabled>
                                <table class="table">
                                    <tr class="form-group">
                                        <th>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Serviço: {{$data->service}}">
                                        </th>
                                        <th>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Funcionario: {{$data->responsible}}">
                                        </th>
                                        <th>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Funcionario: {{$data->priority}}">
                                        </th>
                                        <th>
                                            <input type="text" id="disabledTextInput" class="form-control" placeholder="Funcionario: {{$data->status}}">
                                        </th>
                                    </tr>
                                </table>
                                <table class="table">
                                    <tr class="form-group">
                                        <td>
                                            <label>Descrição:</label>
                                            <textarea type="text" id="disabledTextInput" class="form-control">{{$notes->note}}</textarea>
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
@stop