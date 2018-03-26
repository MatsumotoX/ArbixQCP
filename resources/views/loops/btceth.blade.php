@extends('layouts.page')

@section('title', '| Loop')

@section('sidebar')
    @include('loops._sidebar')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>Loop | Btc-Eth</h1>
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
                            <th colspan="8" style="text-align:center">Bitcoin -> Ethereum</th>
                        </tr>
                        <tr >
                            <th></th>
                            <th>Binance</th>
                            <th>Bittrex</th>
                            <th>Bx</th>
                            <th>Coinone</th>
                            <th>Hitbtc</th>
                            <th>Kraken</th>
                            <th>Quoinex</th>
                        </tr>
                    </thead>

                    <tbody v-for="index in 7">
                        
                        <tr>
                            <td><b>@{{orderbooks[index-1].exchange}}</b></td>
                            <td>@{{Math.round(((orderbooks[0][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[0][3].price)/orderbooks[0][3].price)                    *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[1][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[1][3].price)/orderbooks[1][3].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[2][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[2][3].price)/orderbooks[2][3].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[3][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[3][3].price)/orderbooks[3][3].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[4][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[4][3].price)/orderbooks[4][3].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[5][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[5][3].price)/orderbooks[5][3].price)                   *100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[6][0].price-orderbooks[index-1][1].price)/orderbooks[index-1][1].price + (orderbooks[index-1][2].price-orderbooks[6][3].price)/orderbooks[6][3].price)                   *100*100)/100}}</td>
                        </tr>
                        

                    </tbody>

                </table>

                <table class="table" style="table-layout:fixed">
                    <thead>
                        <tr>
                            <th colspan="8" style="text-align:center">Ethereum -> Bitcoin</th>
                        </tr>
                        <tr >
                            <th></th>
                            <th>Binance</th>
                            <th>Bittrex</th>
                            <th>Bx</th>
                            <th>Coinone</th>
                            <th>Hitbtc</th>
                            <th>Kraken</th>
                            <th>Quoinex</th>
                        </tr>
                    </thead>

                    <tbody v-for="index in 7">
                        
                        <tr>
                        <td><b>@{{orderbooks[index-1].exchange}}</b></td>
                            <td>@{{Math.round(((orderbooks[0][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[0][1].price)/orderbooks[0][1].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[1][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[1][1].price)/orderbooks[1][1].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[2][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[2][1].price)/orderbooks[2][1].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[3][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[3][1].price)/orderbooks[3][1].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[4][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[4][1].price)/orderbooks[4][1].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[5][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[5][1].price)/orderbooks[5][1].price)*100*100)/100}}</td>
                            <td>@{{Math.round(((orderbooks[6][2].price-orderbooks[index-1][3].price)/orderbooks[index-1][3].price+ (orderbooks[index-1][0].price-orderbooks[6][1].price)/orderbooks[6][1].price)*100*100)/100}}</td>
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
                console.log(this.orderbooks[0]);
              })
        },
    }
    })

  </script>
@endsection