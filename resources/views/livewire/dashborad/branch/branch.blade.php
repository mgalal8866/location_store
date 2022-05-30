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
        @csrf
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
                                <div class="form-group">
                                    <label for="inputName">{{ __('minestore')}}*</label>
                                    <input type="text" id="inputName" wire:model.defer='name' class="form-control @error('name') is-invalid @enderror" >
                                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">{{ __('tran.description')}}</label>
                                    <textarea id="inputDescription" class="form-control @error('description') is-invalid @enderror"  wire:model.defer='description'  rows="4"></textarea>
                                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <!-- Profile Image -->
                                <div class="card card-secondary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center" x-data="{ imagePreview: '{{ URL::asset('assets') .'/'. config('sedtting_var.images.logo')}}' }">
                                            <input wire:model.defer="image" type="file" class="d-none" x-ref="image" x-on:change="
                                                    reader = new FileReader();
                                                    reader.onload = (event) => {
                                                        imagePreview = event.target.result;
                                                        document.getElementById('profileImage').src = `${imagePreview}`;
                                                    };
                                                    reader.readAsDataURL($refs.image.files[0]);
                                                " />
                                            <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '{{ URL::asset('assets') .'/'. config('sedtting_var.images.logo')}}' " alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center" wire:model.defer='name'></h3>

                                        <p class="text-muted text-center" wire:model.defer='name'>Admin</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{-- <div class="form-group"> --}}
                                    {{-- <img alt="IMAGE" class="brand-image img-circle elevation-3" style="opacity: .8" src="{{ URL::asset('assets') .'/'. config('setting_var.images.logo')}}"> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>

        <div class="card card-danger card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    @foreach($stores->branch as $branch)
                        <li class="nav-item">
                            <a class="nav-link {{$loop->index== 0?'active':''}}" id="branch-tab-{{$loop->index}}" data-toggle="pill" href="#branch{{$loop->index}}" role="tab" aria-controls="branch{{$loop->index}}" aria-selected="true">     <i class="fas fa-store"></i> Branch {{$loop->index + 1}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    @foreach($stores->branch as $branch)
                        <div  class="tab-pane fade  {{$loop->index == 0 ? 'active show  ' : ''}} " id="branch{{$loop->index}}" role="tabpanel" aria-labelledby="branch-tab-{{$loop->index}}">
                            <form id="F{{$loop->index}}"  enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row" >
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="opentime">{{__('opentime')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                        </div>
                                                        <x-timepicker wire:model.defer="branchlist.{{$loop->index}}.opentime" id="opentime" :error="'opentime'" />
                                                        @error('opentime')
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
                                                        <x-timepicker wire:model.defer="branchlist.{{$loop->index}}.closetime" id="closetime" :error="'closetime'" />
                                                        @error('closetime')
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
                                                        @error('expiry_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="numproduct">{{ __('numproduct')  }}*</label>
                                                    <input type="text" id="numproduct" wire:model.defer='branchlist.{{$loop->index}}.numproduct' class="form-control @error('numproduct') is-invalid @enderror" >
                                                    @error('numproduct')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div  wire:ignore class="form-group">
                                                    <label for="selectcity">{{ __('city') }}*</label>
                                                    <select id="selectcity"  wire:model.defer='branchlist.{{$loop->index}}.city_id' class="form-control pt-1   @error('city_id') is-invalid @enderror" >
                                                        <option value="">Select City</option>
                                                        @foreach ( $citys as $city )
                                                            <option value="{{$city->id}}" >{{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @error('city_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div wire:ignore  class="form-group">
                                                    <label for="selectregion">{{ __('region') }}*</label>
                                                    <select  id="selectregion" class="form-control pt-1 @error('region_id') is-invalid @enderror" wire:model.defer='branchlist.{{$loop->index}}.region_id'>
                                                        <option value="">Select Region</option>
                                                        @foreach ( $regions as $region )
                                                            <option value="{{$region->id}}" >{{$region->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @error('region')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" >
                                                <div class="form-group">
                                                    <label for="address">{{ __('tran.address')  }}*</label>
                                                    <input type="text" id="address" wire:model.defer='branchlist.{{$loop->index}}.address' class="form-control @error('address') is-invalid @enderror" >
                                                    @error('address')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="phone">{{ __('phone')  }}*</label>
                                                    <input type="text" id="phone" wire:model.defer='branchlist.{{$loop->index}}.phone' class="form-control @error('phone') is-invalid @enderror" >
                                                    @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>

                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="phone2">{{ __('phone2')  }}*</label>
                                                    <input type="text" id="phone2" wire:model.defer='branchlist.{{$loop->index}}.phone2' class="form-control @error('phone2') is-invalid @enderror" >
                                                    @error('phone2')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mapouter">
                                            <div class="gmap_canvas">
                                                <iframe   width="100%"  height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{  $branch->lat }},{{  $branch->lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                <br><style>.mapouter{position:relative;text-align:right;height:500px; width:100%;}</style><a href="https://www.embedgooglemap.net">embed a google map in html</a>
                                                    <style>
                                                        .gmap_canvas {overflow:hidden;background:none!important;height:500px;  width:100%;}
                                                    </style>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary" wire:click.prevent='save({{$branch->id}},{{$loop->index}})'> Save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
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

    @push('alpine-plugins')
    <!-- Alpine Plugins -->
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    @endpush
