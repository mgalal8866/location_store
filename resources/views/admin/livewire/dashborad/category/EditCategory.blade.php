<div>
    <div wire:ignore.self class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <h4 class="modal-title">{{ __('tran.newcategory')}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <form wire:submit="update()" enctype="multipart/form-data">
            
            <div class="modal-body">
                        <div class="form-group">
                         <label>{{ __('tran.namecategory')}}</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" wire:model="name" placeholder="{{ __('tran.name')  .   __('tran.category')}}" autofocus>
                            @error('name')
                            {{-- @if($errors->has('name')) --}}
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select Image : </label>
                            <div style="margin-bottom: 10px;">
                                <img src="{{$slug?$category->where('slug',$slug)->first()->image:'' }}" alt="favicon" style="max-width: 100px; max-height: 100px;">

                            </div>
                            <div class="display-block">
                                <a class='btn btn-success btn-sm btn-file-upload'>
                                    {{ __('tran.selectimage') }}
                                    <input type="file" id="exampleInputName1" wire:model="image" accept=".png" onchange="$('#upload-file-info2').html($(this).val());">
                                 </a>
                                (.png)
                            </div>
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                            <span wire:ignore class='badge badge-info' id="upload-file-info2"></span>
                        </div>
                        <div class="form-group">
                            <label>{{__('tran.parentselect')}}</label>
                            <select   wire:model="parent" class="form-control">
                             <option value="">{{__('tran.parentselect')}}</option>
                            @foreach($category as $itemm)
                                @if (!$itemm->parent_id && $slug != $itemm->slug )
                                    <option value="{{$itemm->slug}}">{{$itemm->name}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('tran.close') }}</button>
           <span  x-on:click="on = false">
              <button type="submit" class="btn btn-primary"  >{{ __('tran.save') }}</button>
            </span>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
