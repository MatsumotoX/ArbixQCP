@extends('layouts.main')

@section('title', '| View Fee')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $fee->exchange }}</h1>
            <br>
            <p>Maker Fee: {{ $fee->fee_maker }}%</p>
            <p>Taker Fee: {{ $fee->fee_taker }}%</p>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date( 'M j, Y h:ia', strtotime($fee->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date( 'M j, Y h:ia', strtotime($fee->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['fees.destroy', $fee->id], 'method' => 'DELETE']) !!}

                        {{ Form::submit('Delete', ['class' => "btn btn-danger btn-block"]) }}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection