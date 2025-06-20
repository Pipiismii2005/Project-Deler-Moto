<nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand"href="index.html"><img src="logoo.png" alt="Logo1" width="140" height="auto"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                     </li>
         
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('lihatproduk') }}">Shop</a>
                     </li>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                     </li>
                  </ul>
               <div class="login_bt ml-3">
   <ul class="navbar-nav">
      @guest
         <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
         <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      @else
         <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" class="btn btn-danger nav-link" style="border: none; background: none; padding: 0;">Logout</button>
            </form>
         </li>
      @endguest
   </ul>
</div>

               </div>
            </nav>