<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
<!-- Website Template designed by www.downloadwebsitetemplates.co.uk -->
<meta charset="UTF-8">
<title>{{$setting->where('key','site_title')->first()->value??''}}</title>
<meta name="description" content="{{$setting->where('key','site_description')->first()->value??''}}">
<meta name="keywords" content="{{$setting->where('key','site_keywords')->first()->value??''}}">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('assets/images/notify/bell.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('assets/images/notify/bell.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('assets/images/notify/bell.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('assets/images/notify/bell.png')}}">
<link rel="shortcut icon" href="{{ URL::asset('assets/Front/images/ico/favicon.ico')}}">
<!--[if IE]><![endif]-->
<link rel="stylesheet" href="{{ URL::asset('assets/Front/css/style.css')}}">
<script src="{{ URL::asset('assets/Front/js/jquery.js')}}"></script>
<script src="{{ URL::asset('assets/Front/js/countdown.js')}}"></script>
<script src="{{ URL::asset('assets/Front/js/owlcarousel.js')}}"></script>
<script src="{{ URL::asset('assets/Front/js/uikit.scrollspy.js')}}"></script>
<script src="{{ URL::asset('assets/Front/js/scripts.js')}}"></script>
<!--[if lt IE 9]><script src="{{ URL::asset('https://html5shiv.googlecode.com/svn/trunk/html5.js')}}"></script><![endif]-->
</head>

<body id="backtotop">
    <nav class="navbar ">
        <a class="navbar-brand" href="https://api.whatsapp.com/send?phone={{$setting->where('key','phone_number')->first()->value??''}}">
          <img src="{{ URL::asset('assets/Front/images/WhatsApp.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
         {{$setting->where('key','phone_number')->first()->value??''}}
        </a>
        <center>
            <a class="navbar-brand" href="https://api.whatsapp.com/send?phone={{$setting->where('key','phone_number')->first()->value??''}}">
                {{$setting->where('key','site_title')->first()->value??''}}
              </a>
        </center>
      </nav>
<div class="fullwidth2 clearfix">
        <div id="quotecont" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
            <div id="commentslider1" class="owl-carousel">
                @foreach ($sliderfront as $slide )
                    <div class="item">
                        <img  src="{{ $slide->image }}" >
                    </div>
                @endforeach
            </div>
        </div>
</div>


    <div class="second-row-item-app">
        <nav>
            @if ($setting->where('key','app_google')->first()->value)
                <a href="{{ $setting->where('key','app_google')->first()->value??'' }}"><img class="download-btn" src="{{ URL::asset('assets/Front/images/download-1.svg')}}" alt=""></a>
            @endif
            <a href="#" ><img class="img" src="{{ URL::asset('assets/images/notify/bell.png')}}"></a>
            @if ($setting->where('key','app_google')->first()->value)
                <a href="{{ $setting->where('key','app_google')->first()->value??'' }}"><img class="download-btn" src="{{ URL::asset('assets/Front/images/download-2.svg')}}" alt=""></a>
            @endif
        </nav>
    </div>


{{-- <div class="arrow-separator arrow-grey"></div> --}}


<div class="arrow-separator arrow-white"></div>

<div class="fullwidth colour1 clearfix">
	<div id="countdown" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

		<div id="countdowncont" class="clearfix">
			<ul id="countscript">
				<li>
					<span class="days">00</span>
					<p>Days</p>
				</li>
				<li>
					<span class="hours">00</span>
					<p>Hours</p>
				</li>
				<li class="clearbox">
					<span class="minutes">00</span>
					<p>Minutes</p>
				</li>
				<li>
					<span class="seconds">00</span>
					<p>Seconds</p>
				</li>
			</ul>
		</div>

	</div>
</div>
<div class="arrow-separator arrow-theme"></div>
<div class="fullwidth colour2 clearfix">
	<div id="maincont" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

		<p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit. <a title="" href="#">Donec quis enim nulla</a>. Suspendisse posuere arcu ac eros iaculis egestas commodo risus tempus. Fusce placerat nulla nisi. Proin congue erat non orci adipiscing nec porttitor lacus egestas. <em>Donec venenatis</em>, risus et hendrerit ultrices, libero sem lacinia risus, ut convallis massa sapien nec libero. Suspendisse arcu orci, gravida nec aliquet ut, lacinia non nisl.</p>
        <h2>Sign up and we'll let you know when we launch</h2>
        <p>If you would like to receive <strong>news and special offers</strong> please send us your email address below:</p>
		<div id="signupform" class="sb-search clearfix">
			<form method="post" id="contact" class="clearfix">
				<input class="sb-search-input" placeholder="Enter email ..." type="text" value="">
				<input class="sb-search-submit" value="" type="submit">
				<button class="formbutton" type="submit"><span class="fa fa-search"></span></button>
			</form>
		</div>

	</div>
</div>
<div class="arrow-separator arrow-themelight"></div>

<div class="fullwidth colour3 clearfix">
	<div id="quotecont" class="bodycontainer qq clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">

        <div id="commentslider" class="owl-carousel">
            <div class="item">
                <p>"<strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit. Donec quis enim nulla. <em>Suspendisse posuere</em> arcu ac eros iaculis egestas commodo risus tempus. Fusce placerat nulla nisi. Proin congue erat non orci adipiscing nec porttitor lacus egestas."</p>
            	<p class="author">- Andrew Smith</p>
            </div>
            <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Donec quis enim</strong> nulla. Suspendisse posuere arcu ac eros iaculis egestas commodo risus tempus. <em>Fusce placerat nulla nisi</em>."</p>
            	<p class="author">- Laura Roberts</p>
            </div>
            <div class="item">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Donec quis enim</strong> nulla. Suspendisse posuere arcu ac eros iaculis egestas commodo risus tempus. <em>Fusce placerat</em> nulla nisi. Proin congue erat non orci adipiscing nec <strong>porttitor</strong> lacus egestas."</p>
            	<p class="author">- David Jones</p>
            </div>
        </div>

	</div>
</div>


<div class="center">
	<div id="footercont" class="bodycontainer clearfix" data-uk-scrollspy="{cls:'uk-animation-fade', delay: 300, repeat: true}">
        <center>
		<p class="backtotop"><a title="" href="#backtotop"><span class="fa fa-angle-double-up"></span></a></p>

        <div id="socialmedia" class="clearfix">
			<ul>
                @foreach ( $setting->where('section','front') as  $set)
                    @if ($set->key == 'facebook')
                    <li><a title="" href="{{ $set->value }}" rel="external"><span class="fa fa-facebook"></span></a></li>
                    @endif
                    @if ($set->key == 'twitter')
                    <li><a title="" href="#" rel="external"><span class="fa fa-twitter"></span></a></li>
                    @endif
                @endforeach

				</ul>
		</div>

            <strong>Copyright &copy; 2022 <a href="https://api.whatsapp.com/send?phone=01024346011">Mohamed Galal</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> {{$setting->where('key','version')->first()->value??''}}
            </div>
            <br>
            <strong><a href="https://dalil-misr.com/privacy">Privcy</a>.</strong>
        </center>
    </div>
</div>
<script>
 var user =  "{{ $setting->where('key','count_down')->first()->value }}";
    $(document).ready(function() {
	"use strict";
	$("#countdown").countdown({
		date: user, /** Enter new date here **/
		format: "on"
	},
	function() {
		// callback function
	});
});
</script>
</body>
</html>
