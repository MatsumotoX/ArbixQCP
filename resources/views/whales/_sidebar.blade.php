<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-fixing" role="navigation">
    <ul class="nav sidebar-nav" style="margin-top: -15px">
        <li class="sidebar-brand">
            <a>
                Whale Bot
            </a>
        </li>

        <li class="dropdown open">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Binance <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Binance Whale Catcher</li>
            <li class="{{ Request::is('whales/binances/btc') ? "active" : "" }}"><a href="{{ route('whales.index', ['binance', 'btc']) }}">Bitcoin</a></li>
            <li class="{{ Request::is('whales/binances/eth') ? "active" : "" }}"><a href="{{ route('whales.index', ['binance', 'eth']) }}">Ethereum</a></li>
            <li class="{{ Request::is('whales/binances/btceth') ? "active" : "" }}"><a href="{{ route('whales.index', ['binance', 'btceth']) }}">Bitcoin - Ethereum</a></li>

        </ul>
        </li>
       
        <li>
            <a href="https://twitter.com/maridlcrmn">History Transaction</a>
        </li>
    </ul>
</nav>