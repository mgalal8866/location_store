
<div>
    <div wire:ignore.self class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <h4 class="modal-title">{{ __('tran.newcategory')}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <form wire:submit.prevent="create" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                        <div class="form-group">
                         <label>{{ __('tran.namecategory')}}</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" wire:model="name" placeholder="{{ __('tran.name')  .   __('tran.category')}}" autofocus>
                            @error('namec')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select Image :
                                ( @if($image)
                                {{$image->getClientOriginalName()}}
                                <img src="{{$image->temporaryUrl()}}" alt="favicon" style="max-width: 100px; max-height: 100px;">

                                @endif )</label>
                            <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false; progress = 5" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <a class="btn btn-success btn-sm btn-file-upload">
                                    اختر صورة <input type="file" name="file" size="40"
                                        accept=".png, .jpg, .jpeg, .gif" wire:model='image' required>
                                </a>
                            <div  x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                <div class="progress-bar bg-success  progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                            {{-- <span wire:ignore class='badge badge-info' id="upload-file-info2"></span> --}}
                        </div>
                        <div class="form-group">
                            <label>{{__('tran.parentselect')}}</label>
                            <select   wire:model="parent" class="form-control">
                             <option value="">{{__('tran.parentselect')}}</option>
                            @foreach($categorys as $itemm)
                                @if (!$itemm->parent_id)
                                    <option value="{{$itemm->id}}">{{$itemm->name}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('tran.close') }}</button>
           <span  x-on:click="on = false">
              <button type="submit"  class="btn btn-primary"  >{{ __('tran.save') }}</button>
            </span>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
