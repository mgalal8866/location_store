

<div>
    @section('title')
    {{ getSettingsOf('site_title') }}
    @stop

    @section('page')
    {{__('messages')}}
    @endsection
    @section('page1')
    {{__('Dashboard')}}
    @endsection
    @section('page2')
    {{__('messages')}}
    @endsection

	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{$messages->first()->user->name ??''}}
                    </div>
                    <div id="chat" class="card-body message-box msg_history" >
                        @if(filled($messages))
                            @foreach($messages as $mgs)
                                    <div dir="rtl" class="incoming_msg text-left single-message @if($mgs->user_id == auth()->id()) sent @else received @endif">
                                        <p class="font-weight-bolder my-0">{{$mgs->user->name}}</p>
                                            @if($mgs->IsSeen==1)
                                            <span class="text-danger">  <i class="fas fa-eye"></i></span>

                                             {{-- <span class="badg badge-danger badge-pill badge-sm">new</span> --}}
                                            @else
                                            <span class="text-success">  <i class="fas fa-eye"></i></span>

                                            @endif
                                            {{ $mgs->message}}
                                        <br><small class="text-muted w-100">Sent <em>{{$mgs->created_at->diffForHumans(null, false, false) }}  - {{$mgs->created_at }}</em></small>
                                    </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users') }}" class="btn btn-sm btn-success">{{ __('back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

