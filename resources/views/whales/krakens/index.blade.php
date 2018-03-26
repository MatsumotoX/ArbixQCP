@extends('layouts.whale')

@section('title', '| Line Notification')
@section('pair', 'Bitcoin')
@section('exchange', 'Kraken')

@section('formopen')
    {!! Form::open(['route' => 'whalekrakens.store', 'data-parsley-validate' => '']) !!}
@endsection

@section('content')
    


@stop