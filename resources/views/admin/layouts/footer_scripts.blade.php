<!-- jQuery -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/bootstrap4-toggle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
{{-- <script src="{{ URL::asset('assets/plugins/sparklines/sparkline.js') }}"></script> --}}
<!-- JQVMap -->
<script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ URL::asset('assets/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ URL::asset('assets/dist/js/pages/dashboard.js') }}"></script> --}}
{{-- <script > document.body.classList.add('dark-mode');</script> --}}
<script src="{{ URL::asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/toastr/toastr.min.js') }}"></script>

@yield('js')
@stack('before-livewire-scripts')
@livewireScripts
@stack('after-livewire-scripts')

@stack('alpine-plugins')
<!-- Alpine Core -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

@stack('jslive')
<script>

  $(document).ready(function() {
        toastr.options = {
                        "closeButton": true,
                        "debug": true,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };


            window.addEventListener('successmsg', e => {
                toastr.success(e.detail.message, 'Success!');
           });
           window.addEventListener('successmsg', e => {
                toastr.success(e.detail.message, 'Success!');
           });

        });


    var Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000});


        window.addEventListener('closeModal', event=> {
            $('#modal-create').modal('hide');
            $('#modal-delete').modal('hide');
            $('#modal-edit').modal('hide');
        });

        window.addEventListener('Toast' , (e)=> {
            Toast.fire({icon: (e.detail.ev),
                title: (e.detail.msg)});
            });
       window.addEventListener('openModal', event => {
            $("#modalForm").modal('show');
        });
    //    toastr.success( (e.detail.msg))

 </script>


