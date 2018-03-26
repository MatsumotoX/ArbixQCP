@extends("layouts.page")

@section('title', '| Edit Fee')

@section('sidebar')
    @include('fees._sidebar')
@endsection

@section('content')

    <div class="row">
        {!! Form::model($fee, ['route' => ['tfees.update', $fee->id], 'method' => 'PUT']) !!}
            <div class="col-md-8">
                <div class='col-md-12' style='margin-bottom: 30px'>
                    {{ Form::label('exchange', 'Exchange:', ['style' => 'margin-bottom: 10px;']) }}
                    {{ Form::text('exchange', null, ['class' => 'form-control input-lg']) }}
                </div>
                <div class='col-md-6'>
                    {{ Form::label('fee_deposit', 'Fee (Deposit):', ['style' => 'margin-bottom: 10px;']) }}
                    {{ Form::text('fee_deposit', null, ['class' => 'form-control input-lg']) }}
                </div>
                <div class='col-md-6'>
                    {{ Form::label('fee_withdraw', 'Fee (Withdraw):', ['style' => 'margin-bottom: 10px;']) }}
                    {{ Form::text('fee_withdraw', null, ['class' => 'form-control input-lg']) }}
                </div>
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
                            <a href="{{ route('tfees.show', $fee->id) }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes', ['class' => "btn btn-success btn-block"]) }}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

@stop