@extends('layouts.main')

@section('title', '| Line Notification')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Signal Bot</h1>
        </div>

        <div class="col-md-4">
            <h1 style='text-align: right'>LINE</h1>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-8">
            <h3>Kraken-Binance</h3>
            <hr>

            <div class="col-md-2">
                <h4>BTC-ETH:</h4>
            </div>
            <div class="col-md-10">
            <div class="btn-group btn-group-justified">
                
                    <a href="{{ route('signalskrakenbinance.push','market') }}" class="btn btn-danger">Market Price</a>
                    <a href="{{ route('signalskrakenbinance.push','marketlimit') }}" class="btn btn-primary">Market - Limit</a>
                    <a href="{{ route('signalskrakenbinance.push','limit') }}" class="btn btn-success">Limit Price</a>
                    <a href="{{ route('signalskrakenbinance.push','all') }}" class="btn btn-warning">All</a>

            </div>
            </div>


        </div>
        <div class="col-md-4">
            <h3>Brodcast Message</h3>
            <hr>

            <!-- With parsley -->

            {!! Form::open(['route' => 'signals.store']) !!}
                <div class='col-md-12' style='margin-bottom: 10px'>
                {{ Form::label('messsage', 'Message:') }}
                {{ Form::textarea('message', null, ['class' => 'form-control']) }}
                </div>

                <div class='col-md-12'>
                {{ Form::submit('Submit', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 10px;']) }}
                </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop