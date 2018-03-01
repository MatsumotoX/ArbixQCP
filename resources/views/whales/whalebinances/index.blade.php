@extends('layouts.main')

@section('title', '| Line Notification')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Whale Bot</h1>
        </div>

        <div class="col-md-4">
    
            <h1 style='text-align: right'>Kraken</h1>
            
            
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class = "row">
        <div class="col-md-3">
        <a href="{{ route('whalekrakens.create') }}" class="btn btn-lg btn-block btn-primary">Add New Orders</a>
        </div>
        <div class="col-md-3">
        <a href="{{ route('whalekrakens.replaceall') }}" class="btn btn-lg btn-block btn-success">Replace All Orders</a>
        </div>
        <div class="col-md-3">
        <a href="{{ route('whalekrakens.cancelall') }}" class="btn btn-lg btn-block btn-danger">Cancel All Orders</a>
        </div>
        <div class="col-md-3">
        <h4 style='text-align: right'>Current Rate: <p style='display:inline'> {{ $baseprice }} </p></h4>
        </div>
    </div>

    <div class = "row">
        <br>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Base Rate</th>
                    <th>%</th>
                    <th>Bids</th>
                    <th>Asks</th>
                    <th>Volume (ETH)</th>
                    <th>Status</th>
                    <th>Profit</th>
                    <th>Create At</th>

                    <th></th>
                </thead>

                <tbody>
                    
                    @foreach ($whales as $whale)

                        <tr>
                            <th>{{ $whale->id }}</th>
                            <td>{{ $whale->base_rate }}</td>
                            <td>{{ $whale->percentage }}</td>
                            <td>{{ $whale->bid }}</td>
                            <td>{{ $whale->ask }}</td>
                            <td>{{ $whale->volume }}</td>
                            <td>{{ $whale->status }}</td>
                            <td>{{ $whale->profit }}</td>
                            <td>{{ date( 'M j, Y h:ia', strtotime($whale->created_at)) }}</td>
                            <td><a href="{{ route('whalekrakens.show', $whale->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('whalekrakens.replace', $whale->id) }}" class="btn btn-default btn-sm">Replace</a> <a href="{{ route('whalekrakens.cancel', $whale->id) }}" class="btn btn-default btn-sm">Cancel</a></td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
    </div>


@stop