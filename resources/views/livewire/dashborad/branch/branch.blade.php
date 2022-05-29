<div>
    @section('title')
    Branch
    @stop
    @section('page')
    Branch
    @endsection
    @section('page2')
    Branch
    @endsection
    <form wire:submit.prevent="save"  enctype="multipart/form-data">
        @csrf
        <div class="row" >
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('maindetails')}}</h3>
                        <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" >
                            <div class="col-md-8" >
                                <div class="form-group">
                                    <label for="inputName">{{ __('minestore')}}*</label>
                                    <input type="text" id="inputName" wire:model.defer='name' class="form-control @error('name') is-invalid @enderror" >
                                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">{{ __('tran.description')}}</label>
                                    <textarea id="inputDescription" class="form-control @error('description') is-invalid @enderror"  wire:model.defer='description'  rows="4"></textarea>
                                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <!-- Profile Image -->
                                <div class="card card-secondary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center" x-data="{ imagePreview: '{{ URL::asset('assets') .'/'. config('sedtting_var.images.logo')}}' }">
                                            <input wire:model.defer="image" type="file" class="d-none" x-ref="image" x-on:change="
                                                    reader = new FileReader();
                                                    reader.onload = (event) => {
                                                        imagePreview = event.target.result;
                                                        document.getElementById('profileImage').src = `${imagePreview}`;
                                                    };
                                                    reader.readAsDataURL($refs.image.files[0]);
                                                " />
                                            <img x-on:click="$refs.image.click()" class="profile-user-img img-circle" x-bind:src="imagePreview ? imagePreview : '{{ URL::asset('assets') .'/'. config('sedtting_var.images.logo')}}' " alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center" wire:model.defer='name'></h3>

                                        <p class="text-muted text-center" wire:model.defer='name'>Admin</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{-- <div class="form-group"> --}}
                                    {{-- <img alt="IMAGE" class="brand-image img-circle elevation-3" style="opacity: .8" src="{{ URL::asset('assets') .'/'. config('setting_var.images.logo')}}"> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-store"></i>
                       {{ __('branches') }}
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            @foreach($stores->branch as $branch)
                                <a class="nav-link {{$loop->index== 0?'active':''}}" id="branch-tab-{{$loop->index}}" data-toggle="pill" href="#branch{{$loop->index}}" role="tab" aria-controls="branch{{$loop->index}}" aria-selected="true">Branch {{$loop->index + 1}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-7 col-sm-9">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            @foreach($stores->branch as $branch)
                                <div  class="tab-pane text-left fade  {{$loop->index == 0 ? 'active show' : ''}} " id="branch{{$loop->index}}" role="tabpanel" aria-labelledby="branch-tab-{{$loop->index}}">
                                    <div class="row" >
                                                <div class="card-body">
                                                    <div class="row" >
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="opentime">{{__('opentime')}}</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                                    </div>
                                                                    <x-timepicker wire:model.defer="opentime" id="opentime" :error="'opentime'" />
                                                                    @error('opentime')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="closetime">{{ __('closetime') }}</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                                    </div>
                                                                    <x-timepicker wire:model.defer="closetime" id="closetime" :error="'closetime'" />
                                                                    @error('closetime')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-6" >
                                                            <div  class="form-group">
                                                                <label for="start_date">{{__('start_date')}}</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                    </div>
                                                                    <x-datepicker wire:model.defer="start_date" id="start_date" :error="'start_date'" />
                                                                    @error('start_date')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="expiry_date">{{__('expiry_date')}}</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                    </div>
                                                                    <x-datepicker wire:model.defer="expiry_date" id="expiry_date" :error="'expiry_date'" />
                                                                    @error('expiry_date')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="numproduct">{{ __('numproduct')  }}*</label>
                                                                <input type="text" id="numproduct" wire:model.defer='branchlist.{{$loop->index}}.numproduct' class="form-control @error('numproduct') is-invalid @enderror" >
                                                                @error('numproduct')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" >
                                                            <div  wire:ignore class="form-group">
                                                                <label for="selectcity">{{ __('city') }}*</label>
                                                                <select id="selectcity"  wire:model.defer='city_id' class="form-control pt-1   @error('city_id') is-invalid @enderror" >
                                                                    <option value="">Select City</option>
                                                                    @foreach ( $citys as $city )
                                                                        <option value="{{$city->id}}" >{{$city->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @error('city_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                            <div wire:ignore  class="form-group">
                                                                <label for="selectregion">{{ __('region') }}*</label>
                                                                <select  id="selectregion" class="form-control pt-1 @error('region_id') is-invalid @enderror" wire:model.defer='region_id'>
                                                                    <option value="">Select Region</option>
                                                                    @foreach ( $regions as $region )
                                                                        <option value="{{$region->id}}" >{{$region->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @error('region')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" >
                                                            <div class="form-group">
                                                                <label for="address">{{ __('tran.address')  }}*</label>
                                                                <input type="text" id="address" wire:model.defer='address' class="form-control @error('address') is-invalid @enderror" >
                                                                @error('address')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="phone">{{ __('phone')  }}*</label>
                                                                <input type="text" id="phone" wire:model.defer='phone' class="form-control @error('phone') is-invalid @enderror" >
                                                                @error('phone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6" >
                                                            <div class="form-group">
                                                                <label for="phone2">{{ __('phone2')  }}*</label>
                                                                <input type="text" id="phone2" wire:model.defer='phone2' class="form-control @error('phone2') is-invalid @enderror" >
                                                                @error('phone2')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="mapouter">
                                                        <div class="gmap_canvas">
                                                            <iframe   width="100%"  height="500" id="gmap_canvas" src="https://maps.google.com/maps?q={{  $branch->lat }},{{  $branch->lng }}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                                           <br><style>.mapouter{position:relative;text-align:right;height:500px; width:100%;}</style><a href="https://www.embedgooglemap.net">embed a google map in html</a>
                                                                <style>
                                                                    .gmap_canvas {overflow:hidden;background:none!important;height:500px;  width:100%;}
                                                                </style>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@push('styles')
<style>
    .profile-user-img:hover {
        background-color: blue;
        cursor: pointer;
    }
</style>
@endpush
@push('jslive')
<script type="text/javascript">

    function initMap() {
      const myLatLng = { lat:  31.260120, lng: 29.985390 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: myLatLng,
      });
      new google.maps.Marker({
        position: myLatLng,
        map,
        title: "LOCATION STORE",
      });

    }
    window.initMap = initMap;

</script>



<script type="text/javascript"

    src="https://maps.google.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initMap&language=ar&region=EG" ></script>


{{-- <script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            console.log('dsdsdsdsddsd');
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
     async defer"></script> --}}
@endpush
@push('alpine-plugins')
<!-- Alpine Plugins -->
<script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
@endpush
