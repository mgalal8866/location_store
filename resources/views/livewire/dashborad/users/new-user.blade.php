<div>
    @section('title')
    {{ getSettingsOf('site_title') }}
    @stop

    @section('page')
    {{__('new_user')}}
    @endsection
    @section('page1')
    {{__('Dashboard')}}
    @endsection
    @section('page2')
    {{__('new_user')}}
    @endsection
    <div class="row">
            <div class="card col-12">
                <div class="card-header">
                    Header
                </div>
                <div class="card-body">
                        <div class="form-group">
                                <label for="">{{ __('name') }}</label>
                                <input type="text" name="" id="" class="form-control" placeholder="{{ __('name') }}" aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('password') }}</label>
                            <input type="text" name="" id="" class="form-control" placeholder="{{ __('password') }}" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('mobile') }}</label>
                            <input type="text" name="" id="" class="form-control" placeholder="{{ __('mobile') }}" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">{{ __('city') }}</label>
                                <select class="form-control" name="" id="">
                                <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">{{ __('region') }}</label>
                                <select class="form-control" name="" id="">
                                <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>

    </div>
</div>
