@extends('layouts.page')

@section('title', '| Line Notification')

@section('sidebar')
    @include('whales._sidebar')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Whale Catcher</h1>
        </div>

        <div class="col-md-4">
    
            <h1 style='text-align: right'>Ethereum   |   Binance</h1>
            
            
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class = "row">
        <div class="col-md-10">

            {!! Form::open(['route' => ['whales.store','binance','eth']]) !!}
                
            <div class="col-md-2">
                {{ Form::submit('New Orders', ['class' => 'btn btn-primary btn-block']) }}
            </div>

            <div class='col-md-3'>
            {{ Form::text('percentage', null, ['class' => 'form-control', 'required' => '','placeholder' => 'Percentage']) }}
            </div>
            <div class='col-md-3'>
            {{ Form::text('volume', null, ['class' => 'form-control', 'required' => '','placeholder' => 'Volume']) }}
            </div>
            
            <div class='col-md-4'>
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
        <div class="col-md-2" id = "app">
        <h4 style='text-align: right'>Current Rate: <p style='display:inline'>@{{(-orderbooks[0][2].price-orderbooks[0][3].price)/-2}} </p></h4>
        </div>
    </div>

    <div class="row">
        <hr>
    </div>
    @include('partials._messages')
    <div class = "row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Base Rate</th>
                    <th>%</th>
                    <th>Bids</th>
                    <th>Asks</th>
                    <th>Volume (ETH)</th>
                    <th>Fill %</th>
                    <th>Profit</th>
                    <th>Status</th>
                    <th>Create At</th>

                    <th><a class="btn btn-success btn-sm">Replace All</a> <a class="btn btn-danger btn-sm">Cancel All</a></th>
                </thead>

                <tbody>
                    
                    @foreach ($whales as $key=>$whale)

                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $whale->base_rate }}</td>
                            <td>{{ $whale->percentage }}</td>
                            <td>{{ $whale->bid }}</td>
                            <td>{{ $whale->ask }}</td>
                            <td>{{ $whale->volume }}</td>
                            <td>{{ $whale->fill }}</td>
                            <td>{{ $whale->profit }}</td>
                            <td>{{ $whale->status }}</td>
                            <td>{{ date( 'M j, Y h:ia', strtotime($whale->created_at)) }}</td>
                            <td><a href="{{ route('whales.show', $whale->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('whales.replace', $whale->id) }}" class="btn btn-default btn-sm">Replace</a> <a href="{{ route('whales.cancel', $whale->id) }}" class="btn btn-default btn-sm">Cancel</a></td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
    </div>

    


@endsection

@section('scripts')
  <script>

    const app = new Vue({
      el: '#app',
      data: {
        orderbooks: {},
      },
      mounted() {
        this.getPrices();
        this.listen();
      },
      methods: {
        getPrices() {
          axios.get('/api/liveprices')
                .then((response) => {
                  this.orderbooks = response.data
                })
                .catch(function (error) {
                  console.log(error);
                });
            },
        listen() {
          Echo.channel('liveprices')
              .listen('.priceupdate', (orderbooks) => {
                this.orderbooks = JSON.parse(orderbooks.body);
              })
        },
    }
    })

  </script>
@endsection