<div>
    {{-- @include('livewire.dashborad.category.CreateCategory') --}}
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
                        <th>{{ (__('info')) }}</th>
                        <th>{{ (__('tran.image')) }}</th>
                        <th>{{ (__('tran.action')) }}</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach( $categorys  as $category )
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>

                                     <a href="{{ route('subcategory', ['slug'=> $category->slug ]) }}">
                                        <span class="badge badge-info"><i class="far fa-eye"></i>
                                                {{$category->childrens->count() }}
                                        </span>
                                    </a>
                                    @if ($category->store->count())
                                    <span class="badge badge-info">
                                        <i class="fas fa-store"></i>
                                        {{ $category->store->count()}}
                                    </span>

                                    @endif

                            </td>
                            <td>
                                <img alt="{{$category->name}}" class="table-avatar" src="{{$category->image}}">
                            </td>
                            <td>
                                <div>
                                    <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit"  wire:click="edit('{{ $category->slug }}','{{ ($categorys->where('id',$category->parent_id)->first()->slug)??'' }}')"><i class="far fa-eye"></i>  {{ __('tran.edit') }}  </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"  wire:click="view('{{ $category->slug }}','{{$category->name}}')"><i class="fas fa-trash"></i> {{ __('tran.delete') }} </button>
                                    <div class="btn-group"> {!!$category->active!!}
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item"  wire:click="active('{{ $category->slug }}')"  href="">Active</button>
                                            <button class="dropdown-item"   wire:click="active('{{ $category->slug }}')" href="">Deactivate</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            </tr>

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
