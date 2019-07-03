<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/avatar.png') }}" class="img-bordered-sm" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{!! Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name !!}</p>
                <span class="text-danger"> Online</span>
            </div>
        </div>
        <!-- search form -->
   <!--  @include('partials.contents.search', ['key' => 'nodes'])-->


    <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{!! route('reactor.dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li>

            <!-- sidebar menu: : Site -->
            {!!  (isset($admin_menu) ? $admin_emnu : '')  !!}

        </ul>


        <!-- sidebar menu: : Packages -->
        <ul class="sidebar-menu" data-widget="tree">


        </ul>


        <!-- sidebar menu: : Packages -->
        <hr class="divider">
        <ul class="sidebar-menu" data-widget="tree">


            <li class="">
                <a href="{!! route('reactor.roomtype.index') !!}">
                    <i class="fa fa-bed"></i> <span>Room Management</span>
                </a>
            </li>
        </ul>

         <ul class="sidebar-menu" data-widget="tree">


            <li class="">
                <a href="{!! route('reactor.booking.index') !!}">
                    <i class="fa fa-bed"></i> <span>Booking History</span>
                </a>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">


            <li class="">
                <a href="{!! route('reactor.booking.room') !!}">
                    <i class="fa fa-bed"></i> <span>Book Room</span>
                </a>
            </li>
        </ul>


        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{!! route('reactor.transaction.index') !!}">
                    <i class="fa fa-rupee"></i> <span>Transactions</span>
                </a>
            </li>
        </ul>

        <hr class="divider">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{!! route("reactor.blogs.index") !!}">
                    <i class="fa fa-edit"></i> <span>Blogs</span>
                </a>
            </li>
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{!! route("reactor.pages.index") !!}">
                    <i class="fa fa-edit"></i> <span>Pages</span>
                </a>
            </li>
        </ul>

        <hr class="divider">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href="{!! route("reactor.travelpackage.index") !!}">
                    <i class="fa fa-cab"></i> <span>Travel Package</span>
                </a>
            </li>
        </ul>



    <!--

        <hr class="divider">

        <!--
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">REACTOR MANAGEMENT</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-code-fork"></i> <span>Nodes</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{!! route('reactor.nodes.index') !!}"><i class="fa fa-circle-o"></i> Nodes</a></li>
                    <li class="active"><a href="{!! route('reactor.nodetypes.index') !!}"><i class="fa fa-circle-o"></i>
                            Node Type</a></li>
                </ul>
            </li>
        </ul>
    -->

        <!--
        <ul class="sidebar-menu" data-widget="tree">

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i> <span>Tags Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{!! route('reactor.tags.index') !!}"><i class="fa fa-circle-o"></i> Manage Tags</a>
                    </li>
                    <li class="active"><a href="{!! route('reactor.tags.create') !!}"><i class="fa fa-circle-o"></i>
                            Create Tag</a></li>
                </ul>
            </li>
        </ul>
        -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Access Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{!! route('reactor.users.index') !!}"><i class="fa fa-circle-o"></i> Manage Users</a>
                    </li>

                    <!--
                    <li class="active"><a href="{!! route('reactor.users.create') !!}"><i class="fa fa-circle-o"></i>
                            Create User</a></li>
                    <li class="active"><a href="{!! route('reactor.roles.index') !!}"><i class="fa fa-circle-o"></i>
                            Manage Roles</a></li>
                    <li class="active"><a href="{!! route('reactor.permissions.index') !!}"><i
                                    class="fa fa-circle-o"></i>
                            Manage Permissions</a></li>
                    -->        
                </ul>
            </li>
        </ul>


        <!-- 
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Maintanence</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{!! route('reactor.maintenance.index') !!}"><i class="fa fa-circle-o"></i> Maintain
                            Reactor</a></li>

                </ul>
            </li>
        </ul>
        
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Configuration</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="{!! route('reactor.settings') !!}"><i class="fa fa-circle-o"></i> Web Settings
                        </a></li>

                </ul>
            </li>
        </ul>
    -->
    </section>
    <!-- /.sidebar -->
</aside>
