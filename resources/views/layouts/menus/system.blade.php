<!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  System
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('roles')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Role</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('users')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage User</p>
                  </a>
                </li>
              </ul>
            </li> -->

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#system" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">System</span>
                <i class="menu-arrow"></i>
                <i class="nav-icon fas fa-cog menu-icon"></i>
              </a>
              <div class="collapse" id="system">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a  href="{{url('roles')}}" class="nav-link"> Manage Role </a></li>
                  <li class="nav-item"> <a  href="{{url('users')}}" class="nav-link"> Manage Users </a></li>
                </ul>
              </div>
            </li>           