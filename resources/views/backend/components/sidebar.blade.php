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
                    <!-- Dashboards -->
                    <li class="menu-item active">
                        <a href="{{ route('dashboard.index') }}" class="menu-link">
                            <i class="menu-icon icon-base ti tabler-home"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                        </a>

             
                    <li class="menu-item">
                        <a href="form-validation.html" class="menu-link">
                            <i class="menu-icon icon-base ti tabler-checkbox"></i>
                            <div data-i18n="Form Validation">API</div>
                        </a>
                    </li>
                    <!-- Tables -->
                
                </ul>
            </aside>
              <div class="menu-mobile-toggler d-xl-none rounded-1">
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
                    <i class="ti tabler-menu icon-base"></i>
                    <i class="ti tabler-chevron-right icon-base"></i>
                </a>
            </div>