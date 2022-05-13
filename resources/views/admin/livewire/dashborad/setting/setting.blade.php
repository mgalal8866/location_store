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
            background-color: {{config('setting_var.color.btn')}};
            border-color:  {{config('setting_var.color.btn')}};
        }

        .btn-success:hover, .btn-success:focus, .btn-success:active {
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
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            color: #fff;
            background-color: #0e7bb8 !important;
            border-color: #0e7bb8 !important;
        }
        </style>
    @endpush


    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                
                <h3 class="card-title">{{ __('tran.images') }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
    
                            <div class="form-group">
    
                                <label class="control-label">Logo (180x50px)</label>
                                <div style="margin-bottom: 10px;">
                                    <img src="{{ URL::asset('assets') .'/'. config('setting_var.images.logo')}}" alt="logo" style="max-width: 160px; max-height: 160px;">
                                </div>
                                <div class="display-block">
                                    <a class='btn btn-success btn-sm btn-file-upload'>
                                        {{ __('tran.selectlogo') }}
                                        <input type="file" id="exampleInputName"  accept=".png" wire:model="logo" onchange="$('#upload-file-info1').html($(this).val());">
                                    </a>
                                    (.png)
                                </div>
                                @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                                <span wire:ignore  class='badge badge-info' id="upload-file-info1"></span>
                            </div>
    
                            <div class="form-group">
                                <label class="control-label">favicon (16x16px)</label>
                                <div style="margin-bottom: 10px;">
                                    <img src="{{ URL::asset('assets') .'/'. config('setting_var.images.favicon')}}" alt="favicon" style="max-width: 100px; max-height: 100px;">
                                </div>
                                <div class="display-block">
                                    <a class='btn btn-success btn-sm btn-file-upload'>
                                        {{ __('tran.selectfevicon') }}
                                        <input type="file" id="exampleInputName1" wire:model="favicon"  accept=".ico" onchange="$('#upload-file-info2').html($(this).val());">
                                     </a>
                                    (.ico)
                                </div>
                                @error('favicon') <span class="text-danger">{{ $message }}</span> @enderror
                                <span wire:ignore class='badge badge-info' id="upload-file-info2"></span>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save Change</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    

    </div>
</div>
