<div>
    @include('livewire.category.CreateCategory')
    @include('livewire.category.EditCategory')
    @include('livewire.category.DeleteCategory')
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
                  @foreach( $category  as $item )
                        @if(!$item->parent_id)
                            <tr  @if($item->childrens->count() > 0) data-widget="expandable-table" aria-expanded="false" @endif>
                                        <td>
                                            @if($item->childrens->count() > 0)
                                                <span class="badge badge-info">
                                                    <i class="expandable-table-caret  fas fa-caret-right fa-fw"></i>
                                                    {{$item->childrens->count()}}
                                                </span>
                                            @endif

                                            {{$item->name}}

                                        </td>
                                        <td>
                                            <img alt="Avatar" class="table-avatar" src="{{$item->image}}">
                                        </td>
                                        <td >
                                            <div>
                                                <button data-backdrop="static" class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit"  wire:click="edit('{{ $item->slug }}','{{ ($category->where('id',$item->parent_id)->first()->slug)??'' }}')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click="view('{{ $item->slug }}','{{$item->name}}')"><i class="fas fa-trash"></i> {{ __('tran.delete') }} </button>
                                                <div class="btn-group">
                                                     {!!$item->active!!}
                                                       <div class="dropdown-menu">
                                                           <button class="dropdown-item"  wire:click="active('{{ $item->slug }}')"  href="">Active</button>
                                                           <button class="dropdown-item"   wire:click="active('{{ $item->slug }}')" href="">Deactivate</button>
                                                       </div>
                                                </div>
                                            </div>
                                        </td>
                            </tr>
                        @endif
                        @if($item->childrens->count() > 0)
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
                                                    @foreach($item->childrens as $child)
                                                        <tr>
                                                            <td>
                                                                {{$child->name}}
                                                            </td>
                                                            <td>
                                                                <img alt="Avatar" class="table-avatar" src="{{$child->image}}">

                                                            </td>
                                                            <td>
                                                                <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit" wire:click="edit('{{ $child->slug }}','{{ ($category->where('id',$child->parent_id)->first()->slug)??'' }}')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
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
                {!! $category->links() !!}
            </div>
        </div>
    </div>
</div>
