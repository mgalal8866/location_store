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
        <a href="{{ route('city') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
        <a href="{{ route('stores') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->

</div>
<div class="row">
    <div class="col-md-6">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">STORES Waiting For Accept
                        <span class="badge bg-danger">{{ !$branchnNotAccept->count() == 0 ??'' }}</span>
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                      </div>
                    </div>

                    <div class="card-body  table-responsive p-0">
                      <table class="table  table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Store</th>
                            <th>User</th>
                            <th style="width: 40px">City</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $branchnNotAccept as $item)
                                <tr>
                                    <td>1.</td>
                                    <td  class="text-success" >{{ $item->stores->name }}</td>
                                    <td>{{ $item->stores->user->name }}</td>
                                    <td>{{ $item->city->name }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                <!-- /.card -->
    </div>
</div>


    @endsection


@section('js')

@endsection
