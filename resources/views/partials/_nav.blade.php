<nav class=" navbar navbar-inverse navbar-fixed-top">
 <div class="container-fluid">
   <div class="container">
     <div class="navbar-header">
       <a class="navbar-brand" href="/home">Arbot (beta)</a>
     </div>
     <ul class="nav navbar-nav">

       <li class="{{ Request::is('fees') ? "active" : "" }}"><a href="/fees">Fee</a></li>
       <li class="{{ Request::is('signals') ? "active" : "" }}"><a href="/signals">Black Panther</a></li>
       <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Whale Catcher
           <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li class="{{ Request::is('whalekrakens') ? "active" : "" }}"><a href="/whalekrakens">Kraken</a></li>
             <li><a href="#">Binance</a></li>
           </ul>
       </li>

     </ul>
     <ul class="nav navbar-nav navbar-right">
       <a class="navbar-brand">Perfect Plan</a>

       @guest

       @else
           <li class="nav-item dropdown">
               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ Auth::user()->name }} <span class="caret"></span>
               </a>

               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                       Logout
                   </a>

                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                   </form>
               </div>
           </li>
       @endguest

       
     </ul>
   </div>
 </div>
</nav>