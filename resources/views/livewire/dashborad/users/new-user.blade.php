<div>
    @section('title')
    {{ getSettingsOf('site_title') }}
    @stop

    @section('page')
    {{$title}}
    @endsection
    @section('page1')
    {{__('Dashboard')}}
    @endsection
    @section('page2')
    {{$title}}
    @endsection
    <div class="row">
            <div class="card col-12">
                <form wire:submit.prevent='saveuser' >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('name') }}</label>
                                    <input type="text" wire:model.dafer='name' id="username" class="form-control" placeholder="{{ __('name') }}" required>
                                    @error('name') <span class="text-danger text-right"  role="alert">
                                        *{{ $message }}
                                     </span> @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">{{ __('mobile') }}</label>
                                    <input type="text"  wire:model.dafer='mobile' id="mobile" class="form-control" placeholder="{{ __('mobile') }}" required >
                                    @error('mobile') <span class="text-danger text-right"  role="alert">
                                        *{{ $message }}
                                     </span> @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">{{ __('city') }}</label>
                                    <select class="form-control" wire:model.lazy='gender' required>
                                        <option value="">{{__('gender')}}</option>
                                        <option value="0">{{__('male')}}</option>
                                        <option value="1">{{__('female')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @if ($editmode != true)
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('password') }}</label>
                                    <input type="text"  wire:model.dafer='password'  class="form-control" placeholder="{{ __('password') }}" required>
                                    <small id="helpId" class="text-muted">Help text</small>
                                    @error('password') <span class="text-danger text-right"  role="alert">
                                        *{{ $message }}
                                     </span> @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('password_confirmation') }}</label>
                                    <input type="text"  wire:model.dafer='password_confirmation'   class="form-control" placeholder="{{ __('password') }}" required>
                                    @error('password_confirmation') <span class="text-danger text-right"  role="alert">
                                        *{{ $message }}
                                     </span> @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('city') }}</label>
                                    <select class="form-control" wire:model='selectcity'>
                                        <option value="">{{__('select_city')}}</option>
                                        @empty(!$citys)
                                            @foreach ($citys as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        @endempty
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('region') }}</label>
                                    <select class="form-control" wire:model='selectregion' required>
                                        <option value="">{{__('select_region')}}</option>
                                        @empty(!$regions)
                                            @foreach ($regions as $region)
                                                <option value="{{$region->id}}">{{$region->name}}</option>
                                            @endforeach
                                        @endempty
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success "><i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>

    </div>
</div>
