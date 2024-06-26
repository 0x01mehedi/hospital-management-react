<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #EEF5FF;">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{asset('assets/images/faces/01.jpg')}}" class="img-circle elevation-2" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Mehedi Hasan</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
             @include('layouts.menus.dashboard')
             @include('layouts.menus.appointment')
             @include('layouts.menus.patient')
             @include('layouts.menus.schedule')
             @include('layouts.menus.bed')
             @include('layouts.menus.department')
             @include('layouts.menus.doctor')
             @include('layouts.menus.medicine')
             @include('layouts.menus.prescription')

             @include('layouts.menus.system')
             @include('layouts.menus.signout') 
            
            
          </ul>
        </nav>