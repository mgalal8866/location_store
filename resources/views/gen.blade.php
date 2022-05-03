<html>
  <head>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.css" />
  </head>
  <body>
    <!-- The surrounding HTML is left untouched by FirebaseUI.
    Your app may use that space for branding, controls and other customizations.-->
    <h1>Welcome to My Awesome App</h1>
    <div id="firebaseui-auth-container"></div>
    <div id="loader">Loading...</div>
    <div id="uid"></div>



    <!-- TODO: Add SDKs for Firebase products that you want to use
     x -->
    {{-- <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.3/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.js"></script> --}}
    <script>
      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      // Replace your firebase config here

      // Initialize Firebase
    //   firebase.initializeApp(firebaseConfig);
    //   firebase.analytics();
    //   const auth = firebase.auth();
    //   var ui = new firebaseui.auth.AuthUI(auth);
    //   var uiConfig = {
    //     callbacks: {
    //     signInSuccessWithAuthResult: function(authResult, redirectUrl) {
    //       // User successfully signed in.
    //       // Return type determines whether we continue the redirect automatically
    //       // or whether we leave that to developer to handle.
    //       firebase.auth().currentUser.getIdToken(true).then(function(idToken) {
    //         document.getElementById('uid').innerHTML = idToken;
    //         console.log(idToken);
    //       }).catch(function(e) {
    //         console.log(e);
    //       })
    //       return true;
    //     },
    //     uiShown: function() {
    //       // The widget is rendered.
    //       // Hide the loader.
    //       document.getElementById('loader').style.display = 'none';
    //       }
    //     },
    //     // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
    //     signInFlow: 'popup',
    //     signInOptions: [
    //     // Leave the lines as is for the providers you want to offer your users.
    //       firebase.auth.EmailAuthProvider.PROVIDER_ID
    //     ],
    //     // Terms of service url.
    //     // Privacy policy url.
    //   };
    //   ui.start('#firebaseui-auth-container', uiConfig);
    </script>
     <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-app.js"></script>
     <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-messaging.js"></script>
     {{-- <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script> --}}
     <script>

        // var firebaseConfig = {
        //         apiKey: '{{ env('apiKey') }}',
        //             authDomain: '{{ env('authDomain') }}',
        //             projectId: '{{ env('projectId') }}',
        //             storageBucket: '{{ env('storageBucket') }}',
        //             messagingSenderId: '{{ env('messagingSenderId') }}',
        //             appId: '{{ env('appId') }}',
        //             measurementId: '{{ env('measurementId') }}'
        //     };
                        var firebaseConfig = {
                apiKey: "AIzaSyCV9P5gT3FXMf3pHdMrcj1WEwbSh1TMVv8",
                authDomain: "omardair-3a1cb.firebaseapp.com",
                databaseURL: "https://omardair-3a1cb-default-rtdb.firebaseio.com",
                projectId: "omardair-3a1cb",
                storageBucket: "omardair-3a1cb.appspot.com",
                messagingSenderId: "860421690354",
                appId: "1:860421690354:web:9de1e0153d696fe81b516b",
                measurementId: "G-4G9B5W004Y"
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
                               alert('Token saved successfully.');
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
