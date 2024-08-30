<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                </span>
                </div>
                <!-- /input-group -->
             </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('kabupaten.index') }}"><i class="fa fa-dashboard fa-fw"></i> Data
                                Kabupaten</a>
                        </li>
                        <li>
                            <a href="{{ route('kecamatan.index') }}"><i class="fa fa-dashboard fa-fw"></i> Data
                                Kecamatan</a>
                        </li>

        </ul>
    </div>
</div>