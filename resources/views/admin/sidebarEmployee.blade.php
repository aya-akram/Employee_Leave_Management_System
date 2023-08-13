<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store"></i>
        </div>Employee Management <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span></span></a>
    </li>
 <!-- Divider -->
 <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.leaveSaction')}}" data-toggle="collapse" data-target="#v"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>Manage Employee</span>
        </a>
        <div id="v" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('employee.leave')}}" >Apply Leave</a>
            </div>
        </div>
        <div id="v" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('employee.leaveHistory')}}" >View My Leave History</a>
            </div>
        </div>
    </li>




        </ul>

