<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
               <img src="{{asset('images/up.jpeg')}}" style="object-fit: contain; width: 60px;" alt="" srcset="">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase;">EAD</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none d-block">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
        @if (Auth::user()->role == 'admin')
        <ul class="menu-inner py-1 ps">
              <!-- Dashboard -->
              <li class="menu-item {{ Request::is('admin') ? 'active' : ''}}">
                <a href="{{route('admin.index')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              
             {{-- 
                <!-- AGENDAS -->
                <li class="menu-item {{ Request::is('admin/agenda') ? 'active' : ''}}">
                  <a href="{{route('admin.agenda.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Agenda</div>
                  </a>
                </li>
              --}} 

              <!-- Layouts -->
              <li class="menu-item {{ Request::is('admin/users/*') ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-link menu-toggle ">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Usuarios</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{route('admin.user.tutor.index')}}" class="menu-link">
                      <div data-i18n="Without menu">Tutores</div>
                    </a>
                  </li>
                </ul>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{route('admin.user.estudante.index')}}" class="menu-link">
                      <div data-i18n="Without menu">Estudantes</div>
                    </a>
                  </li>
                </ul>


                <!-- settings -->
                <li class="menu-item {{ Request::is('admin/settings/*') ? 'active' : ''}}">
                  <a href="javascript:void(0);" class="menu-link menu-toggle ">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">Definicoes</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('admin.permission.index')}}" class="menu-link">
                        <div data-i18n="Without menu">Permissoes</div>
                      </a>
                    </li>
                  </ul>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('admin.settings.faculdade.index')}}" class="menu-link">
                        <div data-i18n="Without menu">Faculdades</div>
                      </a>
                    </li>
                  </ul>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('admin.settings.curso.index')}}" class="menu-link">
                        <div data-i18n="Without menu">Cursos</div>
                      </a>
                    </li>
                  </ul>
                
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('admin.settings.disciplina.index')}}" class="menu-link">
                        <div data-i18n="Without menu">Disciplinas</div>
                      </a>
                    </li>
                  </ul>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('admin.settings.turmas.index')}}" class="menu-link">
                        <div data-i18n="Without menu">Turmas</div>
                      </a>
                    </li>
                  </ul>

            
                </li>
              
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
        </ul>
        @endif

        @if (Auth::user()->role == 'tutor')
        <ul class="menu-inner py-1 ps">
              <!-- Dashboard -->
              <li class="menu-item {{ Request::is('tutor') ? 'active' : ''}}">
                <a href="{{route('tutor.index')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              
              <!-- AGENDAS -->
              <li class="menu-item {{ Request::is('tutor/agenda') ? 'active' : ''}}">
                <a href="{{route('tutor.agenda')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Agenda</div>
                </a>
              </li>
              <!--    AULAS   -->
              <li class="menu-item {{ Request::is('tutor/aula/*') ? 'active' : ''}}">
                <a href="javascript:void(0);" class="menu-link menu-toggle ">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Aulas</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{route('tutor.aula.index')}}" class="menu-link">
                      <div data-i18n="Without menu">Aulas</div>
                    </a>
                  </li>
                </ul>

              
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
        </ul>
        @endif

        @if (Auth::user()->role == 'estudante')
        <ul class="menu-inner py-1 ps">
              <!-- Dashboard -->
              <li class="menu-item {{ Request::is('student') ? 'active' : ''}}">
                <a href="{{route('student.index')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              
              <!-- AGENDAS -->
              <li class="menu-item {{ Request::is('student/agenda') ? 'active' : ''}}">
                <a href="{{route('student.agenda')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Agenda</div>
                </a>
              </li>

              <!-- AULAS -->
              <li class="menu-item {{ Request::is('student/aulas') ? 'active' : ''}}">
                <a href="{{route('student.aulas')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Aulas</div>
                </a>
              </li>
              
              
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
        </ul>
        @endif
        </aside>