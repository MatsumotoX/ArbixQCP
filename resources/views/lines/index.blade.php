@extends('layouts.main')

@section('title', '| Line Notification')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>LINE</h1>
        </div>

        <div class="col-md-4">
            <h1 style='text-align: right'>Message Pusher</h1>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

    <div class = "row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Brodcast Message</h1>
            <hr>

            <!-- With parsley -->

            {!! Form::open(['route' => 'lines.store']) !!}
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