<nav class=" navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="/home">Arbot (beta)</a>
      </div>
      <ul class="nav navbar-nav">

        
        <li class="{{ Request::is('fees') ? "active" : "" }}"><a href="/fees">Fee</a></li>
        <li class="{{ Request::is('signals') ? "active" : "" }}"><a href="/signals">Line Signal</a></li>
              

      </ul>

    </div>
  </div>
</nav>