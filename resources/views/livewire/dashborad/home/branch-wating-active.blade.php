<div>
   @if( $branchnNotAccept->count() != 0)
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">STORES Waiting For Accept
            <span class="badge bg-danger">{{ $branchnNotAccept->count() != 0 ?$branchnNotAccept->count():'' }}</span>
          </h3>

          <div class="card-tools">
            <div wire:click='$refresh'  class="btn btn-tool">
                <i class="fas fa-redo"></i>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>


          </div>
        </div>

        <div class="card-body  table-responsive p-0">
          <table class="table table-sm table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>{{__('stores')}}</th>
                <th>{{__('users')}}</th>
                <th>{{__('city')}}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $branchnNotAccept as  $index  =>  $branch )
                    <tr>
                        <td>{{ $branchnNotAccept->firstItem() + $index }}</td>
                        <td class="text-success">
                            <a href="{{route('branch',['slug' => $branch->stores->slug]) }}" class="nav-link">{{ $branch->stores->name??'N/A'}}</a>
                        </td>
                        <td>{{ $branch->stores->user->name??'N/A'}}</td>
                        <td><span class="badge badge-info">{{ $branch->city->name??'N/A' }} - {{ $branch->region->name?? 'N/A'}}</span></td>

                    </tr>
                @endforeach

            </tbody>
          </table>
          <div class="pagination pagination-sm  d-flex justify-content-center">
            {!! $branchnNotAccept->links() !!}
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      @endif
</div>
