<div>


        <div class="card">
          <div class="card-header">
                <button type="button" class="btn btn-default float-right" id="daterangebranch-btn">
                  <i class="far fa-calendar-alt"></i> Date range picker
                  <i class="fas fa-caret-down"></i>
                </button>

            <h3 class="card-title"> <i class=" fas fa-stopwatch"> </i> Branch Expire</h3>
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
                            <td><span class="badge badge-info">{{ $branch->city->name }} -  {{ $branch->region->name }}</span></td>
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

@push('jslive')
    <script>
       $('#daterangebranch-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'This week'  : [moment(), moment().add(7, 'days')],

        },
        startDate: moment(),
        endDate  : moment().add(7, 'days'),

        },
        function (start, end) {
            // $('#reportrange span').html(start.format('Y-m-d') + ' - ' + end.format('Y-m-d'))

            @this.set('startdate',start),
            @this.set('enddate' ,end )
        }

    )
    </script>
@endpush
