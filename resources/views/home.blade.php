@extends('adminlte::page')
@section('post-script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang-all.js"></script>
{!! $calendar->script() !!}
@stop
@section('title', 'Software para Gestão de Oficina')
@section('content_header')
<div class="row">
  <div class="col-md-12">
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
  </div>
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

  <div class="container">
    <div class="pai card" style="margin-top:0px!important;">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><br>
                  <h4>Agendamentos</h4>
                </div>
                <div class="panel-body" id="calendar">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- ./col -->
</div>
<!-- /.row -->
@stop