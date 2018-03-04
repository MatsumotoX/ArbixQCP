@extends('layouts.main')

@section('title', '| All Fees')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Price Table</h1>
        </div>

        
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    <div class="row">
    
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>Region</th>
                    <th>Buy</th>
                    <th>Sell</th>
                    <th>Buy</th>
                    <th>Sell</th>
                    <th>Buy</th>
                    <th>Sell</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($apis as $api)
                    <tr>
                        <td>{{ $api[0]->exchange }}</td>
                        <td>{{ $api[0]->ask }}</td>
                        <td>{{ $api[0]->bid }}</td>
                        <td>{{ $api[1]->ask }}</td>
                        <td>{{ $api[1]->bid }}</td>
                        <td>{{ $api[2]->ask }}</td>
                        <td>{{ $api[2]->bid }}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

            
        </div>
    </div>

@stop