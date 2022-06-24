<div >
    @section('title')
    {{ getSettingsOf('site_title') }}
    @stop

    @section('page')
    Dashborad
    @endsection
    @section('page1')
    @endsection
    @section('page2')
    @endsection

    <div class="card">
        <div class="card-body p-0 table-responsive">
            {{-- <div class="row"> --}}
                <table class="table table-hover table-striped">
                    <thead class="">
                        <tr>
                            <th>{{ __('name') }}</th>
                            <th>{{ __('loaction') }}</th>
                            <th>{{ __('stores') }}</th>
                            <th>{{ __('mobile') }}</th>
                            <th>{{ __('ip_address') }}</th>
                            <th>{{ __('messages') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ( $users as $user )
                            <tr>
                                <td >{{ $user->name }}</td>
                                <td>{{ $user->city->name??'' }},{{ $user->region->name??'' }}</td>
                                <td>{{ $user->store->count() }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->ip_address }}</td>
                                <td>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total:
                                        <span class="badge badge-primary badge-pill">{{ $user->messages->count() }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Seen:
                                        <span class="badge badge-primary badge-pill">{{ $user->messages->where('IsSeen',0)->count() }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            UnSeen:
                                        <span class="badge badge-primary badge-pill">{{ $user->messages->where('IsSeen',1)->count() }}</span>
                                        </li>
                                    </ul>


                                </td>
                            </tr>
                            @empty

                            @endforelse

                        </tbody>
                </table>
            {{-- </div> --}}
            <div class="card-footer" >
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
