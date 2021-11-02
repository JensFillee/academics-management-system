<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Academics Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jens Fillée</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= $this->Url->build('/admin', ["fullbase" => true])?>" class="nav-link"> <!-- returns “http://academics_management_system.test/admin” -->
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <!-- Colleges -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Manage Colleges
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/add-college', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add College</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/list-colleges', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Colleges</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Branches -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>
                            Manage Branches
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/add-branch', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Branch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/list-branches', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Branches</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Students -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Manage Students
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/add-student', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/list-students', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Students</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Staff -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage Staff
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/add-staff', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Staff</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/list-staff', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Staff</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Reports -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/colleges-report', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Colleges Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/students-report', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Students Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->Url->build('/admin/staff-report', ["fullbase" => true])?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Staff Report</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
