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
            <div id="app">
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

                    <tbody v-for="orderbook in orderbooks">
                        
                        <tr>
                            <td>@{{orderbook.exchange}}</td>
                            <td>@{{Math.round(orderbook[0].price*100)/100}}</td>
                            <td>@{{Math.round(orderbook[1].price*100)/100}}</td>
                            <td>@{{Math.round(orderbook[2].price*100)/100}}</td>
                            <td>@{{Math.round(orderbook[3].price*100)/100}}</td>
                            <td>@{{Math.round(orderbook[4].price*100000)/100000}}</td>
                            <td>@{{Math.round(orderbook[5].price*100000)/100000}}</td>
                            
                        </tr>
                        

                    </tbody>

                </table>

            </div>
        </div>
    </div>

@stop

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
                this.orderbooks = orderbooks.body;
              })
        },
    }
    })

  </script>
@endsection