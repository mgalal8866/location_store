@extends('admin.layouts.masterdash')
@section('title')
Dashborad
@stop

@section('css')

@endsection

@section('page')
Dashborad
@endsection

@section('page1')

@endsection

@section('page2')
@endsection

@section('content')
<div class="row">
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ ($countcities)??0 }}</h3>

        <p>{{ __('tran.cities') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      {{-- <a href="{{ route('orders.view') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{($countusers)??0}}</h3>

        <p>{{ __('tran.users') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      {{-- <a href="{{ route('brand.view') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $countcategory }}</h3>

        <p>{{ __('tran.categories') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      {{-- <a href="{{ route('viewcategory') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>

  <!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$countstores}}</h3>

        <p>{{ __('tran.store') }}</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
    </div>
  </div>
  <!-- ./col -->

  @endsection

</div>

@section('js')

@endsection
