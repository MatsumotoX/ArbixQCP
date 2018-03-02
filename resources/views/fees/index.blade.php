@extends('layouts.main')

@section('title', '| All Fees')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Fees</h1>
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
                    <th>#</th>
                    <th>Exchange</th>
                    <th>Maker Fee</th>
                    <th>Taker Fee</th>
                    <th>Create At</th>
                    <th></th>
                </thead>

                <tbody>
                    
                    @foreach ($fees as $fee)

                        <tr>
                            <td>{{ $fee->id }}</td>
                            <td>{{ $fee->exchange }}</td>
                            <td>{{ $fee->fee_maker }}</td>
                            <td>{{ $fee->fee_taker }}</td>
                            <td>{{ date( 'M j, Y h:ia', strtotime($fee->created_at)) }}</td>
                            <td><a href="{{ route('fees.show', $fee->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>

@stop