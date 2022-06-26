<div >
    @section('title')
    {{ getSettingsOf('site_title') }}
    @stop

    @section('page')
    {{__('users')}}
    @endsection
    @section('page1')
    {{__('Dashboard')}}
    @endsection
    @section('page2')
    {{__('users')}}
    @endsection

    <div class="card">
        <div class="card-header" >

            <div  class="d-flex justify-content-between  mb-2">
                <div>
                <a name="" id="" class="btn btn-primary" href="{{ route('newuser') }}" role="button">New User</a>
                    <label  for="pages">{{__('show')}}</label>
                    <select class="form-select" wire:model="pages" name="pages" id="pages">
                        <option value="10" > 10 </option>
                        <option value="25" > 25 </option>
                        <option value="50" > 50 </option>
                        <option value="100" > 100 </option>
                        <option value="200" > 200 </option>
                    </select>
                </div>
                <div>
                    <x-search-input wire:model="searchTerm" />
                </div>
            </div>

        </div>
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
                                <td >{{ $user->name }}
                                    <br>
                                    <small>
                                        {{__('created')}}  {{$user->created_at->format('Y-m-d')}}
                                    </small>
                                </td>
                                <td>{{ $user->city->name??'' }},{{ $user->region->name??'' }}</td>
                                <td>{{ $user->store->count() }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->ip_address }}</td>
                                <td>

                                    {{-- <small> --}}
                                        {{__('total')}} : <span class="badge badge-primary badge-pill"> {{ $user->messages->count() }} </span>
                                    {{-- </small> --}}
                                    <br>
                                    {{-- <small> --}}
                                        {{__('seen')}}  :  <span class="badge badge-success badge-pill">{{ $user->messages->where('IsSeen',0)->count() }}</span>
                                    {{-- </small> --}}
                                    <br>
                                    {{-- <small> --}}
                                        {{__('unseen')}} : <span class="badge badge-danger badge-pill">{{ $user->messages->where('IsSeen',1)->count() }}</span>
                                    {{-- </small> --}}
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6"> <center> NO DATA </center></td>
                                </tr>
                            @endforelse
                        </tbody>
                </table>
            <div class="card-footer" >
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
