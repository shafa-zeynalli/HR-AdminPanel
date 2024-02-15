<!DOCTYPE html>
<html lang="en">
@include('Admin.partials.top')
<body class="app sidebar-mini">
<!-- Navbar-->
@include('Admin.partials.header')
<!-- Sidebar menu-->
@include('Admin.partials.sidebar')
<main class="app-content">
    @yield('content')
</main>
<!-- Essential javascripts for application to work-->
@include('Admin.partials.bottom')
</body>
</html>
