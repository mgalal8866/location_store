{{-- @push('csslive')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@endpush --}}
    {{-- <div class="form-check form-switch">
        <input class="toggle-class"  wire:model.lazy="isActive" type="checkbox" role="switch" @if($isActive) checked @endif> --}}
     {{-- <input wire:model.lazy="isActive"   class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="ON" data-off="OFF"  @if($isActive) checked @endif> --}}

    {{-- </div> --}}

<div>
    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-off" style="width: 86px;">
        <div class="bootstrap-switch-container" style="width: 126px; margin-left: -42px;">
            <span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span>
            <span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span>
            <span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span>
            <input type="checkbox" name="my-checkbox" checked="true" data-bootstrap-switch="">
        </div>
    </div>
</div>
    {{-- @push('jslive')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    @endpush --}}
