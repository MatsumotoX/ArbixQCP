@extends('layouts.page')

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
                    <tr>
                        <th>Market Exchange</th>
                        <th>Bitcoin</th>
                        <th></th>
                        <th>Ethereum</th>
                        <th></th>
                        <th>Ripple</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Region</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th>Buy</th>
                        <th>Sell</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orderbooks as $orderbook)
                    <tr>
                        <td>{{ $orderbook['exchange'] }}</td>
                        <td>{{ round($orderbook[0]['price'],2) }}</td>
                        <td>{{ round($orderbook[1]['price'],2) }}</td>
                        <td>{{ round($orderbook[2]['price'],2) }}</td>
                        <td>{{ round($orderbook[3]['price'],2) }}</td>
                        <td>{{ round($orderbook[4]['price'],6) }}</td>
                        <td>{{ round($orderbook[5]['price'],6) }}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>

            
        </div>
    </div>

@stop