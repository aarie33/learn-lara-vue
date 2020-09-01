
<!DOCTYPE html>
<html lang="en">  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Introduction | AdminLTE 3 Documentation</title>
    
    <title>Introduction | AdminLTE v3 Documentaion</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper" id="app">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link bg-info rounded dropdown-toggle" href="#" id="navbarVersionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    v3.0
                    </a>
                    <div class="dropdown-menu py-0" aria-labelledby="navbarVersionDropdown">
                        <a class="dropdown-item bg-info disabled" href="#">v3.0</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="https://adminlte.io/docs/2.4/installation">v2.4</a>
                        <a class="dropdown-item" href="https://adminlte.io/themes/AdminLTE/documentation/index.html"><= v2.3</a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <form class="form-check-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/docs/3.0/index.html" class="brand-link logo-switch">
                <img src="./img/profile.png" alt="AdminLTE Docs Logo Small" class="brand-image-xl logo-xs">
                <img src="./img/profile.png" alt="AdminLTE Docs Logo Large" class="brand-image-xs logo-xl" style="left: 12px">
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-microchip"></i>
                                <p>Dashboard</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/developer" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Developer</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Users</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-power-off"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
                <h1 class="text-dark">Introduction</h1>
            </div>
            <div class="content px-2">
                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>
            </div>
        </div>
        
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
            v3.0.3
            </div>
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>
