<div>
    @section('title')
    {{__('store')}}
    @stop
    @section('page')
    {{__('store')}}
    @endsection
    @section('page2')
    {{__('store')}}
    @endsection

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-end mb-2">

                    <div class="btn-group">
                        <button wire:click="filterStoreByStatus" type="button" class="btn btn-info ">
                            <span class="mr-1">{{__('all')}}</span>
                            <span class="badge badge-pill badge-info">{{$storeall}}</span>
                        </button>

                        <button wire:click="filterStoreByStatus('0')" type="button" class="btn btn-info">
                            <span class="mr-1">{{__('active')}}</span>
                            <span class="badge badge-pill badge-success">{{$storeactive}}</span>
                        </button>

                        <button wire:click="filterStoreByStatus('1')" type="button" class="btn  btn-info">
                            <span class="mr-1">{{__('desactive')}}</span>
                            <span class="badge badge-pill badge-danger">{{$storedisactive}}</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
        {{-- @include('livewire.admin.category.createcategory')
        @include('livewire.admin.category.deletecategory')
        @include('livewire.admin.category.editcategory') --}}
        <div class="card">
            <div class="card-header" >

                <div  class="d-flex justify-content-between  mb-2">
                    <div>
                        <label  for="pages">{{__('show')}}</label>
                        <select class="form-select" wire:model="pages" name="pages" id="pages">
                            <option value="10" > 10 </option>
                            <option value="25" > 25 </option>
                            <option value="50" > 50 </option>
                            <option value="100" > 100 </option>
                            <option value="200" > 200 </option>
                        </select>
                    </div>
                    <div>
                        <x-search-input wire:model="searchTerm" />
                    </div>
                </div>

            </div>

            <div class="card-body p-0 table-responsive">
                <div  wire:loading  wire:target='filterStoreByStatus'>
                    <x-load></x-load>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                {{ (__('name')) }}
                                <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer;">
                                    <i class="fa fa-arrow-up {{ $sortColumnName === 'name' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                    <i class="fa fa-arrow-down {{ $sortColumnName === 'name' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                </span>
                            </th>
                            <th>{{ (__('user')) }}</th>
                            <th>{{ (__('category')) }}</th>
                            {{-- <th>{{ (__('info')) }}</th> --}}
                            <th>Num branch</th>
                            <th>{{ (__('status')) }}</th>
                            <th width="240">{{ (__('action')) }}</th>
                        </tr>
                    </thead>
                    <tbody wire:loading.class="text-muted">
                        @forelse ( $stores  as $store )
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>
                                    {{$store->name}}
                                    <br>
                                    <small>
                                        {{__('created')}}  {{$store->created_at->format('Y-m-d')}}
                                    </small>
                                </td>
                                <td>{{$store->user->name}}</td>
                                <td>{{$store->category->name}}</td>

                                 {{-- <td>

                                        @for ($i = 0; $i < 5; $i++)
                                            @if (floor($store->rating) - $i >= 1)
                                                <i class="fas fa-star text-warning fa-1x"> </i>
                                            @elseif ($store->rating - $i > 0)
                                                <i class="fas fa-star-half-alt text-warning fa-1x"> /i>
                                            @else
                                                <i class="far fa-star text-warning fa-1x">  </i>
                                         @endif
                                        @endfor
                                </td> --}}
                                <td>{{$store->branch->count()}}</td>
                                {{-- <td>{!!$store->active!!}</td> --}}
                                <td><span class="badge badge-pill badge-{{ $store->active_badge }} ">{{ $store->active }}</span></td>

                                <td>

                                      {{-- @livewire('active', ['model' => $store, 'field' => 'active'], key($store->id)) --}}
                                        {{-- <input wire:model='pages' data-id="{{$store->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="ON" data-off="OFF" {{ $store->active ? 'checked' : '' }}> --}}
                                        {{-- <a href="" wire:click="$refresh">
                                            <i class="fa fa-edit mr-2"></i>
                                        </a> --}}
                                    <a class="btn btn-info  btn-sm"  href="{{route('branch',['slug' => $store->slug]) }}"><i class="far fa-eye"></i>{{ __('show') }}</a>
                                    <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i>{{ __('tran.delete') }}</button>
                                </td>
                            </tr>
                        @empty
                            {{-- <tr> --}}
                                <td colspan="8" class="text-center text-danger"> No Data</td>
                            {{-- </tr> --}}
                        @endforelse
                    </tbody>
                </table>

            </div>
            <div class="card-footer" >
                <div class="d-flex justify-content-center">
                    {!! $stores->links() !!}
                </div>
            </div>
        </div>



</div>
