<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="asset/dist/img/avatar.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{auth::user()->name}}</p>
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">       
            <li class="treeview">
              <a href="{{route('home')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>     
            <li class="treeview">
              <a href="{{route('index')}}">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('state')}}">
                <i class="fa fa-globe" aria-hidden="true"></i> <span>State</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('district')}}">
                <i class="fa fa-map-o" aria-hidden="true"></i> <span>District</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="{{route('location')}}">
                <i class="fa fa-map-marker" aria-hidden="true"></i> <span>Location</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <aside class="control-sidebar control-sidebar-dark">                
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">              
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
         <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">            
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">                         
              </div><!-- /.form-group -->
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>                
              </div><!-- /.form-group -->
              <!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->