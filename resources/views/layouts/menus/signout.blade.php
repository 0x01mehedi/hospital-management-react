<li class="nav-item">

<a class="nav-link" href="{{ route('logout') }}"
    onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" data-bs-toggle="collapse" aria-expanded="false" aria-controls="general-pages">
       <span class="menu-title">{{ __('Logout') }}</span>                
        <i class="nav-icon fas fa-sign-out-alt menu-icon"></i>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
</li> 

<!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Sample Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/blank-page.html')}}"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/login.html')}}"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/register.html')}}"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/error-404.html')}}"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{asset('assets/pages/samples/error-500.html')}}"> 500 </a></li>
                </ul>
              </div>
</li> -->