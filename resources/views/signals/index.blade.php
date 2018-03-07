@extends('layouts.main')

@section('title', '| Line Notification')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Signal Bot</h1>
        </div>

        <div class="col-md-4">
            <h1 style='text-align: right'></h1>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <div class="md-col-12">
                <div class="col-md-8">
                    <h4>Bitcoin-Ethereum</h4>
                    <hr>
                    
                        <div class="col-md-3">
                            <p style="margin-top:5px"><b>Hitbtc -> Binance:</b></p>
                        </div>
                        <div class="col-md-9">
                            <div class="btn-group btn-group-justified">
                                
                                    <a href="{{ route('blackpanthersignal.push',['market','Hitbtc','Binance','ETHBTC']) }}" class="btn btn-danger">Market Price</a>
                                    <a href="{{ route('blackpanthersignal.push',['marketlimit','Hitbtc','Binance','ETHBTC']) }}" class="btn btn-primary">Market - Limit</a>
                                    <a href="{{ route('blackpanthersignal.push',['limit','Hitbtc','Binance','ETHBTC']) }}" class="btn btn-success">Limit Price</a>
                                    <a href="{{ route('blackpanthersignal.push',['all','Hitbtc','Binance','ETHBTC']) }}" class="btn btn-warning">All</a>

                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12" style="margin-top:10px">
                            
                            <div class="col-md-3">
                            <p style="margin-top:5px"><b>Hitbtc -> Exmo:</b></p>
                            </div>
                            <div class="col-md-9">
                                <div class="btn-group btn-group-justified">
                                    
                                    <a href="{{ route('blackpanthersignal.push',['market','Hitbtc','Exmo','ETHBTC']) }}" class="btn btn-danger">Market Price</a>
                                    <a href="{{ route('blackpanthersignal.push',['marketlimit','Hitbtc','Exmo','ETHBTC']) }}" class="btn btn-primary">Market - Limit</a>
                                    <a href="{{ route('blackpanthersignal.push',['limit','Hitbtc','Exmo','ETHBTC']) }}" class="btn btn-success">Limit Price</a>
                                    <a href="{{ route('blackpanthersignal.push',['all','Hitbtc','Exmo','ETHBTC']) }}" class="btn btn-warning">All</a>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top:10px">
                            
                            <div class="col-md-3">
                            <p style="margin-top:5px"><b>Exmo -> Binance:</b></p>
                            </div>
                            <div class="col-md-9">
                                <div class="btn-group btn-group-justified">
                                    
                                    <a href="{{ route('blackpanthersignal.push',['market','Exmo','Binance','ETHBTC']) }}" class="btn btn-danger">Market Price</a>
                                    <a href="{{ route('blackpanthersignal.push',['marketlimit','Exmo','Binance','ETHBTC']) }}" class="btn btn-primary">Market - Limit</a>
                                    <a href="{{ route('blackpanthersignal.push',['limit','Exmo','Binance','ETHBTC']) }}" class="btn btn-success">Limit Price</a>
                                    <a href="{{ route('blackpanthersignal.push',['all','Exmo','Binance','ETHBTC']) }}" class="btn btn-warning">All</a>

                                </div>
                            </div>
                        </div>
                    </div>

                     

                </div>
                <div class="col-md-4">
                    <h4>Brodcast Message</h4>
                    <hr>

                    <!-- With parsley -->

                    {!! Form::open(['route' => 'signals.store']) !!}
                        <div class='col-md-12' style='margin-bottom: 10px'>
                        {{ Form::label('messsage', 'Message:') }}
                        {{ Form::text('message', null, ['class' => 'form-control','style' => 'height:60px']) }}
                        </div>

                        <div class='col-md-12'>
                        {{ Form::submit('Submit', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 10px;']) }}
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <hr style="margin-top:25px">

@endsection

@section('content2')


    <div class = "row" style="margin-top:20px">
        <div class="col-md-8">
            <h3>Setup Signal</h3>
        </div>
        <div class="col-md-2" style="margin-top:15px">
        <a href="{{ route('signalsetups.create') }}" class="btn btn-block btn-primary">Add Signal</a>
        </div>
        <div class="col-md-2" style="margin-top:15px">
        <a href="{{ route('whalekrakens.cancelall') }}" class="btn btn-block btn-danger">Cancel All Signals</a>
        </div>
    </div>

    <div class = "row">
        <br>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Bot</th>
                    <th>Exchange</th>
                    <th>Pairing</th>
                    <th>Condition</th>
                    <th>% Profit</th>
                    <th>Status</th>
                    <th>Create At</th>

                    <th></th>
                </thead>

                <tbody>
                    


                </tbody>

            </table>
        </div>
    </div>
    </div>

@endsection

@section('content3')




@endsection