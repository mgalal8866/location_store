    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ URL::asset('assets/pharm.png')}}" alt="Pharm Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ URL::asset('assets/img/profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        <span class="right badge badge-success">
                            @if (!empty(Auth::user()->getRoleNames()))
                                @foreach (Auth::user()->getRoleNames() as $v)
                                    {{ $v }}
                                @endforeach
                            @endif
                        </span>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            {{-- <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                          </button>
                    </div>
                </div>
            </div> --}}

            <!-- Sidebar Menu -->



            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @can('menu product')
                    <li class="nav-header">{{ __('tran.products') }}</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.product') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('home') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> {{ __('tran.view') . __('tran.product') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('home') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> {{ __('tran.new') . __('tran.product') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    @can('menu category')
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas  fa-city"></i>
                            <p>
                                {{ __('tran.categories') }}
                                {{-- <span class="right badge badge-danger"> {{\App\models\category::count()}} </span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('menu unit')
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                {{__('tran.city')}}
                                {{-- <span class="right badge badge-danger">{{\App\models\Unit::count()}}</span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('menu order')
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.order') }}
                                {{-- <span class="right badge badge-danger"> {{\App\models\Order::count()}}  </span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('menu warehouse')
                    <li class="nav-header">{{ __('tran.warehouse') }}</li>
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.warehouse') }}
                                {{-- <span class="right badge badge-danger"> {{\App\models\Warehouse::count()}} </span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('menu account')
                    <li class="nav-header">{{ __('tran.accounts') }}</li>
                    @can('view admin')
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.adminaccount') }}
                                {{-- <span class="right badge badge-danger"> {{\App\models\User::count()}} </span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan
                    @endcan
                    @can('menu brand')
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.brandaccount') }}
                                {{-- <span class="right badge badge-danger"> {{\App\models\Brand::count()}} </span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('menu roles')
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.roles') }}
                                {{-- <span class="right badge badge-danger"> {{\App\models\Rolse::count()}} </span> --}}
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('menu setting')
                    <li class="nav-header">{{ __('tran.settings') }}</li>
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.maininfo') }}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('tran.maininfo') }}
                            </p>
                        </a>
                    </li>
                    @endcan

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
