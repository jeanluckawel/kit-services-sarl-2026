
<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                </a>
            </li><li class="nav-header">EMPLOYEES</li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>
                        Employees
                        <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">


                    <li class="nav-item">
                        <a href="{{ route('employee.list') }}" class="nav-link">
                            <i class="nav-icon bi bi-list-ul"></i>
                            <p>Employee List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('employee.create') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-plus-fill"></i>
                            <p>Add Employee</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-search"></i>
                            <p>Search Employee</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-text"></i>
                            <p>Contracts</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-cash-stack"></i>
                            <p>Salaries</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-diagram-3-fill"></i>
                            <p>Dependants</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-telephone-fill"></i>
                            <p>Emergency Contacts</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-bar-chart-fill"></i>
                            <p>Reports</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-header">EXAMPLES</li>
        </ul>

    </nav>
</div>
