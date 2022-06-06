@props(['id', 'error'])

<input {{ $attributes }} type="text" class="form-control datetimepicker-input @error($error) is-invalid @enderror" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"
onchange="this.dispatchEvent(new InputEvent('input'))"
/>


@push('before-livewire-scripts')
<script type="text/javascript">
// console.log({{ $id }});
    $('#{{ $id }}').datetimepicker({
    	// format: 'L'
        format: 'YYYY-MM-DD'
        // format: 'yyyy-m-d'
    });
</script>
@endpush
