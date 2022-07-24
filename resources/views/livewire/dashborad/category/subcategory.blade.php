<div>

    <div wire:ignore.self  class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ __('tran.delcategory') }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div wire:loading>

              Processing ...

           </div>
            <div class="modal-body">
              <p>  {{ __('tran.surefordelete') }} </p>
              <p>
                @isset($name)
                <strong>{{ $name }} </strong>
                @endisset
                &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button  wire:loading.attr="disabled" type="button" class="btn btn-outline-light" data-dismiss="modal">{{ __('tran.close') }}</button>
              <button  wire:loading.attr="disabled" type="button" class="btn btn-danger" wire:click="delete()">{{ __('tran.delete') }}</button>
            </div>
          </div>
        </div>
      </div>
{{-- ################# MODEL edit ################# --}}
<div wire:ignore.self class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">{{ __('tran.editcategory')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="update()" >
                    @csrf
                <div  class="modal-body">
                            <div class="form-group">
                                <label>{{ __('tran.namecategory')}}</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" wire:model.defer="name" placeholder="{{ __('name_category')}}" >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                    <div class="form-group">
                                        <div style="margin-bottom: 10px;">
                                          <img src="{{$photo ??''}}" alt="" style="max-width: 100px; max-height: 100px;">
                                        </div>
                                        <label class="control-label">Select Image : </label>
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
                            </div>
                            {{-- <div class="form-group">
                                <label>{{__('tran.parentselect')}}</label>
                                <select   wire:model="parent" class="form-control">
                                <option value="">{{__('tran.parentselect')}}</option>
                                @foreach($categorys as $itemm)

                                        <option value="{{$itemm->slug}}">{{$itemm->name}}</option>

                                @endforeach
                                </select>
                            </div> --}}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('tran.close') }}</button>
                    <span  x-on:click="on = false">
                    <button type="submit" id="sdsd"class="btn btn-primary"  >{{ __('tran.save') }}</button>
                    </span>
                </div>
            </form>
      </div>
      <!-- /.modal-content -->
    </div>
</div>
{{-- ################# MODEL NEW ################# --}}
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
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" wire:model.defer="name" placeholder="{{ __('tran.name')  .   __('tran.category')}}" >
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Image :
                                        @if($image)
                                            {{$image->getClientOriginalName()}}
                                            <img src="{{$image->temporaryUrl()}}" alt="" style="max-width: 100px; max-height: 100px;">
                                        @endif
                                    </label>
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

        @push('csslive')
            <style>
            img.table-avatar,
                .table-avatar img {
                    border-radius: 50%;
                    display: inline;
                    width: 2.5rem;
                }
            </style>
        @endpush
        <div class="card">
            <div class="card-header" >
                <button class="btn btn-success  btn-sm float-right" data-toggle="modal" data-target="#modal-create"> <i class=" fas fa-plus fa-fw"></i> {{ __('tran.newcategory') }}</button>
            </div>
            <div wire:ignore.self class="card-body p-0">
                <tr  class="expandable-body">
                    <td colspan="4">
                        <div class="p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{ (__('tran.name')) }}</th>
                                        <th>{{ (__('main')) }}</th>
                                        <th>{{ (__('info')) }}</th>
                                        <th>{{ (__('tran.image')) }}</th>
                                        <th>{{ (__('tran.action')) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mcategorys  as $category)
                                            <tr>
                                                <td> {{$category->name}} </td>
                                                <td>{{$category->_parent->name}} </td>
                                                <td>
                                                    <i class="fa fa-university" aria-hidden="true">{{$category->store->count()}}</i>
                                                </td>
                                                <td>
                                                    <img alt="{{$category->name}}" class="table-avatar" src="{{$category->image}}">
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning  btn-sm {{$category->parent_id}}"  data-toggle="modal" data-target="#modal-edit" wire:click="edit('{{ $category->slug }}','{{ ($mcategorys->where('id',$category->parent_id)->first()->slug)??'' }}')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click.prevent="view('{{ $category->slug }}','{{$category->name}}')"><i class="fas fa-trash"></i>{{ __('tran.delete') }} </button>
                                                    <div class="btn-group"> {!!$category->active!!}
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item"  wire:click="active('{{ $category->slug }}')"  href="">Active</button>
                                                            <button class="dropdown-item"   wire:click="active('{{ $category->slug }}')" href="">Deactivate</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </div>
            <div class="card-footer" >
                <div class="d-flex justify-content-center">
                    {!! $mcategorys->links() !!}
                </div>
            </div>
        </div>
</div>
