<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penunjang Keputusan - WP</title>
    <!-- Shadcn inspired styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/wp.css') }}">
</head>

<body>
    <div class="layout-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h3 class="m-0">SPK - WP</h3>
            </div>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('criterias.*') ? 'active' : '' }}" href="{{ route('criterias.index') }}">
                        <i class="fas fa-list-ul"></i> Kriteria
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('alternatives.*') ? 'active' : '' }}" href="{{ route('alternatives.index') }}">
                        <i class="fas fa-project-diagram"></i> Alternatif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('scores.*') ? 'active' : '' }}" href="{{ route('scores.index') }}">
                        <i class="fas fa-star"></i> Nilai
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('wp.*') ? 'active' : '' }}" href="{{ route('wp.index') }}">
                        <i class="fas fa-calculator"></i> Perhitungan
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main content area -->
        <div class="content-wrapper">
            <div class="top-bar">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Sistem Penunjang Keputusan</h1>
            </div>
            <main class="main-content">
                @yield('content')
            </main>
            <footer>
                <div class="text-center">
                    <p class="mb-0">Sistem Penunjang Keputusan Metode Weighted Product © {{ date('Y') }}</p>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth < 992 && 
                sidebar.classList.contains('show') && 
                !sidebar.contains(event.target) && 
                !sidebarToggle.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
