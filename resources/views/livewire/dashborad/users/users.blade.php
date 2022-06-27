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
    <div>
        @if (session()->has('msg'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>
    <div class="m-1">
    <a name="" id="" class="btn btn-primary" href="{{ route('newuser') }}" role="button">New User</a>
    </div>
    <div class="card">
        <div class="card-header" >


            <div  class="d-flex justify-content-between  mb-2">
                <div>

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
                            <th>{{ __('mobile') }}</th>
                            <th>{{ __('gender') }}</th>
                            <th>{{ __('loaction') }}</th>
                            <th>{{ __('stores') }}</th>
                            <th>{{ __('ip_address') }}</th>
                            <th>{{ __('messages') }}</th>
                            <th>{{ __('action') }}</th>
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
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->city->name??'' }},{{ $user->region->name??'' }}</td>
                                <td>{{ $user->store->count() }}</td>

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
                                <td>
                                    <a  class="btn btn-sm btn-danger" href="{{ route('newuser', ['id' => $user->id , 'editmode' => true]) }}">Edit</a>
                                    <a  class="btn btn-sm btn-info" href="{{ route('messageuser', ['id' => $user->id ]) }}"><i class="fas fa-mail-bulk    "></i> </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7"> <center> NO DATA </center></td>
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
