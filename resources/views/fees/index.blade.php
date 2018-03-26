@extends('layouts.page')

@section('title', '| Exchange Fees')

@section('sidebar')
    @include('fees._sidebar')
@endsection

@section('stylesheets')
    <link href="{{ asset('/css/parsley.css') }}" rel="stylesheet"> 
@endsection

@section('content')

    <div class="row">
    {!! Form::open(['route' => 'fees.store', 'data-parsley-validate' => '']) !!}
        <div class="col-md-2">
            <h2>Trading Fees</h2>
        </div>

        <div class="col-md-8" style="margin-top:25px">

        
                <div class='col-md-6' style='margin-bottom: 10px'>
                {{ Form::text('exchange', null, ['class' => 'form-control','placeholder' => 'Exchange Name', 'required' => '']) }}
                </div>
                <div class='col-md-3'>
                {{ Form::text('fee_maker', null, ['class' => 'form-control','placeholder' => 'Maker Fee (%)', 'required' => '', 'data-parsley-type' => 'number']) }}
                </div>
                <div class='col-md-3'>
                {{ Form::text('fee_taker', null, ['class' => 'form-control','placeholder' => 'Taker fee (%)', 'required' => '', 'data-parsley-type' => 'number']) }}
                </div>
                
            
        </div>

        <div class="col-md-2">
            {{ Form::submit('Add Fee', ['class' => 'btn btn-lg btn-block btn-primary btn-h1-spacing']) }}
            
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('partials._messages')
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
                    
                    @foreach ($fees as $key => $fee)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $fee->exchange }}</td>
                            <td>{{ $fee->fee_maker.' %' }}</td>
                            <td>{{ $fee->fee_taker.' %' }}</td>
                            <td>{{ date( 'M j, Y h:ia', strtotime($fee->created_at)) }}</td>
                            <td><a href="{{ route('fees.show', $fee->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('fees.edit', $fee->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>

@stop

@section('scripts')

<script type="text/javascript" src="{!! asset('/js/parsley.min.js') !!}"></script>

@endsection