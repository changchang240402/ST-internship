        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('mainPage') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ClassMethod</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Employees -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Employees</span></a>
            </li>
            <!-- Nav Item - Customers -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Customers</span></a>
            </li>
            <!-- Nav Item - Categories -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Categories</span></a>
            </li>
            <!-- Nav Item - Suppliers -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('suppliers.index') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Suppliers</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->
