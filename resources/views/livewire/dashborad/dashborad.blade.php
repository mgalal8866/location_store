<div >
    @section('title')
    {{ getSettingsOf('site_title') }}
    @stop

    @section('page')
    Dashborad
    @endsection
    @section('page1')
    @endsection
    @section('page2')
    @endsection

    <div class="row">
    {{-- City --}}
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
    {{-- users --}}
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
            <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    {{-- categories --}}
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
            <a href="{{ route('category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    {{-- store --}}
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

    {{-- branch --}}
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
        <div class="inner">
            <h3>{{$countbranchs}}</h3>
            <p>{{ __('branch') }}</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{ route('stores') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @livewire('store.sastoreunaccept')
        </div>
        <div class="col-md-6">
        @livewire('store.storerejected')
        </div>
    </div>
</div>
