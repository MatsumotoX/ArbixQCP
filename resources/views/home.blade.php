@extends('layouts.main')

@section('title', '| Home')

@section('stylesheets')

    <meta charset="utf-8" />
	<meta name="author" content="Pondet Ananchai" />
	<meta name="description" content="QCP Capital">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" type="image/x-ico" href="{{ asset('/image/logos/qcp.ico') }}" />

	<!-- Stylesheets -->

	<link href="{{ asset('/css/style2.css') }}" rel="stylesheet" title="main-css">



@endsection

@section('content')

    	<section class="background1">
		<div class="container">
			<div class="row mb30">
				<div class=" section-title text-center">
				<img  style=" width: 200px; margin: 10px;" src="{{ asset('/image/QCP_Logo.png') }}"></img> 
					<h2 style="line-height:1.3; margin-bottom:15px; font-size:20px;">Arbitrage Alpha Robo-advisor (Arbot)</h2>
					<p class="no-margin small" >This Arbot (beta) version is developed by Cryptovation.co specially for 'QCP Capital' to use internally as an asset management tool</p>
					<span class="section-divider mb5"></span>
				</div>
				<!-- /.column -->
			</div>
			<!-- /.row -->

			<div class="row">

				
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 bottomReveal">
					<ul class="plan plan1 planPrice">
						<a href="#">
						<img src="{{ asset('/image/Price.png') }}" class="logo-size signal" href="/fiats"></img>
						</a>
						<li class="plan-name">Live Price</li>
						
						<li>Real Time <br> Cryotocurrency Price</li>
						<!-- <li>10 Email Address</li>
						<li>Forum Support</li>
						<li>No Squirel</li> -->
						<li class="plan-price">
							<!-- <strong>buying low and selling high</strong> / month -->
							<a class="btn btn-defaultPrice btn-lg" href="/fiats">Use Now!</a>
						</li>
					</ul>
				</div>


				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-xs topReveal">
					<ul class="plan plan2 planOne">
						<a href="#">
						<img src="{{ asset('/image/Oneway4.png') }}" class="logo-size signal"></img>
						</a>
						<li class="plan-name">One-way</li>
						
						<li>Buying Low and Selling High Price in Difference Market</li>
						<!-- <li><strong>10</strong> Email Address</li>
						<li><strong>Forum</strong> Support</li>
						<li><strong>No</strong> Squirel</li> -->
						<li class="plan-price">
							<!-- <strong>Free</strong> / month <br><br> -->
							<a class="btn btn-defaultOne btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs bottomReveal">
					<ul class="plan plan3 planLoop">
						<a href="#">
						<img src="{{ asset('/image/Loop.png') }}" class="logo-size signal"></img>
						</a>
						<li class="plan-name">Loop</li>
						
						<li>Two Instances of <br> One-way Arbitrage</li>
						<!-- <li><strong>Unlimited</strong> Email Address</li>
						<li><strong>Forum</strong> Support</li>
						<li><strong>Free</strong> Squirel</li> -->
						<li class="plan-price">
							<!-- <strong>$9</strong> / month <br><br> -->
							<a class="btn btn-defaultLoop btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>


				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs topReveal">
					<ul class="plan plan4 planTri">
						<a href="#">
						<img src="{{ asset('/image/Tri4.png') }}" class="logo-size signal"></img>
						</a>
						<li class="plan-name">Tri-angle</li>
						
						<li>The Pricing Discrepancy Between Three Exchanges</li>
						<!-- <li><strong>Unlimited</strong> Email Address</li>
						<li><strong>Forum</strong> Support</li>
						<li><strong>Free</strong> Squirel</li> -->
						<li class="plan-price">
							<!-- <strong>$19</strong> / month <br><br> -->
							<a class="btn btn-defaultTri btn-lg" href="#">Use Now!</a>
						</li>
					</ul>
				</div>

				<!-- Item 4 -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs topReveal">
						<ul class="plan plan4 planGreen">
							<a href="#">
							<img src="{{ asset('/image/Green1.png') }}" class="logo-size signal"></img>
							</a>
							<li class="plan-name">Green Python</li>
							
							<li>Base on Triangle Strategy but Execute within One Exchange </li>
							<!-- <li><strong>Unlimited</strong> Email Address</li>
							<li><strong>Forum</strong> Support</li>
							<li><strong>Free</strong> Squirel</li> -->
							<li class="plan-price plan8">
								<!-- <strong>$999</strong> / month <br><br> -->
								<a class="btn btn-defaultGreen btn-lg" href="#">Use Now!</a>
							</li>
						</ul>
					</div>
				

				
				<!-- Item 1 -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 bottomReveal">
						<ul class="plan plan1 plan5 planRed">
							<a href="#">
							<img src="{{ asset('/image/Red2.png') }}" class="logo-size signal"></img>
							</a>
							<li class="plan-name">Red Phoenix</li>
						
							<li>Initiates Long and Short Position and Close on Equilibrium Midpoint </li>
							<!-- <li><strong>10</strong> Email Address</li>
							<li><strong>Forum</strong> Support</li>
							<li><strong>No</strong> Squirel</li> -->
							<li class="plan-price">
								<!-- <strong>$29</strong> / month <br><br> -->
								<a class="btn btn-defaultRed btn-lg" href="#">Use Now!</a>
							</li>
						</ul>
					</div>
					<!-- /.column -->
	
					<!-- Item 2 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-xs topReveal">
						<ul class="plan plan2 plan6 planBlack">
							<a href="/signals">
							<img src="{{ asset('/image/Black4.png') }}" class="logo-size signal"></img>
							</a>
							<li class="plan-name">Black Panther</li>
							
							<li>Position at Both Exchange and Switch One Currency to Another</li>
							<!-- <li></li>
							<li><strong>Forum</strong> Support</li>
							<li><strong>No</strong> Squirel</li> -->
							<li class="plan-price">
								<!-- <strong>$39</strong> / month <br><br> -->
								<a class="btn btn-defaultBlack btn-lg" href="/signals">Use Now!</a>
							</li>
						</ul>
					</div>
					<!-- /.column -->
	
					<!-- Item 3 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs bottomReveal">
						<ul class="plan plan3 plan7 planBlue">
							<a href="/whalekrakens">
							<img src="{{ asset('/image/Blue6.png') }}" class="logo-size signal" ></img>
							</a>
							<li class="plan-name">Whale Catcher</li>
							
							<li>Big Position to The Market Spike The Price and Go Back to Normal</li>
							<!-- <li><strong>Unlimited</strong> Email Address</li>
							<li><strong>Forum</strong> Support</li>
							<li><strong>Free</strong> Squirel</li> -->
							<li class="plan-price">
								<!-- <strong>$199</strong> / month <br><br> -->
								<a class="btn btn-defaultBlue btn-lg" href="/whalekrakens">Use Now!</a>
							</li>
						</ul>
					</div>
					<!-- /.column -->
	
				
			</div>
	</section>

@endsection