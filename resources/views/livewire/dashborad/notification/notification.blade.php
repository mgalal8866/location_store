<div>
    @section('title')
    {{ setting('site_title')}}- Notification
    @stop
    @section('page')
    Notification
    @endsection
    @section('page2')
      Notification
    @endsection
    @push('csslive')
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
                            <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill"
                                href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal"
                                aria-selected="false">{{ __('log') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-backup-tab" data-toggle="pill"
                                href="#custom-tabs-five-backup" role="tab" aria-controls="custom-tabs-five-backup"
                                aria-selected="false">{{ __('backup') }}</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div wire:ignore.self class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="card-header with-border">
                                            <h3 class="card-title">{{ __('setting_general') }}</h3>
                                        </div>
                                        <form wire:submit.prevent="updateSetting">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" id="checkboxSuccess2" wire:model='dd'>
                                                        <label for="checkboxSuccess2">
                                                        </label>
                                                    </div>
                                                    <label class="control-label">{{ __('notify_expiry_branch') }} ({{ __('daily') }})</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" id="checkboxSuccess2" wire:model='dd'>
                                                        <label for="checkboxSuccess2">
                                                        </label>
                                                    </div>
                                                    <label class="control-label">{{ __('notify_expiry_product') }} ({{ __('daily') }})</label>
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label class="control-label">عدد المتاجر فى البحث</label>
                                                    <input type="number" class="form-control" name="recaptcha_lang"
                                                    wire:model.defer="state.app_pagforsearch_branch" min="0"  placeholder="عدد المتاجر فى البحث" value="" dir="rtl">
                                                </div> --}}
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="sendnotify">

                                            <input wire:model='countuser' claas="">
                                            <span>{{$countuser??0}}</span>

                                            <div class="row">
                                                <div clss="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('gender') }}</label>
                                                        <select  class="form-control" wire:model='gender'>
                                                                <option value='all' selected >Any</option>
                                                                <option value='0'>Male</option>
                                                                <option value='1'>female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div clss="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('city') }}</label>
                                                       <select  class="form-control" wire:model='city'>
                                                            <option value='all' selected>All</option>
                                                            @foreach ( $getcity as $ci )
                                                            <option value='{{ $ci->id }}'>{{ $ci->name }}</option>
                                                            @endforeach
                                                       </select>
                                                    </div>
                                                </div>
                                                <div clss="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">{{ __('region') }}</label>
                                                       <select  class="form-control" wire:model='region'>
                                                            <option value='all' selected>All</option>
                                                            @if($getregion != null)
                                                                @foreach ( $getregion as $reg)
                                                                <option value='{{ $reg->id }}'>{{ $reg->name }}</option>
                                                                @endforeach
                                                            @endif
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ __('title') }}</label>
                                                <input type="text"  wire:model.defer="title" class="form-control" name="application_name" placeholder="عنوان" dir="rtl">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ __('body') }}</label>
                                                <input type="text" wire:model.defer="body" class="form-control" name="site_title" placeholder="الرساله"  dir="rtl">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">{{ __('image') }}</label>
                                                <input type="text" wire:model.defer="image" class="form-control" name="homepage_title" placeholder="صورة" dir="rtl">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane" aria-hidden="true"></i> ارسال</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div wire:ignore.self class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel"
                            aria-labelledby="custom-tabs-five-normal-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="card">
                                            <div class="card-header with-border">
                                                <h3 class="card-title">اعدادات الصفحات</h3>
                                            </div>
                                            <form wire:submit.prevent="updateSetting">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label class="control-label">عدد احدث المتاجر</label>
                                                        <input type="number" class="form-control" name="recaptcha_site_key"
                                                        wire:model.defer="state.app_new_branch"  min="0"  placeholder="عدد احدث المتاجر" value="" dir="rtl">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">عدد المتاجر فى الاقسام</label>
                                                        <input type="number" class="form-control" name="recaptcha_secret_key"
                                                        wire:model.defer="state.app_page_branch" min="0"   placeholder="عدد المتاجر فى الاقسام" value="" dir="rtl">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">عدد المتاجر فى البحث</label>
                                                        <input type="number" class="form-control" name="recaptcha_lang"
                                                        wire:model.defer="state.app_pagforsearch_branch" min="0"  placeholder="عدد المتاجر فى البحث" value="" dir="rtl">
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div wire:ignore.self class="tab-pane fade" id="custom-tabs-five-backup" role="tabpanel"
                            aria-labelledby="custom-tabs-five-backup-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="setbackuptime">
                                            <div class="form-group">
                                                <label class="control-label">التوقيت</label>
                                                <select wire:model='timebackup' class="form-control">
                                                    <option value='0 * * * *'>Hourly</option>
                                                    <option value='0 0 * * *'>Daily</option>
                                                    <option value='0 0 0 * *'>Weekly</option>
                                                    <option value='0 0 1 * *'>Monthly</option>
                                                    <option value='0 0 0 1 1'>Yearly</option>

                                                </select>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button>
                                            </div>
                                        </form>

                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>
