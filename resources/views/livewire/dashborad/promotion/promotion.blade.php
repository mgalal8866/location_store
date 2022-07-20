<div>
    @push('csslive')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    @endpush
    <div wire:ignore.self id="modal-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">{{__('harddelete')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Promotion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>{{ __('title')}}</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" wire:model="title" placeholder="{{ __('title') }}" autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('description')}}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" type="text" wire:model="description" placeholder="{{ __('description') }}" > </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    @if ($image)
                    Photo Preview:
                    <img src="{{ $image->temporaryUrl() }}">
                @endif

                <input type="file" wire:model="image">

                @error('image') <span class="error">{{ $message }}</span> @enderror
                    <div class="form-group">
                        <div style="margin-bottom: 10px;">
                        @if($image)
                          <img src="{{ $image->temporaryUrl() }}" alt="ssasa" style="max-width: 100px; max-height: 100px;">
                          @endif
                        </div>
                        <label class="control-label">Select Image :
                            @if($image)
                            {{-- {{dd($image->temporaryUrl() )}} --}}
                            {{$image->getClientOriginalName()}}
                            @endif </label>
                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <a class="btn btn-success btn-sm btn-file-upload">
                                اختر صورة <input type="file" name="file" size="40"
                                    accept=".png, .jpg, .jpeg, .gif" wire:model='image' >
                            </a>

                        <div  x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                            <div class="progress-bar bg-success  progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                    </div>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>

                </form>
            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="edit()" class="btn btn-danger close-modal" data-dismiss="modal">{{__('harddelete')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" >
            <button class="btn btn-success  btn-sm float-right" data-toggle="modal" data-target="#modal-create"> <i class=" fas fa-plus fa-fw"></i> {{ __('newpromtion') }}</button>
        </div>
        <div class="card-body">
            <table class="table table-striped table-inverse">

                <thead class="thead-inverse">
                    <tr>
                        <th>{{__('title')}}</th>
                        <th>{{__('description')}}</th>
                        <th>{{__('image')}}</th>
                        <th>{{__('action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $promotion as $prom )
                        <tr>
                            <td scope="row">{{$prom->title}}</td>
                            <td>{{$prom->description}}</td>
                            <td>
                                <img class="table-avatar" src="{{$prom->image}}" alt=">{{$prom->title}}">
                            </td>
                            <td>
                                <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit" ><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click.prevent="view('{{$prom->id}}')"><i class="fas fa-trash"></i> {{ __('tran.delete') }} </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><center> No data </center></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
