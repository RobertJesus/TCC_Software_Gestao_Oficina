@extends('adminlte::page')

@section('title', 'Software para Gestão de Oficina')

@section('content_header')
<div class="row">
  @if(session('success'))
    <div class="col-lg-12">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="alert-link">{{session('success')}} {{ Auth::user()->name }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif
    <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$user}}</h3>
        <p>Usuarios Registrados</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{route('user.index')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$client}}</h3>

        <p>Clientes Registrados</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-person"></i>
      </div>
      <a href="{{route('client.index')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$product}}<sup style="font-size: 20px"></sup></h3>

        <p>Produtos Registrados</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-barcode"></i>
      </div>
      <a href="{{route('product.index')}}" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$orders}}</h3>

        <p>Ordens de Serviço</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<script>
$('.alert').alert('close')
</script>
@stop