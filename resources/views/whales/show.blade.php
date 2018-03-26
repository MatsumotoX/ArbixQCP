@extends('layouts.main')

@section('title', '| View Whale')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <h2>Percentage: {{ $whale->percentage }}%</h2>
            <br>
            <p><b>Base Rate: {{ $whale->base_rate }}</b></p>
            <p>Bid Rate: {{ $whale->bid }}</p>
            <p>Filled: {{ $whale->bid_filled }}</p>
            <p>Order ID: {{ $whale->bid_id }}</p>
        </div>
        <div class="col-md-4">
            <h2>Volume: {{ $whale->volume }} ETH</h2>
            <br>
            <p><b>Status: {{ $whale->status }}</b></p>
            <p>Ask Rate: {{ $whale->ask }}</p>
            <p>Filled: {{ $whale->ask_filled }}</p>
            <p>Order ID: {{ $whale->ask_id }}</p>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date( 'M j, Y h:ia', strtotime($whale->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date( 'M j, Y h:ia', strtotime($whale->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('whales.replace', $whale->id) }}" class="btn btn-success btn-block">Replace</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('whales.cancel', $whale->id) }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection