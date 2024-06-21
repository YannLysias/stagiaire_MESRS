    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid" style="background-color: #0b5e1e;">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/dashboard">STAGIAIRES MESRS</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li> 
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="/Dashboard1/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nom . ' ' . Auth::user()->prenom }}</div>
                    <div class="email">{{Auth::user()->role}}</div>

                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('personnel-profile.show', ['personnel_profile' => Auth::id()]) }}"><i class="material-icons">person</i>Profile</a></li>
                            <li>
                                <form action="/logout" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link logout-button">
                                        <i class="material-icons">input</i> Se déconnecter
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            @if ( Auth::user()->role == "Administrateur")
            <div class="menu">
                <ul class="list">
                    <li class="header">TABLEAU DE BORD</li>

                    <li class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="/dashboard">
                        <a href="/dashboard">
                            <i class="material-icons">home</i>
                            <span>DASHBOARD</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Route::currentRouteName() == 'personnels.index' ? 'active' : '' }}" href="/personnels">
                        <a href="/personnels">
                            <i class="material-icons">person</i>
                            <span>PERSONNELS</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Route::currentRouteName() == 'structure.index' ? 'active' : '' }}" href="/structure">
                        <a href="/structure">
                            <i class="material-icons">location_city</i>
                            <span>STRUCTURES</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Route::currentRouteName() == 'service.index' ? 'active' : '' }}" href="/service">
                        <a href="/service">
                            <i class="material-icons">build</i>
                            <span>SERVICES</span>
                        </a>
                    </li>
                        </ul>
                    </li>   
                    @endif

                    @if ( Auth::user()->role == "Stagiaire")
                    <div class="menu">
                        <ul class="list">
                        <li class="header">TABLEAU DE BORD</li>

                        <li class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="/dashboard">
                                <a href="/dashboard">
                                    <i class="material-icons">home</i>
                                    <span>DASHBOARD</span>
                                </a>
                            </li>

                        <li class="nav-link {{ Route::currentRouteName() == 'document.index' ? 'active' : '' }}" href="/document">
                            <a href="/document">
                                <i class="material-icons">book</i>
                                <span>DOCUMENT</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'observation.index' ? 'active' : '' }}" href="observation">
                            <a href="/observation">
                                <i class="material-icons">edit</i>
                                <span>Mes observations</span>
                            </a>
                        </li>
                        
                    @endif

                    @if ( Auth::user()->role == "Directeur")
                    <div class="menu">
                        <ul class="list">
                            <li class="header">TABLEAU DE BORD</li>
        
                            <li class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="/dashboard">
                                <a href="/dashboard">
                                    <i class="material-icons">home</i>
                                    <span>DASHBOARD</span>
                                </a>
                            </li>
        
                            <li class="nav-link {{ Route::currentRouteName() == 'stage.index' ? 'active' : '' }}" href="stage">
                                <a href="/stage">
                                    <i class="material-icons">group</i>
                                    <span>VOIR LES DEMANDES</span>
                                </a>
                            </li>
        
                            <li class="nav-link {{ Route::currentRouteName() == 'personnels.index' ? 'active' : '' }}" href="/personnels">
                                <a href="/personnels">
                                    <i class="material-icons">person</i>
                                    <span>PERSONNELS</span>
                                </a>
                            </li>
        
                            <li class="nav-link {{ Route::currentRouteName() == 'structure.index' ? 'active' : '' }}" href="/structure">
                                <a href="/structure">
                                    <i class="material-icons">location_city</i>
                                    <span>STRUCTURES</span>
                                </a>
                            </li>
        
                            <li class="nav-link {{ Route::currentRouteName() == 'service.index' ? 'active' : '' }}" href="/service">
                                <a href="/service">
                                    <i class="material-icons">build</i>
                                    <span>SERVICES</span>
                                </a>
                            </li>

                                </ul>
                            </li> 
                    @endif

                    @if ( Auth::user()->role == "Secretaire")
                    <div class="menu">
                    <ul class="list">
                    <li class="header">TABLEAU DE BORD</li>

                    <li class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="/dashboard">
                        <a href="/dashboard">
                           <i class="material-icons">home</i>
                             <span>DASHBOARD</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Route::currentRouteName() == 'stage.index' ? 'active' : '' }}" href="stage">
                        <a href="/stage">
                            <i class="material-icons">group</i>
                            <span>VOIR LES DEMANDES</span>
                        </a>
                    </li>
                    <li class="nav-link {{ Route::currentRouteName() == 'stagiaire.index' ? 'active' : '' }}" href="/stagiaire">
                        <a href="/stagiaire">
                            <i class="material-icons">group</i>
                            <span>STAGIAIRES</span>
                        </a>
                    </li>
                    @endif

                    @if ( Auth::user()->role == "ChefService")
                        <div class="menu">
                <ul class="list">
                    <li class="header">TABLEAU DE BORD</li>

                    <li class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="/dashboard">
                        <a href="/dashboard">
                           <i class="material-icons">home</i>
                             <span>DASHBOARD</span>
                        </a>
                    </li>
                    
                    <li class="nav-link {{ Route::currentRouteName() == 'stagiaire.index' ? 'active' : '' }}" href="/stagiaire">
                        <a href="/stagiaire">
                            <i class="material-icons">group</i>
                            <span>STAGIAIRES</span>
                        </a>
                    </li>

                    <li class="nav-link {{ Route::currentRouteName() == 'document.index' ? 'active' : '' }}" href="/document">
                        <a href="/document">
                            <i class="material-icons">book</i>
                            <span>DOCUMENT</span>
                        </a>
                    </li>
                    <li class="nav-link {{ Route::currentRouteName() == 'observation.index' ? 'active' : '' }}" href="observation">
                        <a href="/observation">
                            <i class="material-icons">edit</i>
                            <span>Mes observations</span>
                        </a>
                    </li>
                        </ul>
                    </li> 
                    @endif      
                </ul>
            </div>
            <div class="legal">
                <div class="copyright">
                    &copy; 2023 - 2024 <a href="javascript:void(0);">MESRS Bénin</a>.
                </div>
            </div>
            <!-- #Menu -->