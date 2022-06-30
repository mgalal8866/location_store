<div>
    @section('title')
        {{ getSettingsOf('site_title') }}- Setting App
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
            <div class="card">
                <div class="card-body">
                    <h4>{{ __('setting') }}</h4>
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div wire:ignore class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                aria-orientation="vertical">
                                @foreach ($settings_sections as $settings_section)
                                    <a wire:click="$set('section', '{{ $settings_section }}')"
                                        class="nav-link {{ $loop->index == 0 ? 'active' : '' }}"
                                        id="{{ $settings_section }}-tab" data-toggle="pill"
                                        href="#{{ $settings_section }}" role="tab"
                                        aria-controls="{{ $settings_section }}" aria-selected="true">
                                        {{ __($settings_section) }}</a>
                                @endforeach
                                <a class="nav-link " id="notifysetting-tab" data-toggle="pill" href="#notifysetting"
                                    role="tab" aria-controls="notifysetting" aria-selected="true">Cron Job</a>

                                <a class="nav-link " id="tasklog-tab" data-toggle="pill" href="#tasklog" role="tab"
                                    aria-controls="tasklog" aria-selected="true">Task Log</a>
                                <a class="nav-link " id="images-tab" data-toggle="pill" href="#images" role="tab"
                                    aria-controls="images" aria-selected="true">{{__('images')}}</a>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div wire:ignore.self class="tab-content" id="vert-tabs-tabContent">
                                @foreach ($settings_sections as $settings_section)
                                    {{-- @foreach ($settings->where('section', $section) as $setting) --}}

                                    <div wire:ignore.self
                                        class="tab-pane text-left fade  {{ $loop->index == 0 ? ' show active ' : '' }} "
                                        id="{{ $settings_section }}" role="tabpanel"
                                        aria-labelledby="{{ $settings_section }}-tab">
                                        <form id="f{{ $settings_section }}">
                                            @foreach ($settings->where('section', $settings_section) as $setting)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="title">{{ __($setting->display_name) }}</label>
                                                            @if ($setting->type == 'text')
                                                                @if ($valueform[$loop->index]['type'] == 'text')
                                                                    <input type="text"
                                                                        wire:model.dafer='valueform.{{ $loop->index }}.value'
                                                                        id="value{{ $loop->index }}"
                                                                        class="form-control">
                                                                @endif
                                                            @endif
                                                            @if ($setting->type == 'boolean')
                                                            {!! Form::select('value[' . $loop->index . ']', explode('|', $setting->details) , $setting->value , ['id' => 'value', 'class' => 'form-control',  ' wire:model.dafer' => 'valueform.'. $loop->index .'.value',]) !!}


                                                            @endif
                                                            @error('value')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="text-right">
                                                <button type="submit"
                                                    wire:click.prevent="up('{{ $settings_section }}')"
                                                    class="btn btn-primary" wire:loading.attr="disabled">{{ __('save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- @endforeach --}}
                                @endforeach
                                <div wire:ignore.self class="tab-pane text-left fade " id="notifysetting"
                                    role="tabpanel" aria-labelledby="notifysetting-tab">
                                    {{-- <div class="card">
                                            <div class="card-body"> --}}
                                    <div class="form-group">
                                        <label class="control-label">Auto Notify </label>
                                        <small class="text-danger">التغير يحفظ تلقائي</small>
                                        <select wire:model='notifytime' class="form-control">
                                            <option value='0 * * * *'>Hourly</option>
                                            <option value='0 0 * * *'>Daily</option>
                                            <option value='0 0 0 * *'>Weekly</option>
                                            <option value='0 0 1 * *'>Monthly</option>
                                            <option value='0 0 0 1 1'>Yearly</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Back Up Google</label>
                                        <small class="text-danger">التغير يحفظ تلقائي</small>
                                        <select wire:model='backupgoogle' class="form-control">
                                            <option value='0 * * * *'>Hourly</option>
                                            <option value='0 0 * * *'>Daily</option>
                                            <option value='0 0 0 * *'>Weekly</option>
                                            <option value='0 0 1 * *'>Monthly</option>
                                            <option value='0 0 0 1 1'>Yearly</option>
                                        </select>
                                    </div>
                                    {{-- </div>
                                        </div> --}}
                                </div>
                                <div wire:ignore.self class="tab-pane text-left fade " id="tasklog" role="tabpanel"
                                    aria-labelledby="tasklog-tab">
                                    <div class="card-header">
                                        <button wire:click='clearall' type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit-region">
                                            <i class="fas fa-trash-alt    "></i> {{ __('clear-all') }}
                                          </button>
                                    </div>
                                    <table class=" table table-responsive-sm table-striped table-bordered">
                                    {{-- <table class="table table-sm table-inverse table-responsive"> --}}
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>state</th>
                                                <th>type</th>
                                                <th>create</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tasklog  as $log)
                                                <tr>
                                                    <td scope="row">{{ $log->state }} </td>
                                                    <td>{{ $log->type }} </td>
                                                    <td>{{ $log->created_at->toFormattedDate() }} -
                                                        {{ $log->created_at->toFormattedTime() }} </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No data</td>

                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div wire:ignore.self class="tab-pane text-left fade " id="images" role="tabpanel"
                                aria-labelledby="images-tab">
                                    <div class="card-header">

                                        <table class="table table-responsive-sm table-striped table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('image')}}</th>
                                                    <th>{{__('image')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Splash</td>
                                                    <td>
                                                        <img src="{{ asset('assets/images/'.$images)}}" alt="Splash" style="height: 100px; width: 200px"  class="img-thumbnail">
                                                    </td>
                                                    <td>

                                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                                <a class="btn btn-success btn-sm btn-file-upload">
                                                                    اختر صورة <input type="file" name="file" size="40"
                                                                        accept=".png, .jpg, .jpeg, .gif" wire:model='importsplash' required>
                                                                </a>
                                                            <div  x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                                                <div class="progress-bar bg-success  progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                                    <span class="sr-only">40% Complete (success)</span>
                                                                </div>
                                                            </div>
                                                            <button  wire:loading.attr="disabled"  wire:click='uploadsplash' type="button" class="btn btn-outline-success btn-sm"> {{__('save')}} </button>

                                                        </div>

                                                        </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
