         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="/">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.html">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.html">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>
                              
                              @if (Route::has('login'))
                                  @auth
                                    <!-- User Authenticated -->
                                    <li class="nav-item dropdown">
                                       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                               <img class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width: 30px; height: 30px;">
                                           @else
                                               {{ Auth::user()->name }}
                                           @endif
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                          <div class="block px-4 py-2 text-xs text-gray-400" style="font-size: x-small;">
                                             {{ __('Manage Account') }}
                                         </div>
                                           <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                                           {{-- <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a> --}}
                                           @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                               <a class="dropdown-item" href="{{ route('api-tokens.index') }}">API Tokens</a>
                                           @endif
                                           <div class="dropdown-divider"></div>
                                           <form method="POST" action="{{ route('logout') }}">
                                               @csrf
                                               <button type="submit" class="dropdown-item">Logout</button>
                                           </form>
                                       </div>
                                   </li>
                                  @else
                                  <li class="nav-item mr-1">
                                    <a class="nav-link" href="{{url('login')}}">Login</a>
                                 </li>
                                      @if (Route::has('register'))
                                      <li class="nav-item mr-1">
                                          <a class="nav-link" href="{{url('register')}}">Register</a>
                                       </li>
                                      @endif
                                  @endauth
                          @endif

                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>