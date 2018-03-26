<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-fixing" role="navigation">
    <ul class="nav sidebar-nav" style="margin-top: -15px">
        <li class="sidebar-brand">
            <a>
                Whale Bot
            </a>
        </li>

        <li class="{{ Request::is('loops/btceth') ? "active" : "" }}"><a href="{{ route('loops.index', 'btceth') }}">Bitcoin-Ethereum</a></li>
        <li class="{{ Request::is('loops/btcxrp') ? "active" : "" }}"><a href="{{ route('loops.index', 'btcxrp') }}">Bitcoin-Ripple</a></li>
        <li class="{{ Request::is('loops/ethxrp') ? "active" : "" }}"><a href="{{ route('loops.index', 'ethxrp') }}">Ethereum-Ripple</a></li>
       
    </ul>
</nav>