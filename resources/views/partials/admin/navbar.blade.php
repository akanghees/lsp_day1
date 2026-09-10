<header class="top-header">
      <nav class="navbar navbar-expand">
        <div class="mobile-toggle-icon d-xl-none">
            <i class="bi bi-list"></i>
          </div>
          <div class="top-navbar d-none d-xl-block">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/') }}" target="_blank">Lihat Website</a>
            </li>
          </ul>
          </div>

          <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown dropdown-large">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center gap-1">
                  <img src="{{ asset('admin/assets/images/avatars/avatar-1.png') }}" class="user-img" alt="">
                  <div class="user-name d-none d-sm-block">{{ auth()->user()->name }}</div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" alt="" class="rounded-circle" width="60" height="60">
                        <div class="ms-3">
                          <h6 class="mb-0 dropdown-user-name">{{ auth()->user()->name }}</h6>
                          <small class="mb-0 dropdown-user-designation text-secondary">{{ ucfirst(auth()->user()->role) }}</small>
                        </div>
                     </div>
                   </a>
                 </li>
                 <li><hr class="dropdown-divider"></li>
                 <li>
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                       <div class="d-flex align-items-center">
                         <div class="setting-icon"><i class="bi bi-speedometer2"></i></div>
                         <div class="setting-text ms-3"><span>Dashboard</span></div>
                       </div>
                     </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item border-0 bg-transparent w-100 text-start">
                        <div class="d-flex align-items-center">
                          <div class="setting-icon"><i class="bi bi-box-arrow-right"></i></div>
                          <div class="setting-text ms-3"><span>Logout</span></div>
                        </div>
                      </button>
                    </form>
                  </li>
              </ul>
            </li>
            </ul>
            </div>
      </nav>
    </header>