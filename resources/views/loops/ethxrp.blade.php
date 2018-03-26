@extends('layouts.page')

@section('title', '| Loop')

@section('sidebar')
    @include('loops._sidebar')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Oneway | Eth-Xrp</h1>
        </div>

        
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    <div class="row">

        <div class="col-md-11">
            <div id="app">
            <table class="table" style="table-layout:fixed">
                    <thead>
                        <tr>
                            <th colspan="8" style="text-align:center">Ethereum -> Ripple</th>
                        </tr>
                        <tr >
                            <th></th>
                            <th>Bittrex</th>
                            <th>Bx</th>
                            <th>Coinone</th>
                            <th>Hitbtc</th>
                            <th>Kraken</th>
                            <th>Quoinex</th>
                        </tr>
                    </thead>

                    <tbody v-for="index in 6">
                        
                        <tr>
                            <td><b>@{{orderbooks[index].exchange}}</b></td>
                            <td>@{{Math.round(((orderbooks[1][2].price-orderbooks[index][3].price)/orderbooks[index][3].price + (orderbooks[index][4].price-orderbooks[1][5].price)/orderbooks[1][5].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[2][2].price-orderbooks[index][3].price)/orderbooks[index][3].price + (orderbooks[index][4].price-orderbooks[2][5].price)/orderbooks[2][5].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[3][2].price-orderbooks[index][3].price)/orderbooks[index][3].price + (orderbooks[index][4].price-orderbooks[3][5].price)/orderbooks[3][5].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[4][2].price-orderbooks[index][3].price)/orderbooks[index][3].price + (orderbooks[index][4].price-orderbooks[4][5].price)/orderbooks[4][5].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[5][2].price-orderbooks[index][3].price)/orderbooks[index][3].price + (orderbooks[index][4].price-orderbooks[5][5].price)/orderbooks[5][5].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[6][2].price-orderbooks[index][3].price)/orderbooks[index][3].price + (orderbooks[index][4].price-orderbooks[6][5].price)/orderbooks[6][5].price)                   *100*100)/100}}</td>
                        </tr>
                        

                    </tbody>

                </table>

                <table class="table" style="table-layout:fixed">
                    <thead>
                        <tr>
                            <th colspan="8" style="text-align:center">Ripple -> Ethereum</th>
                        </tr>
                        <tr >
                            <th></th>
                            <th>Bittrex</th>
                            <th>Bx</th>
                            <th>Coinone</th>
                            <th>Hitbtc</th>
                            <th>Kraken</th>
                            <th>Quoinex</th>
                        </tr>
                    </thead>

                    <tbody v-for="index in 6">
                        
                        <tr>
                        <td><b>@{{orderbooks[index].exchange}}</b></td>
                            <td>@{{Math.round(((orderbooks[1][4].price-orderbooks[index][5].price)/orderbooks[index][4].price+ (orderbooks[index][2].price-orderbooks[1][3].price)/orderbooks[1][3].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[2][4].price-orderbooks[index][5].price)/orderbooks[index][4].price+ (orderbooks[index][2].price-orderbooks[2][3].price)/orderbooks[2][3].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[3][4].price-orderbooks[index][5].price)/orderbooks[index][4].price+ (orderbooks[index][2].price-orderbooks[3][3].price)/orderbooks[3][3].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[4][4].price-orderbooks[index][5].price)/orderbooks[index][4].price+ (orderbooks[index][2].price-orderbooks[4][3].price)/orderbooks[4][3].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[5][4].price-orderbooks[index][5].price)/orderbooks[index][4].price+ (orderbooks[index][2].price-orderbooks[5][3].price)/orderbooks[5][3].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[6][4].price-orderbooks[index][5].price)/orderbooks[index][4].price+ (orderbooks[index][2].price-orderbooks[6][3].price)/orderbooks[6][3].price)*100*100)/100}}</td>
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
                this.orderbooks = JSON.parse(orderbooks.body);
              })
        },
    }
    })

  </script>
@endsection