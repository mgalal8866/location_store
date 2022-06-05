<div>
        <div class="row shadow p-3  rounded "   x-show="show" style=" width: 100%;
        height: 20rem; overflow: auto;">

            @foreach ( $products as $key => $item )
                <div class="col-sm-6">
                    <div class="card card-success card-outline ">
                        <div class="card-header text-center text-lg text-danger text-bold">
                            {{-- <span > {{ $products[$key]['name'] }}</span>
                            {{ $products[$key]['id']}} --}}

                            <livewire:components.edit-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'name'" :key="'products.55.name'"/>
                        </div>
                        <div class="card-body  ">
                            <div class="row">
                                <div class="col-md-4  " >
                                    <div class="mt-5">
                                        <img src="{{ $products[$key]['image']['img'] }}" class="w-100 rounded float-left "  >
                                      </div>
                                </div>
                                <div class="col-md-8 text-dark  " >
                                            <label class="text-bold ">{{ __('description')}} : </label>
                                            {{-- <span > {{ $products[$key]['description'] }}</span> --}}
                                            <livewire:components.edit-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'description'" :key="'products.{{$key}}.description'"/>

                                        <br>
                                            <label class="text-bold ">{{ __('price')}} : </label>
                                            {{-- <span > {{ $products[$key]['price'] }}</span> --}}
                                            <livewire:components.edit-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'price'" :key="'products.{{$key}}.price'"/>

                                        <br>
                                            <label class="text-bold ">{{ __('active')}} : </label>
                                            <span class="badge badge-{{ $products[$key]['activebadge'] }}" > {{ ($products[$key]['active']) == 0 ?  __('active')  : __('inactive') }}</span>
                                            {{-- <x-switch  wire:model="pp" id="A{{$key}}" :active=" $products[$key]['active']"/> --}}
                                        <br>
                                            <label class="text-bold ">{{ __('create')}} : </label>
                                            <span > {{ $products[$key]['create'] }}</span>
                                        <br>
                                            <label class="text-bold ">{{ __('start_date')}} : </label>
                                            {{-- <span>{{ $products[$key]['start_date'] }}</span> --}}
                                            <livewire:components.date-field :model="'\App\Models\products'" :entity="$products[$key]['product']" :field="'start_date'" :key="'products.{{$key}}.start_date'" :id="'products.{{$key}}.start_date'"/>

                                            <br>
                                            <label class="text-bold ">{{ __('expiry')}} : </label>
                                            <span > {{ $products[$key]['expiry_date'] }}  </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer card-gray-dark card-outline">
                             {{-- <a type="button" class="btn  btn-sm btn-outline-warning"><i class="fas fa-edit    "></i></i></a>
                             <a type="button" class="btn  btn-sm btn-outline-success">Active</a> --}}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
