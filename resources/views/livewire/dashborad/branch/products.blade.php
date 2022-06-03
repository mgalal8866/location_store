<div>

        <div class="row ">
            @foreach ( $products as $key => $item )
                <div class="col-sm-6">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4" >
                                    <img src="{{ $products[$key]['image']['img'] }}" class="w-100 rounded float-left"  >
                                </div>
                                <div class="col-md-8" >
                                            <label class="text-bold ">{{ __('name')}} : </label>
                                            <span > {{ $products[$key]['name'] }}</span>
                                        <br>
                                            <label class="text-bold ">{{ __('description')}} : </label>
                                            <span > {{ $products[$key]['description'] }}</span>
                                        <br>
                                            <label class="text-bold ">{{ __('price')}} : </label>
                                            <span > {{ $products[$key]['price'] }}</span>
                                        <br>
                                            <label class="text-bold ">{{ __('active')}} : </label>
                                            <span > {{ $products[$key]['active'] }}</span>
                                        <br>
                                            <label class="text-bold ">{{ __('create')}} : </label>
                                            <span > {{ $products[$key]['create'] }}</span>
                                        <br>
                                            <label class="text-bold ">{{ __('expiry')}} : </label>
                                            <span > {{ $products[$key]['start_date'] }}  . - . {{ $products[$key]['expiry_date'] }}</span>   <span > </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




</div>
