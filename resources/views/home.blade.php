@extends('layouts.main')

@section('title', '| Home')

@section('stylesheets')

    <meta charset="utf-8" />
	<meta name="author" content="Pondet Ananchai" />
	<meta name="description" content="QCP Capital">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" type="image/x-ico" href="{{ asset('/image/logos/Token.ico') }}" />

	<!-- Stylesheets -->

	<link href="{{ asset('/css/style2.css') }}" rel="stylesheet" title="main-css">



@endsection

@section('content')

    	<section class="background1">
		<div class="container">
			<div class="row mb30">
				<div class=" section-title text-center">
			
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
						<a href="#" data-toggle="modal" data-target="#livePrice" >
						<img src="{{ asset('/image/Price.png') }}" class="logo-size signal"</img>
						</a>
						<li class="plan-name">Live Price</li>
						
						<li>Real Time <br> Cryotocurrency Price</li>
						
						<li class="plan-price">
							
							<a class="btn btn-defaultPrice btn-lg" href="/liveprices">Use Now!</a>
						</li>
					</ul>
				</div>

				<div class="modal fade" id="livePrice" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerPrice">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Price.png') }}" class="logo-size signal" href="/fiats"></img>
									Live Price
									</h4>
			
					            </div>
					            <div class="modal-body">
					                <h5 class="heading-1 modal-heading mb20">Definition</h5>
					                <p>This arbitrage strategy refers to the purchase of one particular cryptocurrency (Bitcoin, Ethereum, Litecoin, etc) from a market of a lower market value and reselling it in another market with a higher value. This provides opportunities to take advantage of differing prices to generate a profit by buying low and selling high. This concept is the easiest and most straightforward. However, this would also mean that the fiat currency (often USD) would be hold in the second exchange until the price in two exchanges is stabilize, or to withdraw it and pay the huge bank transfer fees and exchange rate (in some case) to complete the loop.</p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->


				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-xs topReveal">
					<ul class="plan plan2 planOne">
						<a  href="#" data-toggle="modal" data-target="#oneWay">
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

					<div class="modal fade" id="oneWay" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerOne">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Oneway4.png') }}" class="logo-size signal" href="/fiats"></img>
									One-way
									</h4>
			
					            </div>
					            <div class="modal-body">
									<h5 class="heading-1 modal-heading mb20">Definition</h5>
									<center><img src="{{ asset('/image/OnewayArb.png') }}" style="width:400px;"></img></center><br>
					                <p>This arbitrage strategy refers to the purchase of one particular cryptocurrency (Bitcoin, Ethereum, Litecoin, etc) from a market of a lower market value and reselling it in another market with a higher value. This provides opportunities to take advantage of differing prices to generate a profit by buying low and selling high. This concept is the easiest and most straightforward. However, this would also mean that the fiat currency (often USD) would be hold in the second exchange until the price in two exchanges is stabilize, or to withdraw it and pay the huge bank transfer fees and exchange rate (in some case) to complete the loop.</p>
									
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs bottomReveal">
					<ul class="plan plan3 planLoop">
						<a href="#"  data-toggle="modal" data-target="#loop">
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

					<div class="modal fade" id="loop" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerLoop">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Loop.png') }}" class="logo-size signal" href="/fiats"></img>
									Loop
									</h4>
			
					            </div>
					            <div class="modal-body">
									<h5 class="heading-1 modal-heading mb20">Definition</h5>
									<center><img src="{{ asset('/image/Loophow.png') }}" style="width:400px;"></img></center><br>
					                <p>In order to avoid paying significant amount of bank transfer fees just to retrieve fiat currencies (hence losing profit), loop arbitrage can be used. Looping refers to two instances of one-way arbitrage, where the first one-way can be a profit while the second one-way can be marginally or no difference in value. This allows the user to reap the profits from the first instance while having little to no difference in the second instance through a different cryptocurrency back to the original exchange. The most ideal scenario would be in the event where both instances generate a profit instead of only one instance. Usually one of the way is ripple since it’s transfer is one of the fastest.</p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->


				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs topReveal">
					<ul class="plan plan4 planTri">
						<a href="#"  data-toggle="modal" data-target="#triAngle">
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

					<div class="modal fade" id="triAngle" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerTri">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Tri4.png') }}" class="logo-size signal" href="/fiats"></img>
									Tri-angle
									</h4>
			
					            </div>
					            <div class="modal-body">
									<h5 class="heading-1 modal-heading mb20">Definition</h5>
									<center><img src="{{ asset('/image/Angle.png') }}" style="width:400px;"></img></center><br>
					                <p>Similarly to the loop arbitrage, the triangle takes into account of three exchanges instead of two, while taking into account any transactional and platform fees. The pricing discrepancy between three exchanges will be calculated before conducting the loop. However, as certain cryptocurrencies take longer to transact, there is a certain risk of sudden price changes over time that may normalize the differences. As a result, the three-way arbitrage may not be fully completed. However, it is possible to then shift back to a two-way loop until another opportunity arises. Arbitrage strategies are dynamic and interchangeable, which can help to minimize the losses by the normalization or dramatic fluctuations.
