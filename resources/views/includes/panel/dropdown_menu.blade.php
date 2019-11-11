<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">¡Bienvenido!</h6>
                        </div>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Mi perfil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Cerrar Sesión</span>
                        </a>
                    </div>