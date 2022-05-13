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
            {{-- <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ (__('tran.name')) }}</th> --}}
                    {{-- <th>{{ (__('tran.parent')) }}</th> --}}
                    {{-- <th>{{ (__('tran.catrgory')) }}</th>
                    <th>Num branch</th>
                    <th>{{ (__('tran.status')) }}</th> --}}
                    {{-- <th width="240">{{ (__('tran.action')) }}</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ( $category  as $item )
                    <tr>
                        <td>{{$loop->index +1}}</td>
                        <td>{{$item->name}}</td> --}}
                        {{-- <td>{{$item->user->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->branch->count()}}</td>
                        <td>{!!$item->active!!}</td> --}}
                        {{-- <td> --}}
                            {{-- <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="far fa-eye"></i>{{ __('tran.show') }}</button> --}}
                            {{-- <button class="btn btn-warning  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pencil-alt"></i>{{ __('tran.edit') }}</button> --}}
                            {{-- <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i>{{ __('tran.delete') }}</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                        <td colspen="2"> No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table> --}}

            <table class="table table-hover  table-striped">
                <thead>
                    <tr>
                        <th >{{ (__('tran.name')) }}</th>
                        <th>{{ (__('tran.action')) }}</th>
                    </tr>
                </thead>

                <tbody>
                  {{-- <tr>
                    <td class="border-0">183</td>
                  </tr> --}}
                  @foreach( $category  as $item )

                          @if(!$item->parent_id)
                                    <tr @if($item->childrens->count() > 0) data-widget="expandable-table" aria-expanded="false"@endif>
                                                <td>
                                                @if($item->childrens->count() > 0)
                                                <span class="badge badge-info">
                                                    <i class="expandable-table-caret  fas fa-caret-right fa-fw"></i>
                                                    {{$item->childrens->count()}}
                                                </span>
                                                    {{-- <span class="badge badge-info">{{$item->childrens->count()}} عدد الاقسام الفرعى</span> --}}

                                                @endif
                                                    {{$item->name}}

                                                    </td>
                                                <td >
                                                    <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="far fa-eye"></i>{{ __('tran.show') }}</button>
                                                    <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i>{{ __('tran.delete') }}</button>
                                                </td>
                                    </tr>
                           @endif
                        @if($item->childrens->count() > 0)

                             <tr  class="expandable-body">
                                    <td colspan="2">
                                        <div class="p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th >{{ (__('tran.name')) }}</th>
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
                                                        <button class="btn btn-info  btn-sm"  data-toggle="modal" data-target="#modal-edit"  ><i class="far fa-eye"></i>{{ __('tran.show') }}</button>
                                                        <button class="btn btn-danger  btn-sm"  data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i>{{ __('tran.delete') }}</button>
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
