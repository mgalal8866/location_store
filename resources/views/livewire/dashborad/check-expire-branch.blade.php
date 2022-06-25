<div>


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Branch Expire</h3>
          </div>
            <div class="card-body p-0">
                <table class="table  table-sm table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('city') }}</th>
                            <th>{{ __('date') }}</th>
                        </tr>
                    </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse ( $branchexpire as $index  => $branch)
                        <tr>
                            <td>{{ $branchexpire->firstItem() + $index }}</td>
                            <td><a href="{{route('branch',['slug' => $branch->stores->slug]) }}" class="nav-link">{{ $branch->stores->name }}</a></td>
                            <td>{{ $branch->city->name }} -  {{ $branch->region->name }}</td>
                            <td><span class="badge bg-danger">{{ $branch->expiry_date }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" > <center> No Data   </center></td>
                        </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
          <div class="card-footer pb-0 ">
            <div class="pagination pagination-sm  d-flex justify-content-center">
                {!! $branchexpire->links() !!}
            </div>
          </div>
        </div>


</div>
