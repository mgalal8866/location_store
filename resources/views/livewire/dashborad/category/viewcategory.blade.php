<div>
    @include('livewire.dashborad.category.CreateCategory')
    @include('livewire.dashborad.category.EditCategory')
    @include('livewire.dashborad.category.DeleteCategory')
    @section('title')
    Category
    @stop
    @section('page')
    Category
    @endsection
    @section('page2')
    Category
    @endsection
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
            <table class="table table-hover  table-striped">
                <thead>
                    <tr>
                        <th>{{ (__('tran.name')) }}</th>
                        <th>{{ (__('tran.image')) }}</th>
                        <th>{{ (__('tran.action')) }}</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach( $categorys  as $category )
                        @if(!$category->parent_id)
                            <tr  @if($category->childrens->count() > 0) data-widget="expandable-table" aria-expanded="false" @endif>
                                        <td>
                                            @if($category->childrens->count() > 0)
                                                <span class="badge badge-info">
                                                    <i class="expandable-table-caret  fas fa-caret-right fa-fw"></i>
                                                    {{$category->childrens->count()}}
                                                </span>
                                            @endif
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            <img alt="Avatar" class="table-avatar" src="{{$category->image}}">
                                        </td>
                                        <td >
                                            <div>
                                                {{-- data-backdrop="static"  --}}
                                                <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit"  wire:click="edit('{{ $category->slug }}','{{ ($categorys->where('id',$category->parent_id)->first()->slug)??'' }}')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click="view('{{ $category->slug }}','{{$category->name}}')"><i class="fas fa-trash"></i> {{ __('tran.delete') }} </button>
                                                <div class="btn-group">
                                                     {!!$category->active!!}
                                                       <div class="dropdown-menu">
                                                           <button class="dropdown-item"  wire:click="active('{{ $category->slug }}')"  href="">Active</button>
                                                           <button class="dropdown-item"   wire:click="active('{{ $category->slug }}')" href="">Deactivate</button>
                                                       </div>
                                                </div>
                                            </div>
                                        </td>
                            </tr>
                        @endif
                        @if($category->childrens->count() > 0)
                             <tr  class="expandable-body">
                                    <td colspan="3">
                                        <div class="p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>{{ (__('tran.name')) }}</th>
                                                        <th>{{ (__('tran.image')) }}</th>
                                                        <th>{{ (__('tran.action')) }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($category->childrens as $child)
                                                        <tr>
                                                            <td>
                                                                {{$child->name}}
                                                            </td>
                                                            <td>
                                                                <img alt="Avatar" class="table-avatar" src="{{$child->image}}">

                                                            </td>
                                                            <td>
                                                                <button class="btn btn-warning  btn-sm {{$child->parent_id}}"  data-toggle="modal" data-target="#modal-edit" wire:click="edit('{{ $child->slug }}','{{ ($categorys->where('id',$child->parent_id)->first()->slug)??'' }}')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click.prevent="view('{{ $child->slug }}','{{$child->name}}')"><i class="fas fa-trash"></i>{{ __('tran.delete') }} </button>
                                                                <div class="btn-group">
                                                                    {!!$child->active!!}
                                                                      <div class="dropdown-menu">
                                                                          <button class="dropdown-item"  wire:click="active('{{ $child->slug }}')"  href="">Active</button>
                                                                          <button class="dropdown-item"   wire:click="active('{{ $child->slug }}')" href="">Deactivate</button>
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
                        @endif
                     @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer" >
            <div class="d-flex justify-content-center">
                {!! $categorys->links() !!}
            </div>
        </div>
    </div>
</div>
