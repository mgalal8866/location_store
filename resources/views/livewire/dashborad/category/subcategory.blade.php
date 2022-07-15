<div>
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
                        @foreach($categorys  as $category)
                            @foreach($category->childrens as $child)
                                <tr>
                                    <td>
                                        {{$child->name}}

                                    </td>
                                    <td>
                                        {{$category->name}}

                                    </td>
                                    <td>
                                        <i class="fa fa-university" aria-hidden="true">{{$child->store->count()}}</i>
                                    </td>
                                    <td>
                                        <img alt="{{$child->name}}" class="table-avatar" src="{{$child->image}}">

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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </td>
    </tr>

</div>
