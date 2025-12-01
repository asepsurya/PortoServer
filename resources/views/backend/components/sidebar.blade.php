  <aside id="layout-menu" class="layout-menu menu-vertical menu" data-bs-theme="dark">

      <div class="app-brand demo ">
          <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                  <img src="{{ asset('img/fav.png') }}" alt="logo" width="50" height="50">
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-3">My Apps</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="icon-base ti menu-toggle-icon d-none d-xl-block"></i>
              <i class="icon-base ti tabler-x d-block d-xl-none"></i>
          </a>
      </div>

      <div class="menu-inner-shadow"></div>


      <ul class="menu-inner py-1">

          <li class="menu-item active">
              <a href="{{ route('posts.add') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-plus"></i>
                  <div>Tambah Postingan</div>
              </a>
          </li>

          <li class="menu-header small">
              <span class="menu-header-text">Apps & Pages</span>
          </li>

          <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
              <a href="{{ route('dashboard.index') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-dashboard"></i>
                  <div>Dashboards</div>
              </a>
          </li>
           <li class="menu-item {{ request()->routeIs('media.*') ? 'active' : '' }}">
                <a href="{{ route('media.index') }}" class="menu-link">
                    <i class="menu-icon ti tabler-photo"></i>
                    <div>Media</div>
                </a>
            </li>

          <li class="menu-item {{ request()->routeIs('posts.*') ? 'active' : '' }}">
              <a href="{{ route('posts.index') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-notes"></i>
                  <div>Postingan</div>
              </a>
          </li>
        


          <li class="menu-item {{ request()->is('komentar*') ? 'active' : '' }}">
              <a href="form-validation.html" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-message-circle"></i>
                  <div>Komentar</div>
              </a>
          </li>

          <li class="menu-item {{ request()->is('statistik*') ? 'active' : '' }}">
              <a href="{{ route('statistik.index') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-chart-bar"></i>
                  <div>Statistik</div>
              </a>
          </li>

          <li class="menu-item {{ request()->routeIs('project.*') ? 'active' : '' }}">
              <a href="{{ route('project.index') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-folder-code"></i>
                  <div>Project Saya</div>
              </a>
          </li>

          <li class="menu-item {{ request()->is('settings*') ? 'active' : '' }}">
              <a href="form-validation.html" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-settings"></i>
                  <div>Setelan</div>
              </a>
          </li>

          <li class="menu-item {{ request()->is('token*') ? 'active' : '' }}">
              <a href="{{ route('tokens.index') }}" class="menu-link">
                  <i class="menu-icon icon-base ti tabler-api"></i>
                  <div>API</div>
              </a>
          </li>

      </ul>


  </aside>
  <div class="menu-mobile-toggler d-xl-none rounded-1">
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
          <i class="ti tabler-menu icon-base"></i>
          <i class="ti tabler-chevron-right icon-base"></i>
      </a>
  </div>
