@extends('layouts.main')

@section('title', '| Create New Fee')

@section('stylesheets')
    <link href="{{ asset('/css/parsley.css') }}" rel="stylesheet"> 
    <link href="{{ asset('/css/bootstrap2-toggle.css') }}" rel="stylesheet"> 
@endsection

@section('content')

    <div class = "row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Whale Bot</h1>
            <hr>

            <!-- With parsley -->

            {!! Form::open(['route' => 'whalekrakens.store', 'data-parsley-validate' => '']) !!}
                <div class='col-md-12' style='margin-bottom: 10px'>
                {{ Form::label('exchange', 'Exchange:') }}
                {{ Form::text('exchange', 'Kraken', ['class' => 'form-control', 'required' => '', 'data-parsley-equalto' => 'Kraken']) }}
                </div>
                <div class='col-md-6'>
                {{ Form::label('percentage', 'Percentage:') }}
                {{ Form::text('percentage', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) }}
                </div>
                <div class='col-md-6'>
                {{ Form::label('volume', 'Volume (ETH):') }}
                {{ Form::text('volume', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) }}
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