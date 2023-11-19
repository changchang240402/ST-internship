<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.head')
</head>

<body>
    <div class="container-scroller">
        @include('admin.includes.topbar')
        @include('admin.includes.sidebar')
        @yield('content')
    </div>
    @include('admin.includes.footer')

    </div>
    </div>
    </div>

    @include('admin.includes.scripts')

    @yield('scripts')
</body>

</html>
