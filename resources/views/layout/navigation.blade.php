<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @auth
                    <a href="" class="d-block">{{ Auth::user()->name }}</a>
                @endauth
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(auth()->user()->role === 'admin')
                    <!-- Admin Specific Links -->
                    <li class="nav-item">
                        <a href="{{ route('admin.books.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>All Books</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Owners</p>
                        </a>
                    </li>
                @elseif(auth()->user()->role === 'book_owner')
                    <!-- Book Owner Specific Links -->
                    <li class="nav-item">
                        <a href="{{route('owner.books.create')}}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>My Books</p>
                        </a>
                    </li>
                    

                    @elseif(auth()->user()->role === 'user')
                    <!-- Book Owner Specific Links -->
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>My Books</p>
                        </a>
                    </li>
                @endif

                <!-- Common Links -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

            <style>
                .nav-item.active .nav-link {
                    background-color: blue;
                    color: white;
                }
            </style>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
