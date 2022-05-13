<div>
    @section('title')
    Stores
    @stop
    @section('page')
    Stores
    @endsection
    @section('page2')
    Stores
    @endsection

        {{-- @include('livewire.admin.category.createcategory')
        @include('livewire.admin.category.deletecategory')
        @include('livewire.admin.category.editcategory') --}}
        <div class="card">
            <div class="card-header" >


            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ (__('tran.name')) }}</th>
                            <th>{{ (__('tran.user')) }}</th>
                            <th>{{ (__('tran.catrgory')) }}</th>
                            <th>Num branch</th>
                            <th>{{ (__('tran.status')) }}</th>
                            <th width="240">{{ (__('tran.action')) }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $stores  as $store )
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->user->name}}</td>
                                <td>{{$store->category->name}}</td>
                                <td>{{$store->branch->count()}}</td>
                                <td>{!!$store->active!!}</td>
                                <td>
                                    <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="far fa-eye"></i>{{ __('tran.show') }}</button>
                                    <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i>{{ __('tran.delete') }}</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspen="6"> No Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            <div class="card-footer" >
                <div class="d-flex justify-content-center">
                    {!! $stores->links() !!}
                </div>
            </div>
        </div>



</div>
