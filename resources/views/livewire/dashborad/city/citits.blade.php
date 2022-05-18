<div>
@section('title')
CITY
@stop
@section('page')
CITY
@endsection
@section('page2')
CITY
@endsection
    {{-- @include('livewire.admin.category.createcategory')
    @include('livewire.admin.category.deletecategory')
    @include('livewire.admin.category.editcategory') --}}
    <div class="card">
        {{-- <div class="card-header" > --}}
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('name') }}</th>
                        <th>{{ __('region') }}</th>
                        <th width="240">Action</th>
                        {{-- <th style="width: 40px">Label</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ( $cities  as $city )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$city->name}}</td>
                            <td><i class="fa-solid fa-house-building"></i>{{$city->region->count()}}</td>
                            <td>
                                <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="far fa-eye"></i>{{ __('tran.show') }}</button>
                                <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i>{{ __('tran.edit') }}</button>
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
        {{-- </div> --}}
    </div>
</div>
