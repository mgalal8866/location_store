@props(['id', 'error','active'])

<input  {{ $attributes }} id="{{$id}}"  data-id="#{{$id}}" class="toggle-class"
 type="checkbox"
  data-onstyle="success"
   data-offstyle="danger"
    data-toggle="toggle"
    data-on="Active"
    data-off="InActive"
    {{( $active ==0) ? 'checked' : '' }}>



@push('before-livewire-scripts')
{{-- <script type="text/javascript"> --}}
        // $('.toggle-class').change(function() {
            // var status =$('#{{ $id }}').prop('checked') == true ? 1 : 0;
            // console.log( status);
        //     var user_id = $(this).data('id');
            //   });

{{-- </script> --}}
@endpush
