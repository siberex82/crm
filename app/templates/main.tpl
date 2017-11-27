<!DOCTYPE HTML>
<html lang="ru">
	<head>
		<title>{title}</title>
        
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        

		
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        
         <link rel="stylesheet" href="/css/ionicons.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="/css/AdminLTE.css">
          <!-- AdminLTE Skins. Choose a skin from the css/skins
               folder instead of downloading all of them to reduce the load. -->
          <link rel="stylesheet" href="/css/skins/skin-blue.min.css">
          <!-- iCheck -->
          <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
          <!-- Morris chart -->
          <link rel="stylesheet" href="/plugins/morris/morris.css">
          <!-- jvectormap -->
          <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
          <!-- Date Picker -->
          <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
          <link rel="stylesheet" type="text/css" href="/css/jquery-ui.theme.css">
          <!-- bootstrap wysihtml5 - text editor -->
          <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
          
          <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
  
        <link rel="stylesheet" type="text/css" href="/css/main.css" />
	</head>
    
    
    
	<body class="hold-transition skin-blue sidebar-mini"> 
   {hide-nologin}
   <header class="main-header">
               
            <div id="message">{alert}</div> 
            <!-- Logo -->
            <a href="#" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini">CRM</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><img src="/images/radnuk-logo.png" height="40" alt=""/></span>
            </a>
            
            
            
            
            
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
        
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->
                
                  <li class="dropdown messages-menu">
                    <a href="{host}/messages/" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-envelope-o"></i>
                      <span class="label label-warning">{menu_count_message}</span>
                    </a>
                  </li>
                  
                  
                  <!-- Notifications: style can be found in dropdown.less 
                  <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">10</span>
                    </a>
                  </li> -->
                  <!-- Tasks: style can be found in dropdown.less 
                  <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-flag-o"></i>
                      <span class="label label-danger">9</span>
                    </a>
                  </li>-->
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="/images/user2-160x160.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs">{username}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">
        
                        <p>
                          <a href="mailto:tropic.r@gmail.com">{username}</a>
                          <small>2016</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                    
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Мой	профиль</a>
                        </div>
                        <div class="pull-right">
                          <a href="#" class="btn btn-default btn-flat">Выйти</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <!-- Control Sidebar Toggle Button -->
                
                </ul>
              </div>
            </nav>
    </header>
    {/hide-nologin}
  

  <!-- Left side column. contains the logo and sidebar -->
  {hide-nologin}
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           
          <img src="/images/user2-160x160.jpg" class="img-circle" alt="User Image">
          
        </div>
        <div class="pull-left info">
          <p>{username}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">НАВИГАЦИЯ</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Пользователи</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_user}</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{HOST}/usercontrol/useradd/">
              <i class="fa fa-circle-o"></i>
                Добавить 
              </a>
            </li>
            
            <li>
              <a href="{HOST}/usercontrol/userview/">
              <i class="fa fa-circle-o"></i>
                Все пользователи 
              </a>
            </li>
            
          </ul>
        </li>
        
        
        <!--li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li-->
       
      
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-calendar"></i> 
            <span>Задачи</span>
            <span class="pull-right-container">
              <!--span class="label label-primary pull-right">4</span-->
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{HOST}/applications/add/">
            <i class="fa fa-circle-o"></i>Добавить задачу</a>
            </li>
            
            <li>
            <a href="{HOST}/applications/resolution/">
            <i class="fa fa-circle-o"></i>
               Ожидают резолюции
              <span class="pull-right-container">
               <small class="label pull-right bg-yellow">{menu_count_resolution}</small>
              </span>
            </a> 
            </li>
            
            
            <li>
            <a href="{HOST}/applications/worknow/">
            <i class="fa fa-circle-o"></i>
               Все задачи
              <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_allapplications}</span>
              </span>
            </a> 
            </li>
            
            <li>
            <a href="{HOST}/applications/finished/">
            <i class="fa fa-circle-o"></i>
               Завершенные
              <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_finish_applications}</span>
              </span>
            </a> 
            </li>
            
            
            <li>
            <a href="{HOST}/applications/offtimes/">
            <i class="fa fa-circle-o"></i>
               Просроченные
              <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_offtime_applications}</span>
              </span>
            </a> 
            </li>
            
            
            <li>
            <a href="{HOST}/applications/control/">
            <i class="fa fa-circle-o"></i>
               Я контролирую
              <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_control_applications}</span>
              </span>
            </a> 
            </li>
            
            
            <li>
            <a href="{HOST}/applications/execute/">
            <i class="fa fa-circle-o"></i>
               Я исполняю
              <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_execute_applications}</span>
              </span>
            </a> 
            </li>
            
            
            <li>
            <a href="{HOST}/applications/ipuzzle/">
            <i class="fa fa-circle-o"></i>
               Мной поставленные
              <span class="pull-right-container">
              <span class="label label-primary pull-right">{menu_count_ipuzzle_applications}</span>
              </span>
            </a> 
            </li>
            
          </ul>
        </li>
     
       
        <li>
          <a href="{HOST}/messages/">
            <i class="fa fa-envelope"></i> <span>Уведомления</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow countMessage">{menu_count_message}</small>
              <small class="label pull-right bg-green"></small>
              <small class="label pull-right bg-red"></small>
            </span>
          </a>
        </li>
       
       
        <li><a href="{HOST}/note/"><i class="fa fa-book"></i> <span>Напоминания</span></a></li>
        
        <li><a href="{HOST}/settings/"><i class="fa fa-cogs"></i> <span>Настройки</span></a></li>
        <li><a href="{HOST}/main/logout/"><i class="fa fa-sign-out"></i> <span>выйти</span></a></li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  {/hide-nologin}
  
  {hide-nologin}
  <div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRM
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    {/hide-nologin}




    <!-- Main content -->
    <section class="content">
        
        {content}
        
    </section>
    <!-- /.content -->
    
    
    
    
    
  {hide-nologin}  
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2016 <a href="mailto:tropic.r@gmail.com">Tropic</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
   {/hide-nologin}     
       

		<script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <!--script src="/js/npm.js"></script-->
        <script src="/js/jquery-ui.js"></script>     
        <script>
          $.widget.bridge('uibutton', $.ui.button);
		  
		  
		  var messgArr = window.location.search.substr(1);
		  var messg = messgArr.split("=");
		  
		  if(messg && messg !='') {
		  var url = window.location.href.replace('?'+messgArr,'');
		  setTimeout('location.replace(url)', 2000)
		  }
		  
        </script>
        
        <!-- Morris.js charts -->
        <script src="/js/raphael-min.js"></script>
        <script src="/plugins/morris/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        

        <!-- Bootstrap WYSIHTML5 -->
        <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--script src="/js/pages/dashboard.js"></script-->
        <!-- AdminLTE for demo purposes -->
        <script src="/js/demo.js"></script>
        

        <script src="/js/function.js"></script>
	</body>
</html>