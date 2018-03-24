<nav class=" navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainArbar" aria-expanded="false">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>

       </button>
        <a class="navbar-brand" href="/home">Arbot (beta)</a>
      </div>
      <div class="colapse navbar-collapse collapse" id="mainArbar" aria-expanded="false" style="height: 1px;">
      <ul class="nav navbar-nav">

        
        <li class="{{ Request::is('fiats') ? "active" : "" }}"><a href="/liveprices">Live Price</a></li>
        <li><a href="/home">One-way</a></li>
        <li class="{{ Request::is('signals') ? "active" : "" }}"><a href="/signals">Black Panther</a></li>
        <li class="{{ Request::is('whalekrakens') ? "active" : "" }}"><a href="/whalekrakens">Whale Catcher</a></li>
        <li><a href="/home">Green Python</a></li>
              

      </ul>
      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a class="dropdown-toggle navbar-brand" data-toggle="dropdown" href="#">CryptovationX
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/funds">Fund</a></li>
            <li><a href="/fees">Fee</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                Login
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
        </li>
        
      </ul>
      </div>
    </div>
  </div>
</nav>