@extends('layouts.main')

@section('title', '| Create New Fee')

@section('stylesheets')
    <!-- <link href="{{ asset('/css/parsley.css') }}" rel="stylesheet">  -->
    <link href="{{ asset('/css/toggle-button.css') }}" rel="stylesheet"> 
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
                <div class='col-md-12'>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block', 'style' => 'margin-top: 10px;']) }}
                </div>
            {!! Form::close() !!}

        </div>
    </div>
    <div class = "row">
        <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('/js/parsley.min.js') !!}"></script>
    


@endsection