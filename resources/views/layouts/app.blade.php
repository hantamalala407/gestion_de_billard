<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin IDEA</title>

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

        <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
        <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
        
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
        <!-- mon style -->
        <link rel="stylesheet" href="{{ asset('css/dash.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            
    </head>
    <body>
        <div class="container-scroller">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
              <a class="sidebar-brand brand-logo" href="index"><img src="{{ asset('images/logo_IDEA.png') }}" alt="logo" /></a>
              <a class="sidebar-brand brand-logo-mini" href="index"><img src="{{ asset('images/logo_IDEA.png') }}" alt="logo" /></a>
               
            </div>
            <ul class="nav">
              <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="../../index">
                  <span class="menu-icon">
                    <i class="mdi mdi-account-circle"></i>
                  </span>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>

              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <span class="menu-icon">
                    <i class="mdi mdi-account-circle"></i>
                  </span>
                  <span class="menu-title">Gestion des joueurs</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/dashboard/ajout"> Ajout d'un joueur </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/dashboard/liste"> Liste des joueurs </a></li>
                    <!--li class="nav-item"> <a class="nav-link" href="/dashboard/modification"> Modification </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/dashboard/liste"> Supression </a></li-->
                  </ul>
                </div>
              </li>

              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-trophy"></i>
                  </span>
                  <span class="menu-title">Gestion de  partie</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/games/create">Création de partie</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/games">Liste de partie</a></li>
                  </ul>
                </div>
              </li>
              
              <!--li class="nav-item menu-items">
                <a class="nav-link" href="/dashboard/statistique">
                  <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                  </span>
                  <span class="menu-title">Statistiques</span>
                </a>
              </li-->
            </ul>
          </nav>
          <!-- partial -->
          <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
              <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index"><img src="{{ asset('images/logo_IDEA.png') }}" alt="logo" /></a>
              </div>
              <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                  <span class="mdi mdi-menu"></span>
                </button>
                <!--ul class="navbar-nav w-100">
                  <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                      <input type="text" class="form-control" placeholder="recherche">
                    </form>
                  </li>
                </ul-->
                
                
                <ul class="navbar-nav navbar-nav-right">
                  
                  <li class="nav-item dropdown border-left border-right">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                      <i class="mdi mdi-bell"></i>
                      <span class="count bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                      <h6 class="p-3 mb-0">Notifications</h6>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-calendar text-success"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject mb-1">Evénemens d'aujourd'hui</p>
                          <!--p class="text-muted ellipsis mb-0"> Un reminder pour vous dire que vous avez un événement aujourd'hui </p-->
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                     
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                      <div class="navbar-profile">
                        <!--img class="img-xs rounded-circle" src="{{ asset('images/education.jpg') }}" alt=""-->

                        @if(Auth::user()->image)
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-xs rounded-circle" style="max-width: 200px;">
                        @else
                            <p>Aucune image disponible.</p>
                        @endif   
                                             
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">
                          {{ Auth::user()->name }}
                        </p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                      <h6 class="p-3 mb-0">Profil</h6>
                      <div class="dropdown-divider"></div>
    
                      <a class="dropdown-item preview-item" href="/parametre/parametre">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-settings text-success"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject mb-1">Paramètres</p>
                        </div>
                      </a>
    
                      <a class="dropdown-item preview-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-logout text-danger"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject mb-1">Déconnexion</p>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                    </div>
                  
                  </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                  <span class="mdi mdi-format-line-spacing"></span>
                </button>
              </div>
            </nav>
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <main>
                        @yield('content')
                     </main>
                </div>
            </div>

            </div>
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/off-canvas.js') }}"></script>

        <script src="../../assets/vendors/select2/select2.min.js"></script>
        <script src="../../assets/js/select2.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('assets/js/misc.js') }}"></script>
        <script src="{{ asset('assets/js/settings.js') }}"></script>
        <script src="{{ asset('assets/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
        <!-- End custom js for this page -->

        <script src="/js/script.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
      </body>
</html>
