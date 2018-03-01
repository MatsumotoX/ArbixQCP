<nav class=" navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Arbi Dev</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('fees') ? "active" : "" }}"><a href="/fees">Fee</a></li>
        <li class="{{ Request::is('signals') ? "active" : "" }}"><a href="/signals">Signal Bot</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Whale Bot
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="{{ Request::is('whalekrakens') ? "active" : "" }}"><a href="/whalekrakens">Kraken</a></li>
              <li><a href="#">Binance</a></li>
            </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
      </ul>
    </div>
  </div>
</nav>