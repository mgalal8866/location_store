

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
                                            <input type="text" id="inputName" wire:model.lazy='name' class="form-control @error('name') is-invalid @enderror" >
                                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3" >

                                        <div    class="form-group">
                                            <label for="selectactive1">{{ __('active') }}</label>
                                            <select id="selectactive1"  wire:model.lazy='activestore' class="form-control pt-1   @error('activestore') is-invalid @enderror" >
                                                <option value="">Select active</option>
                                                <option value="0">{{ __('active') }}</option>
                                                <option value="1">{{ __('unactive') }}</option>
                                            </select>
                                            @error('activestore')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                        </div>

                                    </div>
                                    <div class="col-md-3" >
                                        <div class="form-group">
                                            <label for="inputnumberbranch">{{ __('numberbranch')}}</label>
                                            <input type="text" id="inputnumberbranch" wire:model.lazy='numberbranch' class="form-control @error('numberbranch') is-invalid @enderror" >
                                            @error('numberbranch')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" >
                                        <div   class="form-group">
                                            <label for="selectcategory">{{ __('category') }}</label>
                                            <select id="selectcategory"  wire:model='selectcategory' class="form-control pt-1   @error('selectcategory') is-invalid @enderror" >
                                                <option value="">Select category</option>
                                                @foreach ( $categorys as $category )
                                                    @if(!$category->parent_id)
                                                      <option value="{{$category->id}}" >{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @error('selectcategory')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6" >
                                        @empty(!$subcategorys)
                                            <div   class="form-group">
                                                <label for="selectsubcategory">{{ __('subcategory') }}</label>
                                                <select id="selectsubcategory"  wire:model='selectsubcategory' class="form-control pt-1   @error('selectsubcategory') is-invalid @enderror"  required>
                                                    <option value="">Select Sub category</option>
                                                        @foreach ( $subcategorys as $subcategory )
                                                            <option value="{{$subcategory->id}}" >{{$subcategory->name}}</option>
                                                        @endforeach
                                                </select>
                                            @error('selectsubcategory')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        @endempty
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

        <div  class="card card-danger card-outline card-tabs">
            <div wire:ignore class="card-header p-0 pt-1 border-bottom-0">
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

                <div   class="tab-content" id="custom-tabs-three-tabContent">
                    @forelse($stores->branch as $branch)

                        <div   wire:ignore.self class="tab-pane fade  {{$loop->index == 0 ? 'active show  ' : ''}} " id="branch{{$loop->index}}" role="tabpanel" aria-labelledby="branch-tab-{{$loop->index}}">

                            <div class="row  shadow p-3 mb-5   rounded text-dark d-flex align-items-center" x-data="{ show: false }">
                                <div >
                                        <a class="btn btn-app bg-danger m-1" @click="show = !show" :aria-expanded="show ? 'true' : 'false'">
                                            <span class="badge bg-teal"> {{$branch->product->count()}}</span>
                                            <i class="fas fa-inbox"></i> {{__('product')}}
                                        </a>
                                    @if($branch->product->count() != 0)
                                        @livewire('dashborad.branch.products', ['branch' => $branch])
                                    @endif
                                </div>
                            </div>
                            <form id="F{{$loop->index}}"  enctype="multipart/form-data">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-8" >
                                                <div class="form-group">
                                                    <label for="inputDescription">{{ __('description')}}</label>
                                                    <textarea id="inputDescription" wire:model.defer='branchlist.{{$loop->index}}.descriptionbranch'    rows="5" class="form-control @error('branchlist.'.$loop->index.'.descriptionbranch') is-invalid @enderror" ></textarea>
                                                    @error('branchlist.'.$loop->index.'.descriptionbranch')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4" >

                                                <label for="inputName">{{ __('image')}}</label>
                                                <div class="card card-secondary card-outline" >
                                                    <div class="card-body box-profile">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                <div class="text-center" x-data="{ imagePreview: '{{$branchlist[$loop->index]['image']}}' }">
                                                                    <input wire:model="branchlist.{{$loop->index}}.image" accept="image/png, image/gif, image/jpeg"  type="file" class="d-none" x-ref="image"
                                                                        x-on:change="
                                                                                    reader = new FileReader();
                                                                                    reader.onload = (event) => {
                                                                                        imagePreview = event.target.result;
                                                                                        document.getElementById('profileImage{{$loop->index}}').src = `${imagePreview}`;
                                                                                    };
                                                                                    reader.readAsDataURL($refs.image.files[0]);;;

                                                                                "/>
                                                                    <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '{{$branchlist[$loop->index]['image']}}'" alt="Branch picture">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 text-center">
                                                                 <p class="text-center text-danger"><small> * بعد اختيار الصورة يتم حفظها</small></p>
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
                                                    <label for="selectactive{{$loop->index}}">{{ __('active') }}</label>
                                                    <select id="selectactive{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.active' class="form-control pt-1   @error('branchlist.'.$loop->index.'.active') is-invalid @enderror" >
                                                        <option value="0">{{ __('active') }}</option>
                                                        <option value="1">{{ __('unactive') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div  class="form-group">
                                                    <label for="selectapproval{{$loop->index}}">{{ __('approval') }}</label>
                                                    <select id="selectapproval{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.approval' class="form-control pt-1   @error('branchlist.'.$loop->index.'.approval') is-invalid @enderror" >
                                                        <option value="0">accept</option>
                                                        <option value="1">waiting</option>
                                                        <option value="2">unacceptable</option>
                                                    </select>
                                                 </div>
                                            </div>
                                            <div class="col-md-2" >

                                                <div class="form-group">
                                                    <label for="selectactive{{$loop->index}}">{{ __('show_top') }}</label>
                                                    <select id="selecttop{{$loop->index}}"  wire:model.defer='branchlist.{{$loop->index}}.top' class="form-control pt-1   @error('branchlist.'.$loop->index.'.top') is-invalid @enderror" >
                                                        <option value="1">{{ __('Star') }}</option>
                                                        <option value="0">{{ __('Normal') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2" >
                                                <div class="form-group">
                                                    <label for="numproduct{{$loop->index}}">{{ __('numproduct')  }}</label>
                                                    <input type="text" id="numproduct{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.numproduct' class="form-control @error('branchlist.'.$loop->index.'.numproduct') is-invalid @enderror" >
                                                    @error('branchlist.'.$loop->index.'.numproduct')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="opentime{{$loop->index}}">{{__('opentime')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                        </div>
                                                        <x-timepicker wire:model.defer="branchlist.{{$loop->index}}.opentime" id="opentime{{$loop->index}}" :error="'branchlist.{{$loop->index}}.opentime'" />
                                                        @error('branchlist.'.$loop->index.'.opentime')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="closetime{{$loop->index}}">{{ __('closetime') }}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                        </div>
                                                        <x-timepicker wire:model.defer="branchlist.{{$loop->index}}.closetime" id="closetime{{$loop->index}}" error="branchlist.{{$loop->index}}.closetime" />
                                                        @error('branchlist.'.$loop->index.'.closetime')
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
                                                    <label for="start_date{{$loop->index}}">{{__('start_date')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <x-datepicker wire:model.dafer="branchlist.{{$loop->index}}.start_date" id="start_date{{$loop->index}}" :error="'branchlist.{{$loop->index}}.start_date'" />
                                                        @error('branchlist.'.$loop->index.'.start_date')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="expiry_date{{$loop->index}}">{{__('expiry_date')}}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <x-datepicker wire:model.dafer="branchlist.{{$loop->index}}.expiry_date" id="expiry_date{{$loop->index}}" :error="'branchlist.{{$loop->index}}.expiry_date'" />
                                                        @error('branchlist.'.$loop->index.'.expiry_date')
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
                                                    <label for="address{{$loop->index}}">{{ __('address')  }}</label>
                                                    <input type="text" id="address{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.address' class="form-control @error('branchlist.'.$loop->index.'.address') is-invalid @enderror" >
                                                    @error('branchlist.'.$loop->index.'.address')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2" >
                                                <div  class="form-group">
                                                    <label for="selectcity{{$loop->index}}">{{ __('city') }}</label>
                                                    <select id="selectcity{{$loop->index}}"  wire:model='branchlist.{{$loop->index}}.city_id' class="form-control pt-1   @error('branchlist.'.$loop->index.'.city_id') is-invalid @enderror" >
                                                        <option value="" disabled>Select City</option>
                                                        @foreach ( $citys as $city )
                                                           <option value="{{$city->id}}"> {{$city->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('branchlist.'.$loop->index.'.city_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>

                                            <div class="col-md-2" >
                                                <div  class="form-group">
                                                    <label for="selectregion1{{$loop->index}}">{{ __('region') }}</label>
                                                    <select  id="selectregion1{{$loop->index}}" wire:model='branchlist.{{$loop->index}}.region_id' class="form-control pt-1 @error('branchlist.'.$loop->index.'region_id') is-invalid @enderror" >
                                                        <option value="">Select Region</option>
                                                            @foreach ( $regions[$loop->index] as $reg )
                                                                <option value="{{$reg['id']}}" >{{$reg['region_name_ar']}}</option>
                                                            @endforeach
                                                    </select>
                                                    @error('branchlist.'.$loop->index.'.region_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="phone{{$loop->index}}">{{ __('phone')  }}</label>
                                                    <input type="text" id="phone{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.phone' class="form-control @error('branchlist.'.$loop->index.'.phone') is-invalid @enderror" >
                                                    @error('branchlist.'.$loop->index.'.phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">

                                                    <label for="phonetwo{{$loop->index}}">{{ __('phone2')  }}</label>
                                                    <input type="text" id="phonetwo{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.phonetwo' class="form-control @error('branchlist.'.$loop->index.'.phonetwo') is-invalid @enderror" >
                                                    @error('branchlist.'.$loop->index.'.phonetwo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="lat{{$loop->index}}">{{ __('lat')  }}</label>
                                                    <input type="text" id="lat{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.lat' class="form-control @error('branchlist.'.$loop->index.'.lat') is-invalid @enderror" >
                                                    @error('branchlist.'.$loop->index.'.lat')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group">
                                                    <label for="lng{{$loop->index}}">{{ __('lng')  }}</label>
                                                    <input type="text" id="lng{{$loop->index}}" wire:model.defer='branchlist.{{$loop->index}}.lng' class="form-control @error('branchlist.'.$loop->index.'.lng') is-invalid @enderror" >
                                                    @error('branchlist.'.$loop->index.'.lng')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
