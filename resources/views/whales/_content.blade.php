<div class="row">
    <div class="col-md-8">
        <h1>Whale Catcher</h1>
    </div>
    <div class="col-md-4">
        <h1 style='text-align: right'>@yield('pair')   |   @yield('exchange')</h1>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class = "row">
        <div class="col-md-10">

            @yield('formopen')
                
            <div class="col-md-2">
                {{ Form::submit('New Orders', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top: 25px']) }}
            </div>

            <div class='col-md-3'>
            {{ Form::label('percentage', 'Percentage:') }}
            {{ Form::text('percentage', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) }}
            </div>
            <div class='col-md-3'>
            {{ Form::label('volume', 'Volume (ETH):') }}
            {{ Form::text('volume', null, ['class' => 'form-control', 'required' => '', 'data-parsley-type' => 'number']) }}
            </div>
            
            <div class='col-md-4' style='margin-top: 25px'>
                <div class="col-md-4">
                <input type="checkbox" name="bidCheckbox" checked data-toggle="toggle" data-on="Bid" data-width="100" data-off="Bid off" data-onstyle="warning"> 
                </div>
                <div class="col-md-4">
                <input type="checkbox" name="askCheckbox" checked data-toggle="toggle" data-on="Ask" data-width="100" data-off="Ask off" data-onstyle="danger"> 
                </div>
                <div class="col-md-4">
                <input type="checkbox" name="replaceCheckbox" checked data-toggle="toggle" data-on="Auto Replace" data-off="Manual" data-onstyle="success"> 
                </div>
            </div>

            {!! Form::close() !!}

        </div>
        <div class="col-md-2" style="margin-top:20px">
        <h4 style='text-align: right'>Current Rate: <p style='display:inline'> {{ $baseprice }} </p></h4>
        </div>
    </div>