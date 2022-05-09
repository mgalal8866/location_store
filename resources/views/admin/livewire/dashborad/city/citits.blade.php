<div>
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
                        <th>Name</th>
                        <th>Action</th>
                        {{-- <th style="width: 40px">Label</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ( $cities as $city )
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$city->name}}</td>
                            <td>
                              <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="fas fa-pencil-alt"></i>{{ __('tran.edit') }}</button>
                              <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="fas fa-pencil-alt"></i>{{ __('tran.edit') }}</button>

                            </td>
                            {{-- <td><span class="badge bg-danger">55%</span></td> --}}
                        </tr>
                        @empty

                        @endforelse


                    </tbody>
                </table>
            </div>
        {{-- </div> --}}
    </div>
</div>
