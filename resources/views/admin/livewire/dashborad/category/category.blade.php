<div>
    @section('title')
    Category
    @stop
    @section('page')
    Category
    @endsection
    @section('page2')
    Category
    @endsection
    <div class="card">
        {{-- <div class="card-header" >
        </div> --}}
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ (__('tran.name')) }}</th>
                    {{-- <th>{{ (__('tran.parent')) }}</th> --}}
                    {{-- <th>{{ (__('tran.catrgory')) }}</th>
                    <th>Num branch</th>
                    <th>{{ (__('tran.status')) }}</th> --}}
                    <th width="240">{{ (__('tran.action')) }}</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ( $category  as $item )
                    <tr>
                        <td>{{$loop->index +1}}</td>
                        <td>{{$item->name}}</td>
                        {{-- <td>{{$item->user->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->branch->count()}}</td>
                        <td>{!!$item->active!!}</td> --}}
                        <td>
                            <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="far fa-eye"></i>{{ __('tran.show') }}</button>
                            {{-- <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i>{{ __('tran.edit') }}</button> --}}
                            <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i>{{ __('tran.delete') }}</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                        <td colspen="2"> No Data</td>
                    </tr>
                    @endforelse
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
