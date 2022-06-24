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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top 5 Region Has Stores</h3>
                    <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                             <ul class="nav nav-pills flex-column">
                                @forelse ($topregions as $region )
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> {{  $region->city->name }} , {{  $region->name }}
                                    <span class="float-right text-success">
                                        <i class="fas fa-arrow-up text-sm"></i> {{$region->branch_count}}
                                        </span>
                                    </a>
                                </li>
                                @empty
                                <li class="nav-item">
                                No region has store
                                </li>
                                @endforelse
                            </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top 5 city Has Stores</h3>
                    <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                                @forelse ($topcity as $city )
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> {{  $city->name }}
                                    <span class="float-right text-success">
                                        <i class="fas fa-arrow-up text-sm"></i> {{$city->branch_count}}
                                        </span>
                                    </a>
                                </li>
                                @empty
                                <li class="nav-item">
                                No city has store
                                </li>
                                @endforelse

                        </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top 5 Store Has Branch</h3>
                    <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                             <ul class="nav nav-pills flex-column">
                                @forelse ($TopStoreHasBranch as $store )
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> {{  $store->name }}
                                    <span class="float-right text-success">
                                        <i class="fas fa-arrow-up text-sm"></i> {{$store->branch_count}}
                                        </span>
                                    </a>
                                </li>
                                @empty
                                <li class="nav-item">
                                No store has branch
                                </li>
                                @endforelse
                            </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top 5 Branch Has Product</h3>
                    <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                                @forelse ($TopBranchHasProduct as $branch )
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> {{  $branch->stores->name }} - {{ $branch->city->name }} - {{ $branch->region->name }}
                                    <span class="float-right text-success">
                                        <i class="fas fa-arrow-up text-sm"></i> {{$branch->product_count}}
                                        </span>
                                    </a>
                                </li>
                                @empty
                                <li class="nav-item">
                                    No Branch has product
                                </li>
                                @endforelse

                        </ul>
                </div>
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
