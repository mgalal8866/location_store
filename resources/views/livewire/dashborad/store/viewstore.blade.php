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
                <label  for="pages">{{__('show')}}</label>
                    <select class="form-select" wire:model="pages" name="pages" id="pages">
                        <option value="10" > 10 </option>
                        <option value="25" > 25 </option>
                        <option value="50" > 50 </option>
                        <option value="100" > 100 </option>
                        <option value="200" > 200 </option>
                    </select>

            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ (__('tran.name')) }}</th>
                            <th>{{ (__('tran.user')) }}</th>
                            <th>{{ (__('tran.catrgory')) }}</th>
                            <th>{{ (__('info')) }}</th>
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
                                <td>

                                        @for ($i = 0; $i < 5; $i++)
                                            @if (floor($store->rating) - $i >= 1)
                                                <i class="fas fa-star text-warning fa-1x">{{--Full Start--}} </i>
                                            @elseif ($store->rating - $i > 0)
                                                <i class="fas fa-star-half-alt text-warning fa-1x"> {{--Half Start--}} </i>
                                            @else
                                                <i class="far fa-star text-warning fa-1x"> {{--Empty Start--}} </i>
                                            @endif
                                        @endfor
                                </td>
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
