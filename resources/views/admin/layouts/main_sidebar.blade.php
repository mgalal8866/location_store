    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashborad') }}" class="brand-link">
            <img src="{{ URL::asset('assets/location.png')}}" alt="Pharm Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                    {{-- @can('menu products') --}}
                    {{-- <li class="nav-header">{{ __('tran.products') }}</li>
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
                                <a href="{{route('city') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> {{ __('tran.view') . __('tran.product') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('city') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> {{ __('tran.new') . __('tran.product') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- @endcan --}}

                    {{-- @can('menu stores') --}}
                    <li class="nav-header">{{ __('tran.stores') }}</li>
                    <li class="nav-item">
                        <a href="{{route('stores') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p> {{ __('tran.store') }} </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('branch') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Create {{ __('tran.branches')}} </p>
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('menu location') --}}
                    <li class="nav-header">{{ __('tran.location') }}</li>
                    <li class="nav-item">
                        <a href="{{route('city') }}" class="nav-link">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                {{__('tran.city')}}
                                {{-- <span class="right badge badge-danger">{{\App\models\Unit::count()}}</span> --}}
                            </p>
                        </a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('menu setting') --}}
                    <li class="nav-header">{{ __('tran.category') }}</li>
                    <li class="nav-item">
                        <a href="{{route('category') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <i class="nav-icon fas fa-album-collection"></i>
                            <p>
                                {{ __('tran.category') }}
                            </p>
                        </a>
                    </li>
                    {{-- @endcan --}}
                      {{-- @can('menu setting') --}}
                      <li class="nav-header">{{ __('tran.setting') }}</li>
                      <li class="nav-item">
                          <a href="{{route('settingapp') }}" class="nav-link">
                              <i class="nav-icon fas fa-cog"></i>
                              <p> {{ __('tran.settingapp') }} </p>
                          </a>
                      </li>
                    </li>
                      {{-- @endcan --}}
                    {{-- @can('menu setting') --}}
                    <li class="nav-header">{{ __('tran.notification') }}</li>
                        <li class="nav-item">
                            <a href="{{route('settingapp') }}" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>

                                <p> {{ __('tran.notification') }} </p>
                            </a>
                        </li>
                    </li>
                    {{-- @endcan --}}


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
