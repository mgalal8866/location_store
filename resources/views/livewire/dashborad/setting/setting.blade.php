<div>
    @section('title')
        Setting App
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

    <div class="row">
        <a href="{{ route('languages.index') }}"
            class="btn btn-primary">{{ __('translation::translation.language') }}</a>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="card   card-success card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" id="custom-tabs-five-overlay-tab" data-toggle="pill"
                                href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay"
                                aria-selected="true">{{ __('image') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill"
                                href="#custom-tabs-five-overlay-dark" role="tab"
                                aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">{{__('message')}}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-five-normal-tab" data-toggle="pill"
                                href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal"
                                aria-selected="false">{{ __('settingapp') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                        <div class="tab-pane fade  active show" id="custom-tabs-five-overlay" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-tab">
                            <div class="overlay-wrapper">
                                {{-- <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2">Loading...</div>
                                </div> --}}
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
                                                        <span wire:ignore class='badge badge-info'
                                                            id="upload-file-info1"></span>
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
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel"
                            aria-labelledby="custom-tabs-five-overlay-dark-tab">
                            <div class="overlay-wrapper">
                                @isset($slot)
                                    {{ $slot }}
                                @endisset
                                @include('translation::languages.index')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-five-normal" role="tabpanel"
                            aria-labelledby="custom-tabs-five-normal-tab">
                            Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                            ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                            cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis
                            posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere
                            nec nunc. Nunc euismod pellentesque diam.
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>
</div>
