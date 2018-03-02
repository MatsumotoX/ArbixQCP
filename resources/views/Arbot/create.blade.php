@extends('layouts.main')

@section('title', '| Create New Fee')

@section('stylesheets')
    <link href="{{ asset('/css/parsley.css') }}" rel="stylesheet"> 
@endsection

@section('content')

    <div class = "row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Fee</h1>
            <hr>

            <!-- With parsley -->

            {!! Form::open(['route' => 'fees.store', 'data-parsley-validate' => '']) !!}
                <div class='col-md-12' style='margin-bottom: 10px'>
                {{ Form::label('exchange', 'Exchange:') }}
                {{ Form::text('exchange', null, ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div class='col-md-6'>
                {{ Form::label('fee_maker', 'Fee (Maker):') }}
                {{ Form::text('fee_maker', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) }}
                </div>
                <div class='col-md-6'>
                {{ Form::label('fee_taker', 'Fee (Taker):') }}
                {{ Form::text('fee_taker', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) }}
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


@endsection