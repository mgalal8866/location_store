<div>
    @section('title')
    {{ setting('site_title')}}- Setting App
    @stop
    @section('page')
      Setting App
    @endsection
    @section('page2')
        Setting App
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

    <div class="row mb-4">
        <a href="{{ route('languages.index') }}"
            class="btn btn-primary">{{ __('translation::translation.language') }}</a>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="card   card-success card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" id="custom-tabs-five-overlay-tab" data-toggle="pill"
                                href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay"
                                aria-selected="true">{{ __('image') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                                href="#custom-tabs-five-overlay-dark" role="tab"
                                aria-controls="custom-tabs-five-overlay-dark"
                                aria-selected="false">{{ __('settingeneral') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill"
                                href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal"
                                aria-selected="false">{{ __('settingapp') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-backup-tab" data-toggle="pill"
                                href="#custom-tabs-five-backup" role="tab" aria-controls="custom-tabs-five-backup"
                                aria-selected="false">{{ __('backup') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-tab">
                            <div class="col-md-6">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('tran.images') }}</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form wire:submit.prevent="submit" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div>
                                                    @if (session()->has('message'))
                                                        <div class="alert alert-success">
                                                            {{ session('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Logo (180x50px)</label>
                                                    <div style="margin-bottom: 10px;">
                                                        <img src="{{ URL::asset('assets') . '/' . config('setting_var.images.logo') }}"
                                                            alt="logo" style="max-width: 160px; max-height: 160px;">
                                                    </div>
                                                    <div class="display-block">
                                                        <a class='btn btn-success btn-sm btn-file-upload'>
                                                            {{ __('tran.selectlogo') }}
                                                            <input type="file" id="exampleInputName" accept=".png"
                                                                wire:model="logo"
                                                                onchange="$('#upload-file-info1').html($(this).val());">
                                                        </a>
                                                        (.png)
                                                    </div>
                                                    @error('logo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <span wire:ignore class='badge badge-info' id="upload-file-info1"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">favicon (16x16px)</label>
                                                    <div style="margin-bottom: 10px;">
                                                        <img src="{{ URL::asset('assets') . '/' . config('setting_var.images.favicon') }}"
                                                            alt="favicon"
                                                            style="max-width: 100px; max-height: 100px;">
                                                    </div>
                                                    <div class="display-block">
                                                        <a class='btn btn-success btn-sm btn-file-upload'>
                                                            {{ __('tran.selectfevicon') }}
                                                            <input type="file" id="exampleInputName1"
                                                                wire:model="favicon" accept=".ico"
                                                                onchange="$('#upload-file-info2').html($(this).val());">
                                                        </a>
                                                        (.ico)
                                                    </div>
                                                    @error('favicon')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <span wire:ignore class='badge badge-info'
                                                        id="upload-file-info2"></span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary float-right">Save
                                                    Change</button>
                                            </div>
                                        </form>
                                    </div>
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>{{ __('image') }}</th>
                                                <th>{{ __('description') }}</th>
                                                <</tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#</td>
                                                <td><img src="{{ URL::asset('assets') . '/' . config('setting_var.images.logo') }}"  style="width: 100px; height: 100px;"/></td>
                                                <td><span class="badge bg-warning">Logo (180x50px)</span></td>
                                                </tr>
                                            <tr>
                                                <td>1.</td>
                                                <td><img src="{{ URL::asset('assets') . '/' . config('setting_var.images.favicon') }}"  style="width: 100px; height: 100px;"/></td>
                                                <td><span class="badge bg-warning"> favicon (16x16px) </span></td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Cron job running</td>
                                                <td>favicon (16x16px)</td>
                                                <td><span class="badge bg-primary">30%</span></td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Fix and squish bugs</td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped active">
                                                        <div class="progress-bar bg-success" style="width: 90%">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">90%</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="updateSetting">
                                            <div class="form-group">
                                                <label class="control-label">اسم التطبيق</label>
                                                <input type="text"  wire:model.defer="state.site_name" class="form-control" name="application_name" placeholder="اسم التطبيق" dir="rtl">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">عنوان الموقع</label>
                                                <input type="text" wire:model.defer="state.site_title" class="form-control" name="site_title" placeholder="عنوان الموقع"  dir="rtl">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">البريد الالكترونى</label>
                                                <input type="text" wire:model.defer="state.site_email" class="form-control" name="homepage_title" placeholder="البريد الالكترونى" dir="rtl">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label class="control-label">وصف الموقع</label>
                                                <input type="text"  class="form-control" name="site_description" placeholder="وصف الموقع" value="" dir="rtl">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label class="control-label">الكلمات الدالة</label>
                                                <input type="text" class="form-control" name="keywords" placeholder="الكلمات الدالة" value="" dir="rtl">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label class="control-label">حقوق النشر</label>
                                                <input type="text" class="form-control" name="copyright" placeholder="حقوق النشر" value="" dir="rtl">
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <label class="control-label">تذييل حول القسم</label>
                                                <textarea class="form-control tinyMCEsmall" name="about_footer" placeholder="تذييل حول القسم" style="min-height: 140px; display: none;" dir="rtl" id="about_footer" aria-hidden="true">&lt;p&gt;&lt;strong&gt;مع المخزخانة كل طلباتك أواااااامر&lt;/strong&gt;&lt;/p&gt;
                                                ttt</textarea><div role="application" dir="rtl" class="tox tox-tinymce" style="visibility: hidden; height: 300px;"><div class="tox-editor-container"><div class="tox-editor-header"><div role="group" class="tox-toolbar-overlord"><div role="group" class="tox-toolbar__primary"><div title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1" class="tox-toolbar__group"><button aria-label="ملء الشاشة" title="ملء الشاشة" type="button" tabindex="-1" class="tox-tbtn" aria-pressed="false"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><path d="M15.3 10l-1.2-1.3 2.9-3h-2.3a.9.9 0 1 1 0-1.7H19c.5 0 .9.4.9.9v4.4a.9.9 0 1 1-1.8 0V7l-2.9 3zm0 4l3 3v-2.3a.9.9 0 1 1 1.7 0V19c0 .5-.4.9-.9.9h-4.4a.9.9 0 1 1 0-1.8H17l-3-2.9 1.3-1.2zM10 15.4l-2.9 3h2.3a.9.9 0 1 1 0 1.7H5a.9.9 0 0 1-.9-.9v-4.4a.9.9 0 1 1 1.8 0V17l2.9-3 1.2 1.3zM8.7 10L5.7 7v2.3a.9.9 0 0 1-1.7 0V5c0-.5.4-.9.9-.9h4.4a.9.9 0 0 1 0 1.8H7l3 2.9-1.3 1.2z" fill-rule="nonzero"></path></svg></span></button><button aria-label="شفرة المصدر" title="شفرة المصدر" type="button" tabindex="-1" class="tox-tbtn"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><g fill-rule="nonzero"><path d="M9.8 15.7c.3.3.3.8 0 1-.3.4-.9.4-1.2 0l-4.4-4.1a.8.8 0 0 1 0-1.2l4.4-4.2c.3-.3.9-.3 1.2 0 .3.3.3.8 0 1.1L6 12l3.8 3.7zM14.2 15.7c-.3.3-.3.8 0 1 .4.4.9.4 1.2 0l4.4-4.1c.3-.3.3-.9 0-1.2l-4.4-4.2a.8.8 0 0 0-1.2 0c-.3.3-.3.8 0 1.1L18 12l-3.8 3.7z"></path></g></svg></span></button><button aria-label="معاينة" title="معاينة" type="button" tabindex="-1" class="tox-tbtn"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><path d="M3.5 12.5c.5.8 1.1 1.6 1.8 2.3 2 2 4.2 3.2 6.7 3.2s4.7-1.2 6.7-3.2a16.2 16.2 0 0 0 2.1-2.8 15.7 15.7 0 0 0-2.1-2.8c-2-2-4.2-3.2-6.7-3.2a9.3 9.3 0 0 0-6.7 3.2A16.2 16.2 0 0 0 3.2 12c0 .2.2.3.3.5zm-2.4-1l.7-1.2L4 7.8C6.2 5.4 8.9 4 12 4c3 0 5.8 1.4 8.1 3.8a18.2 18.2 0 0 1 2.8 3.7v1l-.7 1.2-2.1 2.5c-2.3 2.4-5 3.8-8.1 3.8-3 0-5.8-1.4-8.1-3.8a18.2 18.2 0 0 1-2.8-3.7 1 1 0 0 1 0-1zm12-3.3a2 2 0 1 0 2.7 2.6 4 4 0 1 1-2.6-2.6z" fill-rule="nonzero"></path></svg></span></button></div><div title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1" class="tox-toolbar__group"><button aria-label="غامق" title="غامق" type="button" tabindex="-1" class="tox-tbtn" aria-pressed="false"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><path d="M7.8 19c-.3 0-.5 0-.6-.2l-.2-.5V5.7c0-.2 0-.4.2-.5l.6-.2h5c1.5 0 2.7.3 3.5 1 .7.6 1.1 1.4 1.1 2.5a3 3 0 0 1-.6 1.9c-.4.6-1 1-1.6 1.2.4.1.9.3 1.3.6s.8.7 1 1.2c.4.4.5 1 .5 1.6 0 1.3-.4 2.3-1.3 3-.8.7-2.1 1-3.8 1H7.8zm5-8.3c.6 0 1.2-.1 1.6-.5.4-.3.6-.7.6-1.3 0-1.1-.8-1.7-2.3-1.7H9.3v3.5h3.4zm.5 6c.7 0 1.3-.1 1.7-.4.4-.4.6-.9.6-1.5s-.2-1-.7-1.4c-.4-.3-1-.4-2-.4H9.4v3.8h4z" fill-rule="evenodd"></path></svg></span></button><button aria-label="مائل" title="مائل" type="button" tabindex="-1" class="tox-tbtn" aria-pressed="false"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><path d="M16.7 4.7l-.1.9h-.3c-.6 0-1 0-1.4.3-.3.3-.4.6-.5 1.1l-2.1 9.8v.6c0 .5.4.8 1.4.8h.2l-.2.8H8l.2-.8h.2c1.1 0 1.8-.5 2-1.5l2-9.8.1-.5c0-.6-.4-.8-1.4-.8h-.3l.2-.9h5.8z" fill-rule="evenodd"></path></svg></span></button><button aria-label="تسطير" title="تسطير" type="button" tabindex="-1" class="tox-tbtn" aria-pressed="false"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><path d="M16 5c.6 0 1 .4 1 1v5.5a4 4 0 0 1-.4 1.8l-1 1.4a5.3 5.3 0 0 1-5.5 1 5 5 0 0 1-1.6-1c-.5-.4-.8-.9-1.1-1.4a4 4 0 0 1-.4-1.8V6c0-.6.4-1 1-1s1 .4 1 1v5.5c0 .3 0 .6.2 1l.6.7a3.3 3.3 0 0 0 2.2.8 3.4 3.4 0 0 0 2.2-.8c.3-.2.4-.5.6-.8l.2-.9V6c0-.6.4-1 1-1zM8 17h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 0 1 0-2z" fill-rule="evenodd"></path></svg></span></button><button aria-label="يتوسطه خط" title="يتوسطه خط" type="button" tabindex="-1" class="tox-tbtn" aria-pressed="false"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><g fill-rule="evenodd"><path d="M15.6 8.5c-.5-.7-1-1.1-1.3-1.3-.6-.4-1.3-.6-2-.6-2.7 0-2.8 1.7-2.8 2.1 0 1.6 1.8 2 3.2 2.3 4.4.9 4.6 2.8 4.6 3.9 0 1.4-.7 4.1-5 4.1A6.2 6.2 0 0 1 7 16.4l1.5-1.1c.4.6 1.6 2 3.7 2 1.6 0 2.5-.4 3-1.2.4-.8.3-2-.8-2.6-.7-.4-1.6-.7-2.9-1-1-.2-3.9-.8-3.9-3.6C7.6 6 10.3 5 12.4 5c2.9 0 4.2 1.6 4.7 2.4l-1.5 1.1z"></path><path d="M5 11h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2z" fill-rule="nonzero"></path></g></svg></span></button></div><div title="" role="toolbar" data-alloy-tabstop="true" tabindex="-1" class="tox-toolbar__group"><button title="أحجام الخطوط" aria-label="أحجام الخطوط" aria-haspopup="true" type="button" unselectable="on" tabindex="-1" class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke" style="user-select: none;" aria-expanded="false"><span class="tox-tbtn__select-label">14px</span><div class="tox-tbtn__select-chevron"><svg width="10" height="10"><path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 0 1 0-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path></svg></div></button><button title="الكتل" aria-label="الكتل" aria-haspopup="true" type="button" unselectable="on" tabindex="-1" class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke" style="user-select: none;" aria-expanded="false"><span class="tox-tbtn__select-label">الفقرة</span><div class="tox-tbtn__select-chevron"><svg width="10" height="10"><path d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 0 1 0-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z" fill-rule="nonzero"></path></svg></div></button></div><div role="toolbar" data-alloy-tabstop="true" tabindex="-1" class="tox-toolbar__group"><button aria-label="More..." title="More..." aria-haspopup="true" type="button" data-alloy-tabstop="true" tabindex="-1" class="tox-tbtn tox-tbtn--enabled" aria-expanded="true" aria-owns="aria-owns_5498602821121655119228608"><span class="tox-icon tox-tbtn__icon-wrap"><svg width="24" height="24"><path d="M6 10a2 2 0 0 0-2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2 2 2 0 0 0-2-2zm12 0a2 2 0 0 0-2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2 2 2 0 0 0-2-2zm-6 0a2 2 0 0 0-2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2 2 2 0 0 0-2-2z" fill-rule="nonzero"></path></svg></span></button></div></div></div><div class="tox-anchorbar"></div></div><div class="tox-sidebar-wrap"><div class="tox-edit-area"><iframe id="about_footer_ifr" allowtransparency="true" title="منطقة نص منسق. اضغط ALT-0 للحصول على المساعدة." class="tox-edit-area__iframe" frameborder="0"></iframe></div><div role="complementary" class="tox-sidebar"><div data-alloy-tabstop="true" tabindex="-1" class="tox-sidebar__slider tox-sidebar--sliding-closed" style="width: 0px;"><div class="tox-sidebar__pane-container"></div></div></div></div></div><div class="tox-statusbar"><div class="tox-statusbar__text-container"><div role="navigation" data-alloy-tabstop="true" class="tox-statusbar__path"></div><span class="tox-statusbar__branding"><a href="https://www.tiny.cloud/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce&amp;utm_content=v5" rel="noopener" target="_blank" tabindex="-1" aria-label="مدعوم من Tiny">مدعوم من Tiny</a></span></div><div title="تغيير حجم" class="tox-statusbar__resize-handle"><svg width="10" height="10"><g fill-rule="nonzero"><path d="M8.1 1.1A.5.5 0 1 1 9 2l-7 7A.5.5 0 1 1 1 8l7-7zM8.1 5.1A.5.5 0 1 1 9 6l-3 3A.5.5 0 1 1 5 8l3-3z"></path></g></svg></div></div><div aria-hidden="true" class="tox-throbber" style="display: none;"></div></div>
                                            </div> --}}
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel"
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
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-five-backup" role="tabpanel"
                            aria-labelledby="custom-tabs-five-backup-tab">
                            <div class="p-2" style="background-color: #f3f6f8;">
                                <div class="card">
                                    <div class="card-body">
                                        <form wire:submit.prevent="updateSetting">
                                            <div class="form-group">
                                                <label class="control-label">التوقيت</label>
                                                <select class="form-control">
                                                    <option value=''>everyFiveMinutes()</option>
                                                    <option value=''>everyTenMinutes()</option>
                                                    <option value=''>everyFifteenMinutes()</option>
                                                    <option value=''>everyThirtyMinutes()</option>
                                                    <option value=''>hourly()</option>
                                                    <option value=''>hourlyAt(17)</option>
                                                    <option value=''>daily()</option>
                                                    <option value=''>dailyAt('13:00')</option>
                                                    <option value=''>twiceDaily(1, 13)</option>
                                                    <option value=''>weekly()</option>
                                                    <option value=''>weeklyOn(1, ‘8:00’)</option>
                                                    <option value=''>monthly()</option>
                                                    <option value=''>monthlyOn(4, ’15:00′)</option>
                                                    <option value=''>quarterly()</option>
                                                    <option value=''>yearly()</option>
                                                </select>
                                                {{-- <input type="text"  wire:model.defer="state.site_name" class="form-control" name="application_name" placeholder="اسم التطبيق" dir="rtl"> --}}
                                            </div>


                                        </div>
                                        <div class="card-footer">
                                            {{-- <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button> --}}
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


{{-- <div class="col-lg-6 col-md-12">
                                            <div class="card">
                                                <div class="card-header with-border">
                                                    <h3 class="card-title">نمط الصيانة</h3>
                                                </div>
                                                <form action="" method="post" accept-charset="utf-8">
                                                    <div class="card-body">

                                                        <div class="form-group">
                                                            <label class="control-label">عنوان</label>
                                                            <input type="text" class="form-control" name="maintenance_mode_title" placeholder="عنوان" value="Coming Soon" dir="rtl">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">وصف</label>
                                                            <textarea class="form-control text-area" name="maintenance_mode_description" placeholder="وصف" style="min-height: 100px;" dir="rtl">Our website is under construction. We'll be here soon with our new awesome site.</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-12">
                                                                    <label>حالة المنتج</label>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12 col-option">
                                                                    <input type="radio" name="maintenance_mode_status" value="1" id="maintenance_mode_status_1" class="square-purple" checked>
                                                                    <label for="maintenance_mode_status_1" class="option-label">{{ __('enable') }}</label>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-12 col-option">
                                                                    <input type="radio" name="maintenance_mode_status" value="0" id="maintenance_mode_status_2" class="square-purple" >
                                                                    <label for="maintenance_mode_status_2" class="option-label">{{  __('disable')}}</label>
                                                                </div
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>صورة</label>: assets/img/maintenance_bg.jpg
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary pull-right">حفظ التغييرات</button>
                                                    </div>
                                                </form>
                                            </div>
                                    </div> --}}
