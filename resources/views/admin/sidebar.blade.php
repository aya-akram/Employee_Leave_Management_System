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
        <a class="nav-link collapsed" href="{{route('admin.dashboard')}}" data-toggle="collapse" data-target="#h"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>Dashborad</span>
        </a>
        <div id="h" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.dashboard')}}" >Admin dashboard</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.employees')}}" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>Employee Section</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.employees')}}" >All Employees</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.department')}}" data-toggle="collapse" data-target="#collapseCategoryy"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>Department Section</span>
        </a>
        <div id="collapseCategoryy" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.department')}}" >All Department</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.leaveSaction')}}" data-toggle="collapse" data-target="#c"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>Leave Types</span>
        </a>
        <div id="c" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.leaveSaction')}}" >Leave</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.leaveSaction')}}" data-toggle="collapse" data-target="#e"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-tags"></i>
            <span>Manage Leave</span>
        </a>
        <div id="e" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.pendingLeaves')}}" >Pending</a>
            </div>
        </div>
        <div id="e" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.approvedLeaves')}}" >Approved</a>
            </div>
        </div>
        <div id="e" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.declinedLeaves')}}" >Declined</a>
            </div>
        </div>
 
    </li>





        </ul>

