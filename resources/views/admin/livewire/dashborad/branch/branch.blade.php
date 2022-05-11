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

    <form wire:submit.prevent="save"  enctype="multipart/form-data">
        @csrf
        <div class="row" >
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">{{ __('tran.store') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">{{ __('tran.store') .  __('tran.name')  }}*</label>
                        <input type="text" id="inputName" wire:model='name' class="form-control @error('name') is-invalid @enderror" >
                        @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="inputClientCompany">{{__('tran.code')  }}*</label>
                        <input type="text" id="inputClientCompany" wire:model='code' class="form-control @error('code') is-invalid @enderror">
                        @error('code')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="inputDescription">{{ __('tran.description')}}</label>
                        <textarea id="inputDescription" class="form-control @error('description') is-invalid @enderror"  wire:model='description'  rows="4"></textarea>
                        @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>

                    <div class="row" >
                        {{-- <div class="col-md-6" >
                        <div class="form-group">
                            <label for="inputStatus">{{ __('tran.unit') }}</label>
                            <select id="inputStatus" class="form-control @error('unit_id') is-invalid @enderror custom-select" wire:model='unit_id' >
                            <option value="" selected>{{  __('tran.select'). __('tran.unit') }}</option>
                            @foreach ( $units as $item )
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                            @error('unit_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        </div> --}}
                        <div class="col-md-6" >
                        {{-- <div class="form-group">
                            <label for="inputStatus">{{ __('tran.category') }}</label>
                            <select id="inputStatus" class="form-control @error('category_id') is-invalid @enderror custom-select" wire:model='category_id' >
                            <option value="" selected >{{  __('tran.select'). __('tran.category') }}</option>
                                @foreach ( $category as $item )
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div> --}}
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="inputStatus">{{ __('tran.warehouse') }}</label>
                        <select id="inputStatus" class="form-control @error('warehouse_id') is-invalid @enderror custom-select" wire:model='warehouse_id' >
                        <option value="" selected>{{  __('tran.select'). __('tran.warehouse') }}</option>
                            @foreach ( $warehouse as $item )
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('warehouse_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                    </div> --}}
                    </div>

                    <!-- /.card-body -->
                </div>

            </div>

        </div>
        <div class="row" >
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">{{ __('tran.branches') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">{{ __('tran.store') .  __('tran.name')  }}*</label>
                            <input type="text" id="inputName" wire:model='name' class="form-control @error('name') is-invalid @enderror" >
                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="row" >
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="inputStatus">{{ __('tran.timeopen') }}</label>
                                    <input  class="form-control" type="time" id="appt" name="appt"  required>
                                    @error('origin')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="inputStatus">{{ __('tran.timeclose') }}</label>
                                    <input  class="form-control" type="time" id="appt" name="appt" required>
                                    @error('activesubstance')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
