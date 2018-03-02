@extends('layouts.main')

@section('title', '| All Fees')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Arbot</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('fees.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Add New Fee</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    <div class="row">
    
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Exchange</th>
                    <th>Bid</th>
                    <th>Ask</th>

                </thead>

                <tbody>
                    
                    @foreach ($apis as $api)

                    <tr>
                        <td>{{ $api->exchange }}</td>
                        <td>{{ $api->bid }}</td>
                        <td>{{ $api->ask }}</td>
                    
                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>

@stop