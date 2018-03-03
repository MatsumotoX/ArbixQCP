@extends('layouts.main')

@section('stylesheets')

    <meta charset="utf-8" />
	<meta name="author" content="Pondet Ananchai" />
	<meta name="description" content="PerfectplanX">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>PerfectplanX</title>
	<link rel="shortcut icon" type="image/x-ico" href="{{ asset('/images/logos/Token.ico') }}" />

	<!-- Stylesheets -->

	<link href="{{ asset('/css/style2.css') }}" rel="stylesheet" title="main-css">



@endsection

@section('content')

    	<section class="background1">
		<div class="container tools">
			<div class="row mb30">
				<div class=" section-title text-center">
					<h2 style="margin-bottom:15px; font-size:20px;">Arbitrage Alpha Robo-advisor (Arbot)</h2>
					<p class="no-margin small" >This Arbot (beta) version is developed by Cryptovation.co specially for 'Perfect Plan' to use internally as an asset management tool</p>
					<span class="section-divider mb5"></span>
				</div>
				<!-- /.column -->
			</div>
			<!-- /.row -->

			<div class="row">
				
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 bottomReveal">
					<ul class="planPrice plan1 plan">
						<img src="{{ asset('/image/Price.png') }}" class="logo-size"></img>
						<li class="plan-name">Live Price</li>
						<li class="plan-price">
							<a class="btn btn-defaultPrice btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>


				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-xs topReveal">
					<ul class="planOne plan2 plan">
						<img src="{{ asset('/image/Oneway4.png') }}" class="logo-size"></img>
						<li class="plan-name">One-way</li>
						<li class="plan-price">
							<a class="btn btn-defaultOne btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs bottomReveal">
					<ul class="planLoop plan3 plan">
						<img src="{{ asset('/image/Loop.png') }}" class="logo-size"></img>
						<li class="plan-name">Loop</li>
						<li class="plan-price">
							<a class="btn btn-defaultLoop btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>


				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs topReveal">
					<ul class="planTri plan4 plan">
						<img src="{{ asset('/image/Tri3.png') }}" class="logo-size"></img>
						<li class="plan-name">Tri-angle</li>
						<li class="plan-price">
							<a class="btn btn-defaultTri btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>

				
				<!-- Item 1 -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 bottomReveal">
						<ul class="planRed plan1 plan5 plan">
							<img src="{{ asset('/image/Red2.png') }}" class="logo-size"></img>
							<li class="plan-name">Red Phoenix</li>
							<li class="plan-price">
								<a class="btn btn-defaultRed btn-lg" href="#">Use Now!</a>
							</li>
						</ul>
					</div>
					
	
					<!-- Item 2 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-xs topReveal">
						<ul class="planBlack plan2 plan6 plan ">
							<img src="{{ asset('/image/Black1.png') }}" class="logo-size"></img>
							<li class="plan-name">Black Panter</li>
							<li class="plan-price">
								<a class="btn btn-defaultBlack btn-lg" href="#">Use Now!</a>
							</li>
						</ul>
					</div>
	
					<!-- Item 3 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs bottomReveal">
						<ul class="planBlue plan3 plan7 plan">
							<img src="{{ asset('/image/Blue3.png') }}" class="logo-size"></img>
							<li class="plan-name">Whale Catcher</li>
							<li class="plan-price">
								<a class="btn btn-defaultBlue btn-lg" href="#">Use Now!</a>
							</li>
						</ul>
					</div>
	
					<!-- Item 4 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs topReveal">
						<ul class="planGreen plan4 plan">
							<img src="{{ asset('/image/Green1.png') }}" class="logo-size"></img>
							<li class="plan-name">Green Python</li>
							<li class="plan-price plan8">
								<a class="btn btn-defaultGreen btn-lg" href="#">Use Now!</a>
							</li>
						</ul>
					</div>
			</div>
	</section>

@endsection
