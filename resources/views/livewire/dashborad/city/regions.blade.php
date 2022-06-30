<div>
    @section('title')
    {{ __('region') }}
    @stop
    @section('page')
    {{ __('region') }}
    @endsection
    @section('page2')
    {{ __('region') }}
    @endsection
      <!-- Edit -->
    <div wire:ignore.self class="modal fade" id="edit-region" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputName">{{ __('name_en')}}</label>
                                <input type="text" id="inputName" wire:model.lazy='nameen' class="form-control @error('nameen') is-invalid @enderror" required>
                                @error('nameen')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputName">{{ __('name_ar')}}</label>
                                <input type="text" id="inputName" wire:model.lazy='namear' class="form-control @error('namear') is-invalid @enderror" required >
                                @error('namear')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('close') }}</button>
                    <button wire:click='newragion' type="button" class="btn btn-primary">{{ __('save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete -->
    <div wire:ignore.self class="modal fade" id="delete-region" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('delete')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                        Are you sure for delete ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('close') }}</button>
                    <button wire:click="deletregion('soft')"  type="button" class="btn btn-warning">{{ __('softDelete') }}</button>
                    <button wire:click="deletregion('hard')"  type="button" class="btn btn-danger">{{ __('hardDelete') }}</button>

                </div>
            </div>
        </div>
    </div>
        <div class="card">
                <div class="card-header">
                    <button wire:click="$set('modeedit', false)" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit-region">
                        <i class=" fas fa-plus fa-fw"></i> {{ __('new_region') }}
                      </button>
                    <a href="{{ route('city') }}" class="btn btn-outline-success">Back <i class="fas fa-backspace    "></i></a>
                    {{-- <center><strong>{{ $regions->city->name }}</strong></center> --}}
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('name') }}</th>
                                <th width="240">{{ __('active') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ( $regions  as $region )
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$region->name}}</td>
                                    <td>
                                        <button wire:click="editregion({{ $region->id}},true)" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-region"><i class="fas fa-pencil-alt"></i> {{ __('tran.edit') }}</button>
                                        <button wire:click="delete({{ $region->id}})"          class="btn btn-danger  btn-sm" data-toggle="modal" data-target="#delete-region"><i class="fas fa-trash-alt"></i> {{ __('tran.delete') }}</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspen="3"> No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