</p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

				<!-- Item 4 -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs topReveal">
						<ul class="plan plan4 planGreen">
							<a href="#" data-toggle="modal" data-target="#greenPython">
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
				
					<div class="modal fade" id="greenPython" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerGreen">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Green1.png') }}" class="logo-size signal" href="/fiats"></img>
									Green Python
									</h4>
			
					            </div>
					            <div class="modal-body">
					                <h5 class="heading-1 modal-heading mb20">Definition</h5>
					                <p>Another looping strategy that base on triangle strategy but execute within exchange with one condition; in order to exploit this strategy, it’s necessary for that particular exchange to three quotation that can be trade in circle (for example; ETH/BTC, ETH/$, and BTC/$). Usually the fund position consist of those three position already. Most of the time, these three quoting price are not equally distributed so there an arbitrage opportunity to be made my making these three trading position at the same time.</p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

				
				<!-- Item 1 -->
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 bottomReveal">
						<ul class="plan plan1 plan5 planRed">
							<a href="#" data-toggle="modal" data-target="#redPhoenix">
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

					<div class="modal fade" id="redPhoenix" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerRed">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Red2.png') }}" class="logo-size signal" href="/fiats"></img>
									Red Phoenix
									</h4>
			
					            </div>
					            <div class="modal-body">
									<h5 class="heading-1 modal-heading mb20">Definition</h5>
									<center><img src="{{ asset('/image/Phoenix.jpg') }}" style="width:400px;"></img></center><br>
					                <p>This Arbitraging strategy is developed by Massachusetts Institute of Technology (MIT). It employs a tool called Blackbird that can calculate differences between two markets for a certain cryptocurrency, and initiates either a long position or a short position. The decision to short or long is dependent on the market price and the equilibrium midpoint. </p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

	
					<!-- Item 2 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-xs topReveal">
						<ul class="plan plan2 plan6 planBlack">
							<a href="#"  data-toggle="modal" data-target="#blackPanther">
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
					
					<div class="modal fade" id="blackPanther" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerBlack">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Black4.png') }}" class="logo-size signal" href="/fiats"></img>
									Black Panther
									</h4>
			
					            </div>
					            <div class="modal-body">
									<h5 class="heading-1 modal-heading mb20">Definition</h5>
									<center><img src="{{ asset('/image/Panther.jpg') }}" style="width:400px;"></img></center><br>
					                <p>This arbitrage technique is developed from simple loop strategy, so instead of expose the risk of change in price during transferring cryptocurrency period. Black panther strategy hold position at both exchange in cryptocurrency or fiat currency, then when opportunity came, switch the position from one currency to another that has arbitrage opportunity.</p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
	
					<!-- Item 3 -->
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mt30-sm mt30-xs bottomReveal">
						<ul class="plan plan3 plan7 planBlue">
							<a href="#" data-toggle="modal" data-target="#whaleCatcher">
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
					<div class="modal fade" id="whaleCatcher" tabindex="-1" role="dialog">
					    <div class="modal-dialog modal-lg">
					        <div class="modal-content">
					            <div class="modal-headerWhale">
					                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ion-ios-close-empty"></span>
					                </button>
					                <span class="pe-7s-volume services-icon-2"></span>
					                <h4 class="service-title">
									<img src="{{ asset('/image/Blue6.png') }}" class="logo-size signal" href="/fiats"></img>
									Whale Catcher
									</h4>
			
					            </div>
					            <div class="modal-body">
									<h5 class="heading-1 modal-heading mb20">Definition</h5>
									<center><img src="{{ asset('/image/Whale.jpg') }}" style="width:400px;"></img></center>
					                <p>Sometimes whale trader want to change their position instantly, so they place big position onto the market to take all of the available order that been deploy in the market. Which will spike the price for a few second or minutes, until the other trader will place order which make things go back to normal. Whenever, that happen we can stop the spiking in price and make profit from that in short time.</p>
								</div>
					        </div><!-- /.modal-content -->
					    </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
	
	
				
			</div>
	</section>

@endsection