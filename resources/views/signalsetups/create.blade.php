@extends('layouts.main')

@section('title', '| Create New Fee')

@section('stylesheets')
    <link href="{{ asset('/css/parsley.css') }}" rel="stylesheet"> 
    <link href="{{ asset('/css/bootstrap2-toggle.css') }}" rel="stylesheet"> 
@endsection

@section('content')

    <div class = "row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Signal Setup</h1>
            <hr>

            <!-- With parsley -->

            {!! Form::open(['route' => 'whalekrakens.store', 'data-parsley-validate' => '']) !!}
                <div class='col-md-6' style='margin-bottom: 10px'>
                {{ Form::label('exchange1', 'Exchange (Maker):') }}
                {{ Form::select('exchange1', ['0' => 'Kraken', '1' => 'Binance'], null, ['class' => 'form-control','placeholder' => '']) }}
                </div>
                <div class='col-md-6' style='margin-bottom: 10px'>
                {{ Form::label('exchange2', 'Exchange (Taker):') }}
                {{ Form::select('exchange2', ['0' => 'Kraken', '1' => 'Binance'], null, ['class' => 'form-control','placeholder' => '']) }}
                </div>
                <div class='col-md-6' style='margin-bottom: 10px'>
                {{ Form::label('strategy', 'Strategy:') }}
                {{ Form::text('strategy', 'Black Panther', ['class' => 'form-control', 'required' => '', 'disabled']) }}
                </div>
                <div class='col-md-6' style='margin-bottom: 10px'>
                {{ Form::label('pairing', 'Pairing:') }}
                {{ Form::text('pairing', 'BTC-ETH', ['class' => 'form-control', 'required' => '', 'disabled']) }}
                </div>
                <div class='col-md-6'>
                {{ Form::label('strategy', 'Strategy:') }}
                {{ Form::text('strategy', 'Black Panther', ['class' => 'form-control', 'required' => '', 'disabled']) }}
                </div>
                <div class='col-md-6'>
                {{ Form::label('pairing', 'Pairing:') }}
                {{ Form::text('pairing', 'BTC-ETH', ['class' => 'form-control', 'required' => '', 'disabled']) }}
                </div>
                
                <div class='col-md-4' style='margin-top: 20px'>

                    <input type="checkbox" name="bidCheckbox" checked data-toggle="toggle" data-on="Bid" data-off="Bid off" data-width="220" data-onstyle="warning"> 

               </div>
               <div class='col-md-4' style='margin-top: 20px'>

                    <input type="checkbox" name="askCheckbox" checked data-toggle="toggle" data-on="Ask" data-off="Ask off" data-width="220" data-onstyle="danger"> 

               </div>
               <div class='col-md-4' style='margin-top: 20px'>

                    <input type="checkbox" name="replaceCheckbox" checked data-toggle="toggle" data-on="Auto Replace" data-off="Manual Replace" data-width="220" data-onstyle="success"> 

               </div>
               <div class='col-md-12' >
                    <hr>
                </div>
                <div class='col-md-12'>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 10px;']) }}
                </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('/js/parsley.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('/js/bootstrap2-toggle.js') !!}"></script>


@endsection