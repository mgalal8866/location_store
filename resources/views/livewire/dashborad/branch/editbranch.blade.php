
@push('styles')
<style>
    .profile-user-img:hover {
        background-color: blue;
        cursor: pointer;
    }
</style>
@endpush
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




        <div wire:ignore class="card-header p-0 border-bottom-0">

        </div>
        <div class="card-body">

                        <div class="row  shadow p-3 mb-5   rounded text-dark d-flex align-items-center" x-data="{ show: false }">
                            <div >
                                <a class="btn btn-app bg-danger m-1" @if($branch->product->count() != 0) href="{{route('product',['slug' => $branch->id])}} @endif" >
                                    <span class="badge bg-teal"> {{$branch->product->count()}}</span>
                                    <i class="fas fa-inbox"></i> {{__('product')}}
                                </a>
                            </div>
                        </div>
                        <form id="F"  enctype="multipart/form-data">
                            <div class="card">

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-8" >
                                            <div class="form-group">
                                                <label for="inputDescription">{{ __('description')}}</label>
                                                <textarea id="inputDescription" wire:model.defer='descriptionbranch'    rows="5" class="form-control @error('descriptionbranch') is-invalid @enderror" ></textarea>
                                                @error('descriptionbranch')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4" >

                                            <label for="inputName">{{ __('image')}}</label>
                                            <div class="card card-secondary card-outline" >
                                                <div class="card-body box-profile">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <div class="form-group">
                                                                <label class="control-label">Select Image : </label>
                                                                <div style="margin-bottom: 10px;">
                                                                        @if($oldimage && !$image)
                                                                            <img src="{{$oldimage}}" alt="" style="max-width: 100px; max-height: 100px;">
                                                                        @endif
                                                                        @if($image)
                                                                        <img src="{{ $image->temporaryUrl() }}" alt="Selected" style="max-width: 100px; max-height: 100px;">
                                                                        @endif
                                                                </div>
                                                                <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                                        <a class="btn btn-success btn-sm btn-file-upload">
                                                                            اختر صورة <input type="file" name="file" size="40"
                                                                                accept=".png, .jpg, .jpeg, .gif" wire:model='image' >
                                                                        </a>
                                                                    <div  x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                                                        <div class="progress-bar bg-success  progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                                            <span class="sr-only">40% Complete (success)</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                @if (floor($branch->rating) - $i >= 1)
                                                                    <i class="fas fa-star text-warning fa-1x">{{--Full Start--}} </i>
                                                                @elseif ($branch->rating - $i > 0)
                                                                    <i class="fas fa-star-half-alt text-warning fa-1x"> {{--Half Start--}} </i>
                                                                @else
                                                                    <i class="far fa-star text-warning fa-1x"> {{--Empty Start--}} </i>
                                                                @endif
                                                            @endfor
                                                                {{ number_format($branch->rating,1)}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" >
                                            <div    class="form-group">
                                                <label for="selectactive">{{ __('active') }}</label>
                                                <select id="selectactive"  wire:model.defer='active' class="form-control pt-1   @error('active') is-invalid @enderror" >
                                                    <option value="0">{{ __('active') }}</option>
                                                    <option value="1">{{ __('unactive') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4" >
                                            <div  class="form-group">
                                                <label for="selectapproval">{{ __('approval') }}</label>
                                                <select id="selectapproval"  wire:model.defer='approval' class="form-control pt-1   @error('approval') is-invalid @enderror" >
                                                    <option value="0">accept</option>
                                                    <option value="1">waiting</option>
                                                    <option value="2">unacceptable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group">
                                                <label for="selectactive">{{ __('show_top') }}</label>
                                                <select id="selecttop"  wire:model.defer='top' class="form-control pt-1   @error('top') is-invalid @enderror" >
                                                    <option value="1">{{ __('Star') }}</option>
                                                    <option value="0">{{ __('Normal') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2" >
                                            <div class="form-group">
                                                <label for="numproduct">{{ __('numproduct')  }}</label>
                                                <input type="text" id="numproduct" wire:model.defer='numproduct' class="form-control @error('numproduct') is-invalid @enderror" >
                                                @error('numproduct')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
                                                    <x-timepicker wire:model.defer="opentime" id="opentime" :error="'opentime'" />
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
                                                    <x-timepicker wire:model.defer="closetime" id="closetime" error="closetime" />
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
                                                <label for="start_date">{{__('start_date')}}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <x-datepicker wire:model.defer="start_date" id="start_date" :error="'start_date'" />
                                                    @error('start_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label for="expiry_date">{{__('expiry_date')}}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <x-datepicker wire:model.defer="expiry_date" id="expiry_date" :error="'expiry_date'" />
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
                                        <div class="col-md-8" >
                                            <div class="form-group">
                                                <label for="address">{{ __('address')  }}</label>
                                                <input type="text" id="address" wire:model.defer='address' class="form-control @error('address') is-invalid @enderror" >
                                                @error('address')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2" >
                                            <div  class="form-group">
                                                <label for="selectcity">{{ __('city') }}</label>
                                                <select id="selectcity"  wire:model='city_id' class="form-control pt-1   @error('city_id') is-invalid @enderror" >
                                                    <option value="" disabled>Select City</option>
                                                    @foreach ( $citys as $city )
                                                        <option value="{{$city->id}}"> {{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('city_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-2" >
                                            <div  class="form-group">
                                                <label for="selectregion1">{{ __('region') }}</label>
                                                <select  id="selectregion1" wire:model='region_id' class="form-control pt-1 @error('region_id') is-invalid @enderror" >
                                                    <option value="">Select Region</option>
                                                        @foreach ( $regions as $reg )
                                                            <option value="{{$reg['id']}}" >{{$reg['region_name_ar']}}</option>
                                                        @endforeach
                                                </select>
                                                @error('region_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label for="phone">{{ __('phone')  }}</label>
                                                <input type="text" id="phone" wire:model.defer='phone' class="form-control @error('phone') is-invalid @enderror" >
                                                @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group">

                                                <label for="phonetwo">{{ __('phone2')  }}</label>
                                                <input type="text" id="phonetwo" wire:model.defer='phonetwo' class="form-control @error('phonetwo') is-invalid @enderror" >
                                                @error('phonetwo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label for="lat">{{ __('lat')  }}</label>
                                                <input type="text" id="lat" wire:model.defer='lat' class="form-control @error('lat') is-invalid @enderror" >
                                                @error('lat')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6" >
                                            <div class="form-group">
                                                <label for="lng">{{ __('lng')  }}</label>
                                                <input type="text" id="lng" wire:model.defer='lng' class="form-control @error('lng') is-invalid @enderror" >
                                                @error('lng')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>

                                        </div>
                                    </div>

                                    @if ($lat)
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe   width="100%"  height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{$lat}},{{ $lng}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                            <br><style>.mapouter{position:relative;text-align:right;height:500px; width:100%;}</style><a href="https://www.embedgooglemap.net">embed a google map in html</a>
                                                <style>
                                                    .gmap_canvas {overflow:hidden;background:none!important;height:500px;  width:100%;}
                                                </style>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="card-footer bg-secondary">
                                    <button class="btn btn-success" wire:click.prevent="save()"> Save </button>
                                </div>
                            </div>
                        </form>
        </div>




</div>



@push('jslive')
<script>
 var hash = document.location.hash;
 if (hash) {
 $('.nav-tabs a[href="'+hash+'"]').tab('show');
 }

 // Change hash for page-reload
 $('.nav a').on('shown.bs.tab', function (e) {
 window.location.hash = e.target.hash;
 });
 </script>
@endpush

