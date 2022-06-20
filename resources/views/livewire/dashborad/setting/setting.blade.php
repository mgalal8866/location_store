<div>
    @section('title')
        {{ setting('site_title') }}- Setting App
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
                        <h4>{{__('setting')}}</h4>
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div wire:ignore  class="nav flex-column nav-tabs h-100" id="vert-tabs-tab"
                                    role="tablist" aria-orientation="vertical">
                                        @foreach ($settings_sections as $settings_section)
                                            <a  wire:click="$set('section', '{{ $settings_section }}')" class="nav-link {{$loop->index == 0 ? 'active' : ''}}" id="{{ $settings_section }}-tab"
                                            data-toggle="pill" href="#{{ $settings_section }}" role="tab"
                                            aria-controls="{{ $settings_section }}"
                                            aria-selected="true"> {{ __($settings_section) }}</a>
                                        @endforeach
                                </div>
                            </div>
                            <div class="col-7 col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    @foreach ($settings_sections as $settings_section)
                                        <div class="tab-pane text-left fade  {{$loop->index == 0 ? ' show active ' : ''}} "
                                            id="{{$settings_section}}" role="tabpanel"
                                            aria-labelledby="{{$settings_section}}-tab">
                                            <form>
                                                @foreach ($settings as $setting)
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="title">{{ __($setting->display_name) }}</label>
                                                                    @if ($setting->type == 'text')
                                                                    {{$setting->type}}
                                                                    <input type="text" wire:model='valueform.{{ $loop->index }}.value'  id="value{{ $loop->index }}" class="form-control" >
                                                                    {{-- @elseif($setting->type == 'image')
                                                                        <input type="file"  wire:model='valueform.{{ $loop->index }}.value' name="value[{{ $loop->index }}]" id="value" class="form-control">
                                                                    --}}@endif
                                                                    @error('value')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endforeach
                                                <div class="text-right">
                                                    <button type="submit" wire:click.prevent='up'  class="btn btn-primary">{{__('save')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>

</div>
