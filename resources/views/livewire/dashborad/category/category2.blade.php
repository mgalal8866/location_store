<div>
    {{-- @livewire('dashborad.category.category-form') --}}
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
<div wire:ignore.self class="modal fade" id="modalForm">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">{{ __('tran.newcategory')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @livewire('dashborad.category.category-form')
      </div>
    </div>
</div>
{{-- <div wire:ignore.self class="modal fade" id="modal-edite">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">{{ __('tran.newcategory')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @livewire('dashborad.category.category-form')
      </div>
    </div>
</div> --}}
<div wire:ignore.self class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title">{{ __('tran.newcategory')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- @livewire('dashborad.category.category-form') --}}
      </div>
    </div>
</div>


 <div class="card">

        <div class="card-header" >
            <button class="btn btn-success  btn-sm float-right" data-toggle="modal" data-target="#modalForm"> <i class=" fas fa-plus fa-fw"></i> {{ __('tran.newcategory') }}</button>
        </div>
        <div wire:ignore.self class="card-body p-0">
            <table class="table table-hover  table-striped">
                <thead>
                    <tr>
                        <th>{{ (__('tran.name')) }}</th>
                        <th>{{ (__('info')) }}</th>
                        <th>{{ (__('tran.image')) }}</th>
                        <th>{{ (__('tran.action')) }}</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach( $categorys  as $category )
                        @if(!$category->parent_id)
                            <tr >
                                {{-- @if($category->childrens->count() > 0) data-widget="expandable-table" aria-expanded="false" @endif --}}
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
                                            <i class="fa fa-university" aria-hidden="true">{{$category->store->count()}}</i>

                                        </td>
                                        <td>
                                            <img alt="{{$category->name}}" class="table-avatar" src="{{$category->image}}">
                                        </td>
                                        <td >
                                            <div>
                                                <button class="btn btn-warning  btn-sm"   wire:click="selectmodel('{{ $category->slug }}','updata')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click="selectmodel('{{ $category->slug }}','delete')"><i class="fas fa-trash"></i> {{ __('tran.delete') }} </button>
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
                                    <td colspan="4">
                                        <div class="p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>{{ (__('tran.name')) }}</th>
                                                        <th>{{ (__('info')) }}</th>
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
                                                                <i class="fa fa-university" aria-hidden="true">{{$child->store->count()}}</i>
                                                            </td>
                                                            <td>
                                                                <img alt="{{$child->name}}" class="table-avatar" src="{{$child->image}}">

                                                            </td>
                                                            <td>

                                                                <button class="btn btn-warning  btn-sm"   wire:click="selectmodel('{{ $child->slug }}','updata')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>

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
