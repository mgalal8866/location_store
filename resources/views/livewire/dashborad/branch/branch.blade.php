<div>
    @section('title')
    Branch
    @stop
    @section('page')
    Branch
    @endsection
    @section('page2')
    Branch
    @endsection
    <form enctype="multipart/form-data">
        <div class="row" >
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('maindetails')}}</h3>
                        <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" >
                            <div class="col-md-8" >
                                <div class="row" >
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="inputName">{{ __('minestore')}}</label>
                                            <input type="text" id="inputName" wire:model.defer='name' class="form-control @error('name') is-invalid @enderror" >
                                        </div>
                                    </div>
                                    <div class="col-md-3" >
                                        <div  wire:ignore class="form-group">
                                            <label for="selectactive1">{{ __('active') }}</label>
                                            <select id="selectactive1"  wire:model.defer='active' class="form-control pt-1   @error('active') is-invalid @enderror" >
                                                <option value="">Select active</option>
                                                <option value="0">{{ __('active') }}</option>
                                                <option value="1">{{ __('unactive') }}</option>
                                            </select>
                                            @error('active')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                        </div>

                                    </div>
                                    <div class="col-md-3" >
                                        <div class="form-group">
                                            <label for="inputnumberbranch">{{ __('numberbranch')}}</label>
                                            <input type="text" id="inputnumberbranch" wire:model.defer='numberbranch' class="form-control @error('numberbranch') is-invalid @enderror" >
                                            @error('numberbranch')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" >
                                        <div  wire:ignore class="form-group">
                                            <label for="selectcategory">{{ __('category') }}</label>
                                            <select id="selectcategory"  wire:model.defer='category' class="form-control pt-1   @error('category') is-invalid @enderror" >
                                                <option value="">Select category</option>
                                                @foreach ( $categorys as $category )
                                                    @if(!$category->parent_id)
                                                      <option value="{{$category->id}}" >{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6" >
                                        <div  wire:ignore class="form-group">
                                            <label for="selectsubcategory">{{ __('subcategory') }}</label>
                                            <select id="selectsubcategory"  wire:model.defer='subcategory' class="form-control pt-1   @error('subcategory') is-invalid @enderror" >
                                                <option value="">Select Sub category</option>
                                                @foreach ( $categorys as $subcategory )
                                                    <option value="{{$subcategory->id}}" >{{$subcategory->name}}</option>
                                               @endforeach
                                            </select>
                                        @error('category')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer bg-secondary">
                        <button class="btn btn-primary" wire:click.prevent='savestore()'> Save </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

        <div class="card card-danger card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                @if ($stores->branch->count() != 0)
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    @foreach($stores->branch as $branch)
                        <li class="nav-item">
                            <a class="nav-link {{$loop->index== 0?'active':''}}" id="branch-tab-{{$loop->index}}" data-toggle="pill" href="#branch{{$loop->index}}" role="tab" aria-controls="branch{{$loop->index}}" aria-selected="true">     <i class="fas fa-store"></i> Branch {{$loop->index + 1}}</a>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    @forelse($stores->branch as $branch)
                        <div  class="tab-pane fade  {{$loop->index == 0 ? 'active show  ' : ''}} " id="branch{{$loop->index}}" role="tabpanel" aria-labelledby="branch-tab-{{$loop->index}}">
                            <form id="F{{$loop->index}}"  enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8" >
                                                <div class="form-group">
                                                    <label for="inputDescription">{{ __('description')}}</label>
                                                    <textarea id="inputDescription" wire:model.defer='branchlist.{{$loop->index}}.description'    rows="5" class="form-control @error('branchlist.{{$loop->index}}.description') is-invalid @enderror" ></textarea>
                                                    @error('branchlist.{{$loop->index}}.description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                {{$branchlist[$loop->index]['image']}}
                                                <label for="inputName">{{ __('image')}}</label>
                                                <div class="card card-secondary card-outline" >
                                                    <div class="card-body box-profile">
                                                        <div class="text-center" x-data="{ imagePreview: '{{$branchlist[$loop->index]['image']}}' }">
                                                            <input wire:model.defer="branchlist.{{$loop->index}}.image" type="file" class="d-none" x-ref="image" x-on:change="
                                                                    reader = new FileReader();
                                                                    reader.onload = (event) => {
                                                                        imagePreview = event.target.result;
                                                                        document.getElementById('profileImage{{$loop->index}}').src = `${imagePreview}`;
                                                                    };
                                                                    reader.readAsDataURL($refs.image.files[0]);
                                                                " />
                                                            <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '{{$branchlist[$loop->index]['image']}}'" alt="Branch picture">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" >
                                                <div  wire:ignore class="form-group">
                                                    <label for="selectactive{{$loop->index}}">{{ __('active') }}</label>
                                                    <select id="selectactive{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.active' class="form-control pt-1   @error('branchlist.{{$loop->index}}.active') is-invalid @enderror" >
                                                        <option value="">Select active</option>
                                                        <option value="0">{{ __('active') }}</option>
                                                        <option value="1">{{ __('unactive') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div  wire:ignore class="form-group">
                                                    <label for="selectapproval{{$loop->index}}">{{ __('approval') }}</label>
                                                    <select id="selectapproval{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.approval' class="form-control pt-1   @error('branchlist.{{$loop->index}}.approval') is-invalid @enderror" >
                                                        <option value="">Select approval</option>
                                                        <option value="0">accept</option>
                                                        <option value="1">waiting</option>
                                                        <option value="2">unacceptable</option>
                                                    </select>
                                                    @error('branchlist.{{$loop->index}}.approval')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2" >

                                                <div  wire:ignore class="form-group">
                                                    <label for="selectactive{{$loop->index}}">{{ __('show_top') }}</label>
                                                    <select id="selecttop{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.top' class="form-control pt-1   @error('branchlist.{{$loop->index}}.top') is-invalid @enderror" >
                                                        <option value="1">{{ __('Star') }}</option>
                                                        <option value="0">{{ __('Normal') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2" >
                                                <div class="form-group">
                                                    <label for="numproduct{{$loop->index}}">{{ __('numproduct')  }}</label>
                                                    <input type="text" id="numproduct{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.numproduct' class="form-control @error('branchlist.{{$loop->index}}.numproduct') is-invalid @enderror" >
                                                    @error('branchlist.{{$loop->index}}.numproduct')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" >
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="opentime">{{__('opentime')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                        </div>
                                                        <x-timepicker wire:model.defer="branchlist.{{$loop->index}}.opentime" id="opentime" :error="'branchlist.{{$loop->index}}.opentime'" />
                                                        @error('branchlist.{{$loop->index}}.opentime')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="closetime">{{ __('closetime') }}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                        </div>
                                                        <x-timepicker wire:model.defer="branchlist.{{$loop->index}}.closetime" id="closetime" error="branchlist.{{$loop->index}}.closetime" />
                                                        @error('branchlist.{{$loop->index}}.closetime')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6" >
                                                <div  class="form-group">
                                                    <label for="branchlist.{{$loop->index}}.start_date">{{__('start_date')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <x-datepicker wire:model.defer="branchlist.{{$loop->index}}.start_date" id="branchlist.{{$loop->index}}.start_date" :error="'branchlist.{{$loop->index}}.start_date'" />
                                                        @error('branchlist.{{$loop->index}}.start_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="branchlist.{{$loop->index}}.expiry_date">{{__('expiry_date')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <x-datepicker wire:model.defer="branchlist.{{$loop->index}}.expiry_date" id="branchlist.{{$loop->index}}.expiry_date" :error="'branchlist.{{$loop->index}}.expiry_date'" />
                                                        @error('branchlist.{{$loop->index}}.expiry_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8" >
                                                <div class="form-group">
                                                    <label for="address{{$loop->index}}">{{ __('tran.address')  }}</label>
                                                    <input type="text" id="address{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.address' class="form-control @error('branchlist.{{$loop->index}}.address') is-invalid @enderror" >
                                                    @error('address{{$loop->index}}')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2" >
                                                <div  wire:ignore class="form-group">
                                                    <label for="selectcity{{$loop->index}}">{{ __('city') }}</label>
                                                    <select id="selectcity{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.city_id' class="form-control pt-1   @error('branchlist.{{$loop->index}}.') is-invalid @enderror" >
                                                        <option value="">Select City</option>
                                                        @foreach ( $citys as $city )
                                                        {{-- wire:click="showregions({{$city->id}},{{$loop->index}})" --}}
                                                            <option value="{{$city->id}}"> {{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('branchlist.{{$loop->index}}.city_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2" >
                                                <div wire:ignore  class="form-group">
                                                    <label for="selectregion{{$loop->index}}">{{ __('region') }}</label>
                                                    <select  id="selectregion{{$loop->index}}" class="form-control pt-1 @error('branchlist.{{$loop->index}}.region_id') is-invalid @enderror" wire:model.defer='branchlist.{{$loop->index}}.region_id'>
                                                        <option value="">Select Region</option>
                                                        @foreach ( $regions as $region )
                                                            <option value="{{$region->id}}" >{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @error('branchlist.{{$loop->index}}.region_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="phone{{$loop->index}}">{{ __('phone')  }}</label>
                                                    <input type="text" id="phone{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.phone' class="form-control @error('branchlist.{{$loop->index}}.phone') is-invalid @enderror" >
                                                    @error('branchlist.{{$loop->index}}.phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    {{$branchlist[$loop->index]['phonetwo']}}
                                                    <label for="phonetwo{{$loop->index}}">{{ __('phone2')  }}</label>
                                                    <input type="text" id="phonetwo{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.phonetwo' class="form-control @error('branchlist.{{$loop->index}}.phonetwo') is-invalid @enderror" >
                                                    @error('branchlist.{{$loop->index}}.phonetwo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="lat{{$loop->index}}">{{ __('lat')  }}</label>
                                                    <input type="text" id="lat{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.lat' class="form-control @error('branchlist.{{$loop->index}}.lat') is-invalid @enderror" >
                                                    @error('branchlist.{{$loop->index}}.lat')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="lng{{$loop->index}}">{{ __('lng')  }}</label>
                                                    <input type="text" id="lng{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.lng' class="form-control @error('branchlist.{{$loop->index}}.lng') is-invalid @enderror" >
                                                    @error('branchlist.{{$loop->index}}.lng')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mapouter">
                                            <div class="gmap_canvas">
                                                <iframe   width="100%"  height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{$branchlist[$loop->index]['lat']}},{{ $branchlist[$loop->index]['lng']  }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                <br><style>.mapouter{position:relative;text-align:right;height:500px; width:100%;}</style><a href="https://www.embedgooglemap.net">embed a google map in html</a>
                                                    <style>
                                                        .gmap_canvas {overflow:hidden;background:none!important;height:500px;  width:100%;}
                                                    </style>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-secondary">
                                        <button class="btn btn-success" wire:click.prevent='save({{$branch->id}},{{$loop->index}})'> Save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @empty
                    <div class="alert alert-warning">
                         <strong> No Branch!</strong>
                        </div>

                    @endforelse
                </div>
            </div>

        </div>


</div>


@push('styles')
<style>
    .profile-user-img:hover {
        background-color: blue;
        cursor: pointer;
    }
</style>
@endpush

    {{-- @push('alpine-plugins')
    <!-- Alpine Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    @endpush --}}
