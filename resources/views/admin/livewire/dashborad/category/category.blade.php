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
            <table class="table table-hover  table-striped">
                <thead>
                    <tr>
                        <th >{{ (__('tran.name')) }}</th>
                        <th>{{ (__('tran.action')) }}</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach( $category  as $item )

                          @if(!$item->parent_id)
                                    <tr @if($item->childrens->count() > 0) data-widget="expandable-table" aria-expanded="false"@endif>
                                                <td>
                                                @if($item->childrens->count() > 0)
                                                <span class="badge badge-info">
                                                    <i class="expandable-table-caret  fas fa-caret-right fa-fw"></i>
                                                    {{$item->childrens->count()}}
                                                </span>
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
