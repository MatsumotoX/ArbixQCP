<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-fixing" role="navigation">
    <ul class="nav sidebar-nav" style="margin-top: -15px">
        <li class="sidebar-brand">
            <a>
                Fees
            </a>
        </li>

         <li class="{{ Request::is('fees') ? "active" : "" }}"><a href="{{ route('fees.index') }}">Trading Fee</a></li>
         
         <li class="dropdown open">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transfer Fee <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <li class="dropdown-header">Transferr Fee for each Coin</li>
            <li class="{{ Request::is('tfees/btc') ? "active" : "" }}"><a href="{{ route('tfees.index', 'btc') }}">Bitcoin</a></li>
            <li class="{{ Request::is('tfees/eth') ? "active" : "" }}"><a href="{{ route('tfees.index', 'eth') }}">Ethereum</a></li>
            <li class="{{ Request::is('tfees/xrp') ? "active" : "" }}"><a href="{{ route('tfees.index', 'xrp') }}">Ripple</a></li>
            </ul>
        </li>
        

    </ul>
</nav>