<div>
    @include('livewire.dashborad.branch.product-details')
        <div class="row shadow p-3 rounded"  x-show="show" style=" width: 100%; height: 20rem; overflow: auto;">
          {{-- <div wire:click="$refresh" >
            <i class="fa fa-edit mr-2"></i>
            {{-- <a href="">

            </a>
          </div> --}}
            @foreach ( $products as $key => $item )
                <div class="col-sm-6">
                    <div class="card card-success card-outline ">
                        <div class="card-header text-center text-lg text-danger text-bold">
                             <livewire:components.edit-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'name'" :key="'products.'.$key.'.name'"/>
                        </div>
                        <div class="card-body  ">
                            <div class="row">
                                <div class="col-md-4  " >
                                    <div class="mt-5">
                                        <img wire:model=""src="{{ $products[$key]['image']['img1'] }}" class="w-100 rounded float-left "  >
                                      </div>
                                </div>
                                <div class="col-md-8 text-dark  " >
                                        <div class="form-group mb-0 ">
                                            <label class="text-bold ">{{ __('description')}} : </label>
                                            <span > {{ $products[$key]['description'] }}</span>
                                            {{-- <livewire:components.edit-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'description'" :key="'products.'.$key.'.description'"/> --}}
                                        </div>
                                        <div class="form-group mb-0 ">
                                            <label class="text-bold ">{{ __('price')}} : </label>
                                            <span > {{ $products[$key]['price'] }}</span>
                                            {{-- <livewire:components.edit-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'price'" :key="'products.'.$key.'.price'"/> --}}
                                        </div>
                                        <div class="form-group mb-0 ">
                                            <label class="text-bold ">{{ __('active')}} : </label>

                                            <span class="badge badge-{{ $products[$key]['activebadge'] }} " > {{ ($products[$key]['active']) == 0 ?  __('active')  : __('inactive') }}</span>
                                        </div>
                                        <div class="form-group mb-0 ">
                                            <label class="text-bold ">{{ __('create')}} : </label>
                                            <span > {{ $products[$key]['create'] }}</span>
                                        </div>
                                        <div class="form-group mb-0 ">
                                            <label class="text-bold ">{{ __('start_date')}} : </label>
                                             {{-- <livewire:components.datepk :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'start_date'" :key="'products.'.$key.'.start_date'"  :inid="'products.'.$key.'.start_date'"/> --}}
                                             <span > {{ $products[$key]['start_date'] }}</span>
                                            {{-- <livewire:components.date-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'start_date'" :key="'products.'.$key.'.start_date'"  :inid="'products.'.$key.'.start_date'"/> --}}
                                        </div>
                                        <div class="form-group mb-0 ">
                                            <label class="text-bold ">{{ __('expiry')}} : </label>
                                            <span > {{ $products[$key]['expiry_date'] }}</span>
                                            {{-- <livewire:components.date-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'expiry_date'" :key="'products.'.$key.'.expiry_date'" :inid="'products.'.$key.'.expiry_date'"/> --}}
                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer card-gray-dark card-outline">
                             {{-- <a type="button" class="btn  btn-sm btn-outline-warning"><i class="fas fa-edit    "></i></i></a>--}}
                             <button data-toggle="modal" data-target="#updateModal"  wire:click="edit({{$key}})" class="btn btn-primary btn-sm">Edit</button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
