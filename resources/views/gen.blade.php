<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.css" /> --}}
  </head>
  <body>
 
    <h1>Welcome to My Awesome App</h1>
    <div id="firebaseui-auth-container"></div>
    <div id="loader">Loading...</div>
    <div id="uid"></div>

     <script src="{{URL::asset('assets/jquery.min.js')}}"></script>
     <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>
     <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js"></script>
     {{-- <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script> --}}
   <script>
        var firebaseConfig = {
                apiKey: '{{ env('apiKey') }}',
                authDomain: '{{ env('authDomain') }}',
                projectId: '{{ env('projectId') }}',
                storageBucket: '{{ env('storageBucket') }}',
                messagingSenderId: '{{ env('messagingSenderId') }}',
                appId: '{{ env('appId') }}',
                measurementId: '{{ env('measurementId') }}'
            };

            firebase.initializeApp(firebaseConfig);
            const messaging = firebase.messaging();

                messaging.requestPermission()
                    .then(function () {
                        return messaging.getToken()
                    })
                    .then(function(token) {


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '{{ route("save-token") }}',
                            type: 'POST',
                            data: {
                                token: token
                            },
                            dataType: 'JSON',
                            success: function (response) {
                                console.log(token);
                                 //alert('Token saved successfully.');
                            },
                            error: function (err) {
                                console.log('User Chat Token Error');
                            },
                        });

                    }).catch(function (err) {
                        console.log('User Chat Token Error catch');
                    });


        </script>
  </body>
</html>
