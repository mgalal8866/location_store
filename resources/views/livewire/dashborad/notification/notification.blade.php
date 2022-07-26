<div>
    @section('title')
    {{ getsettingsof('site_title')}} -  {{__('notification')}}
    @stop
    @section('page')
     {{__('notification')}}
    @endsection
    @section('page2')
      {{__('notification')}}
    @endsection
    @push('csslive')
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
        <style>
            .btn-success {
                color: #fff;
                background-color: {{ config('setting_var.color.btn') }};
                border-color: {{ config('setting_var.color.btn') }};
            }

            .btn-success:hover,
            .btn-success:focus,
            .btn-success:active {
                color: #fff;
                background-color: #148770 !important;
                border-color: #148770 !important;
            }

            .btn-file-upload {
                position: relative;
            }

            .btn-file-upload input {
                position: absolute;
                top: 0;
                right: 0;
                left: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                z-index: 2;
                filter: alpha(opacity=0);
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                opacity: 0;
                background-color: transparent;
                color: transparent;
                cursor: pointer;
            }

            .btn-file-upload {
                position: relative;
                color: #fff !important;
                font-size: 13px !important;
                padding: 4px 16px !important;
                overflow: hidden !important;
            }

            .btn-primary {
                color: #fff;
                background-color: #0084CE;
                border-color: #0084CE;
            }

            .btn-primary:hover,
            .btn-primary:focus,
            .btn-primary:active {
                color: #fff;
                background-color: #0e7bb8 !important;
                border-color: #0e7bb8 !important;
            }
        </style>
    @endpush


    <div class="row ">
        <div class="col-md-12">
            <div class="card   card-outline card-danger card-tabs">
                <div   wire:ignore  class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" id="custom-tabs-five-overlay-tab" data-toggle="pill"
                                href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay"
                                aria-selected="true">{{ __('general') }}</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                                href="#custom-tabs-five-overlay-dark" role="tab"
                                aria-controls="custom-tabs-five-overlay-dark"
                                aria-selected="false">{{ __('send_custom_notification') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-user-tab" data-toggle="pill"
                                href="#custom-user" role="tab"
                                aria-controls="custom-user"
                                aria-selected="false">{{ __('send_user_notification') }}</a>
                        </li>
                       <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill"
                                href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal"
                                aria-selected="false">{{ __('log') }}</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div wire:ignore.self class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-tab">
                            <form wire:submit.prevent="updateSetting">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header with-border">
                                                <h3 class="card-title">{{ __('product') }}</h3>
                                            </div>

                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('notify_expiry_product') }} </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <input type="checkbox" wire:model='activenotifyexpireproduct'>
                                                                    </span>
                                                                </div>
                                                                <select wire:model='timenotifyexpireproduct' class="form-control"  {{$activenotifyexpireproduct == false ? 'disabled' : ' '}}>
                                                                    <option value='0 * * * *'>Hourly</option>
                                                                    <option value='0 0 * * *'>Daily</option>
                                                                    <option value='0 0 0 * *'>Weekly</option>
                                                                    <option value='0 0 1 * *'>Monthly</option>
                                                                    <option value='0 0 0 1 1'>Yearly</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('notify_product_views') }}</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <input type="checkbox" wire:model='activenotifyproductviews'>
                                                                    </span>
                                                                </div>
                                                                <input  class="form-control" type="text" wire:model='viewsproduct' {{$activenotifyproductviews == false ? 'disabled' : ' '}}>
                                                                <select wire:model='timenotifyproductviews' class="form-control"  {{$activenotifyproductviews == false ? 'disabled' : ' '}}>
                                                                    <option value='0 * * * *'>Hourly</option>
                                                                    <option value='0 0 * * *'>Daily</option>
                                                                    <option value='0 0 0 * *'>Weekly</option>
                                                                    <option value='0 0 1 * *'>Monthly</option>
                                                                    <option value='0 0 0 1 1'>Yearly</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label class="control-label">عدد المتاجر فى البحث</label>
                                                        <input type="number" class="form-control" name="recaptcha_lang"
                                                        wire:model.defer="state.app_pagforsearch_branch" min="0"  placeholder="عدد المتاجر فى البحث" value="" dir="rtl">
                                                    </div> --}}
                                                </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header with-border">
                                                <h3 class="card-title">{{ __('branch') }}</h3>
                                            </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('notify_expiry_branch') }} </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <input type="checkbox" wire:model='activenotifyexpirebranch'>
                                                                    </span>
                                                                </div>
                                                                <select wire:model='timenotifyexpirebranch' class="form-control"  {{$activenotifyexpirebranch == false ? 'disabled' : ' '}}>
                                                                    <option value='0 * * * *'>Hourly</option>
                                                                    <option value='0 0 * * *'>Daily</option>
                                                                    <option value='0 0 0 * *'>Weekly</option>
                                                                    <option value='0 0 1 * *'>Monthly</option>
                                                                    <option value='0 0 0 1 1'>Yearly</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('notify_branch_views') }}</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <input type="checkbox" wire:model='activenotifybranchviews'>
                                                                    </span>
                                                                </div>
                                                                <input  class="form-control" type="text" wire:model='viewsbranch' {{$activenotifybranchviews == false ? 'disabled' : ' '}}>
                                                                <select wire:model='timenotifybranchviews' class="form-control"  {{$activenotifybranchviews == false ? 'disabled' : ' '}}>
                                                                    <option value='0 * * * *'>Hourly</option>
                                                                    <option value='0 0 * * *'>Daily</option>
                                                                    <option value='0 0 0 * *'>Weekly</option>
                                                                    <option value='0 0 1 * *'>Monthly</option>
                                                                    <option value='0 0 0 1 1'>Yearly</option>
                                                                </select>
                                                            </div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button>
                            </div>
                        </form>
                        </div>
                        <div wire:ignore.self class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="sendnotify">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('target_user') }}</label>
                                                        <select  class="form-control" wire:model='target'>
                                                                <option value='all' selected >{{ __('all') }} </option>
                                                                <option value='0'>Normal User</option>
                                                                <option value='1'>Has store</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('gender') }}</label>
                                                        <select  class="form-control" wire:model='gender'>
                                                                <option value='all' selected >{{ __('all') }}</option>
                                                                <option value='0'>Male</option>
                                                                <option value='1'>female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('city') }}</label>
                                                       <select  class="form-control" wire:model='city'>
                                                            <option value='all' selected>{{ __('all') }}</option>
                                                            @foreach ( $getcity as $ci )
                                                            <option value='{{ $ci->id }}'>{{ $ci->name }}</option>
                                                            @endforeach
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('region') }}</label>
                                                       <select  class="form-control" wire:model='region'>
                                                            <option value='all' selected>{{ __('all') }}</option>
                                                            @if($getregion != null)
                                                                @foreach ( $getregion as $reg)
                                                                <option value='{{ $reg->id }}'>{{ $reg->name }}</option>
                                                                @endforeach
                                                            @endif
                                                       </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    {{-- <div class="form-group"> --}}
                                                    <center>
                                                      <span style="display:inline-block; vertical-align: middle; " class="text-white bg-gradient-teal rounded "> Users : {{$users->count()??0}}  </span>
                                                    </center>
                                                    {{-- </div> --}}
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('title') }}</label>
                                                        <input type="text"  wire:model.defer="title" class="form-control" name="application_name" placeholder="عنوان" dir="rtl">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('body') }}</label>
                                                        <input type="text" wire:model.defer="body" class="form-control" name="site_title" placeholder="الرساله"  dir="rtl">
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('image') }}</label>
                                                        <input type="text" wire:model.defer="image" class="form-control" name="homepage_title" placeholder="صورة" dir="rtl">
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <div class="text-center" x-data="{ imagePreview: '{{$image}}' }">
                                                            <input wire:model="uploadimage" accept="image/png, image/gif, image/jpeg"  type="file" class="d-none" x-ref="image"
                                                                x-on:change="
                                                                            reader = new FileReader();
                                                                            reader.onload = (event) => {
                                                                                imagePreview = event.target.result;
                                                                                document.getElementById('image').src = `${imagePreview}`;
                                                                            };
                                                                            reader.readAsDataURL($refs.image.files[0]);;;

                                                                        "/>
                                                            <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '{{$image}}'" alt=" picture">
                                                        </div>
                                                    {{-- <img class="border-dark border" src="https://www.locationstor.com/assets/noimage.png" alt="image" style="max-width: 100px; max-height: 100px;"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button  wire:loading.attr="disabled" type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> ارسال</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="tab-pane fade" id="custom-user" role="tabpanel"
                            aria-labelledby="custom-user-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label class="control-label">{{ __('mobile') }}</label>
                                                <input type="text"  wire:model.dafer="finduser" class="form-control" name="application_name" placeholder="Mobile" dir="">
                                            </div>
                                            <div class="col-md-4">
                                                <center>
                                                    <span style="display:inline-block; vertical-align: middle; " class="text-white bg-gradient-teal rounded "> User Name : {{$hasuser->name??'Not Found'}}  </span>
                                                </center>
                                            </div>
                                        </div>
                                            <form >
                                                <div class="row">
                                                        @if ( $hasuser != null)
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('title') }}</label>
                                                                <input type="text"  wire:model.defer="usertitle" class="form-control" name="application_name" placeholder="عنوان" dir="rtl">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('body') }}</label>
                                                                <input type="text" wire:model.defer="userbody" class="form-control" name="site_title" placeholder="الرساله"  dir="rtl">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label class="control-label">{{ __('image') }}</label>
                                                                <input type="text" wire:model.defer="userimage" class="form-control" name="homepage_title" placeholder="صورة" dir="rtl">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="form-group">
                                                                <div class="text-center" x-data="{ imagePreview: '{{$userimage}}' }">
                                                                    <input wire:model="uploaduserimage" accept="image/png, image/gif, image/jpeg"  type="file" class="d-none" x-ref="image"
                                                                        x-on:change="
                                                                                    reader = new FileReader();
                                                                                    reader.onload = (event) => {
                                                                                        imagePreview = event.target.result;
                                                                                        document.getElementById('image').src = `${imagePreview}`;
                                                                                    };
                                                                                    reader.readAsDataURL($refs.image.files[0]);;;

                                                                                "/>
                                                                    <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '{{$userimage}}'" alt=" picture">
                                                                </div>
                                                            {{-- <img class="border-dark border" src="https://www.locationstor.com/assets/noimage.png" alt="image" style="max-width: 100px; max-height: 100px;"> --}}
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ( $hasuser != null)
                                                        <div class="card-footer">
                                                            <button wire:loading.attr="disabled" wire:click.prevent="sendnotifytouser" class="btn btn-primary pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> ارسال</button>
                                                        </div>
                                                        @endif
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel"
                            aria-labelledby="custom-tabs-five-normal-tab">
                                    <div class="card-header">
                                        <button wire:click='clearall' type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit-region">
                                            <i class="fas fa-trash-alt    "></i> {{ __('clear-all') }}
                                          </button>
                                    </div>
                                    <div class="card-body">
                                       <table class=" table table-responsive-sm table-striped table-bordered">
                                           <thead>
                                                <th>{{ __('admin') }}</th>
                                                <th>{{ __('title') }}</th>
                                                <th>{{ __('body') }}</th>
                                                <th>{{ __('image') }}</th>
                                                <th>{{ __('filter') }}</th>
                                           </thead>
                                           <tbody>
                                               @forelse ( $notifylog as $log )
                                                    <tr>
                                                        <td>{{ $log->user->name??'' }}</td>
                                                        <td>{{ $log->title }}</td>
                                                        <td>{{ $log->body }}</td>
                                                        <td>
                                                            <img style="height: 50px; width: 50px" class="profile-user-img img-circle" src="{{ $log->image }}" alt=" picture">
                                                            <br/>
                                                            <a   href="{{$log->image}}" target="_blank">link</a>
                                                        </td>
                                                        <td>
                                                            @foreach  ($log->filter as $key=>$value)
                                                                <b>{{  $key   }}</b>: {{  $value   }}<br/>
                                                            @endforeach
                                                        </td>

                                                    </tr>
                                               @empty
                                               <tr>
                                                   <td colspan="5"> <center> No data .. </center></td>
                                                </tr>
                                               @endforelse
                                           </tbody>
                                       </table>
                                    </div>
                                    <div class="card-footer" >
                                            <div class="d-flex justify-content-center">
                                                {!! $notifylog->links() !!}
                                            </div>
                                    </div>

                        </div>

                        {{-- <div wire:ignore.self class="tab-pane fade" id="custom-tabs-five-backup" role="tabpanel"
                            aria-labelledby="custom-tabs-five-backup-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
    </div>

</div>
@push('jslive')
<script src="{{ URL::asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
@endpush
