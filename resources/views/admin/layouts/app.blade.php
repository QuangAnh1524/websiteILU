<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.admin-headSection')
</head>
<body>
<div id="app">
    @include('admin.layouts.admin-sidebar')
    <div id="main">
        @include('admin.layouts.admin-header')
        @yield('content')
        @include('admin.layouts.admin-footer')
    </div>
</div>
@include('admin.layouts.admin-scrips')
</body>
</html>
