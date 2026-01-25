<div class="sidebar-wrapper">
    <nav class="mt-2">
        <!-- Sidebar Menu -->
        <ul
            class="nav sidebar-menu flex-column"
            data-lte-toggle="treeview"
            role="navigation"
            aria-label="Main navigation"
            data-accordion="false"
            id="navigation"
        >
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Employees Section -->
            <li class="nav-header">EMPLOYEES</li>

            <li class="nav-item">
                <a href="{{ route('employee.create') }}" class="nav-link">
                    <i class="nav-icon bi bi-person-plus-fill"></i>
                    <p>Add</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('employee.list') }}" class="nav-link">
                    <i class="nav-icon bi bi-people-fill"></i>
                    <p>List</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('employee.import.show') }}" class="nav-link">
                    <i class="nav-icon bi bi-file-arrow-up"></i>
                    <p>Import</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('employee.export.show') }}" class="nav-link">
                    <i class="nav-icon bi bi-file-arrow-down"></i>
                    <p>Export</p>
                </a>
            </li>

            <!-- Invoices Section -->
            <li class="nav-header">INVOICES</li>

            <li class="nav-item">
                <a href="{{ route('customer.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-receipt"></i>
                    <p>All Invoices</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-plus-square"></i>
                    <p>All Statement</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('customer.create') }}" class="nav-link">
                    <i class="nav-icon bi bi-person-plus"></i>
                    <p>Create Customer</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-file-plus"></i>
                    <p>Create Invoice</p>
                </a>
            </li>


        </ul>
    </nav>
</div>
