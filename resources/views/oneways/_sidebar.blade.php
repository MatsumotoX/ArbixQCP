<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-fixing" role="navigation">
    <ul class="nav sidebar-nav" style="margin-top: -15px">
        <li class="sidebar-brand">
            <a>
                Whale Bot
            </a>
        </li>

        <li class="{{ Request::is('oneways/btc') ? "active" : "" }}"><a href="{{ route('oneways.index', 'btc') }}">Bitcoin</a></li>
        <li class="{{ Request::is('oneways/eth') ? "active" : "" }}"><a href="{{ route('oneways.index', 'eth') }}">Ethereum</a></li>
        <li class="{{ Request::is('oneways/xrp') ? "active" : "" }}"><a href="{{ route('oneways.index', 'xrp') }}">Ripple</a></li>
       
    </ul>
</nav>