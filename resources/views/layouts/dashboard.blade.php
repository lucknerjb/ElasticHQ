<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie ie6 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="ie ie7 lt-ie9 lt-ie8"        lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="ie ie8 lt-ie9"               lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="ie ie9"                      lang="en"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-ie">
<!--<![endif]-->

<head>
   <!-- Meta-->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">
   <title>BeAdmin - Bootstrap Admin Theme</title>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->

   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,400italic">
   <link rel="stylesheet" href="/assets/css/dashboard.css">
   <script src="/assets/js/dashboard_top.js" type="application/javascript"></script>
</head>

<body>
   <!-- START Main wrapper-->
   <div class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
               <div class="brand-logo">
                  <h3 style="margin-top:5px;">{!! $currentAccount->name !!}</h3>
               </div>
               <div class="brand-logo-collapsed">
                  <h3 style="margin-top:5px;">{!! $currentAccount->name !!}</h3>
               </div>
            </a>
         </div>
         <!-- END navbar header-->
         <!-- START Nav wrapper-->
         <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
               <li>
                  <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                  <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
                  <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                  <a href="#" data-toggle-state="aside-toggled" class="visible-xs">
                     <em class="fa fa-navicon"></em>
                  </a>
               </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
               <li>
                  {!! Form::open(['url' => '/clusters/select-cluster', 'id' => 'select-cluster-form']) !!}
                  <select id="select-cluster" name="cluster_id" class="form-control" style="margin-top: 10px;">
                     <option value="">Select a cluster</option>
                     @foreach ($accountClusters as $cluster)
                        <?php
                           $selected = '';
                           if ($currentCluster && $currentCluster['id'] === $cluster->id) {
                              $selected = ' selected="selected';
                           }
                        ?>
                        <option value="{!! $cluster->id !!}" {!! $selected !!}>{!! $cluster->name !!}</option>
                     @endforeach
                  </select>
                  {!! Form::close() !!}
               </li>
            </ul>
            <!-- END Left navbar-->
         </div>
         <!-- END Nav wrapper-->
      </nav>
      <!-- END Top Navbar-->
      <!-- START aside-->
      <aside class="aside">
         <!-- START Sidebar (left)-->
         <nav class="sidebar">
            <!-- START user info-->
            <div class="item user-block" style="display:block;">
               <!-- User picture-->
               <div class="user-block-picture">
                  <div class="user-block-status">
                     <img src="/assets/img/dashboard/user/02.jpg" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle">
                     <div class="circle circle-success circle-lg"></div>
                  </div>
                  <!-- Status when collapsed-->
               </div>
               <!-- Name and Role-->
               <div class="user-block-info">
                  <span class="user-block-name item-text">Welcome</span>
                  <span class="user-block-role">{!! $currentUser->name !!}</span>
               </div>
            </div>
            <!-- END user info-->
            <ul class="nav">
               <!-- START Menu-->
               <li class="nav-heading">Main navigation</li>
               <li class="active">
                  <a href="/dashboard" title="Dashboard" data-toggle="" class="no-submenu">
                     <em class="fa fa-dot-circle-o"></em>
                     <div class="label label-primary pull-right">10</div>
                     <span class="item-text">Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="#" title="REST" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-flask"></em>
                     <span class="item-text">REST</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="/rest/custom-query" title="Custom Query" data-toggle="" class="no-submenu">
                           <span class="item-text">Custom Query</span>
                        </a>
                     </li>
                     <li>
                        <a href="/rest/raw-api" title="Raw API" data-toggle="" class="no-submenu">
                           <span class="item-text">Raw API</span>
                        </a>
                     </li>
                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <li>
                  <a href="/clusters" title="Clusters" data-toggle="" class="no-submenu">
                     <em class="fa fa-cube"></em>
                     <span class="item-text">Clusters</span>
                  </a>
               </li>
               @if ($currentCluster)
                  <li>
                     <a href="/indices" title="Indices" data-toggle="" class="no-submenu">
                        <em class="fa fa-cube"></em>
                        <span class="item-text">Indices</span>
                     </a>
                  </li>
               @endif
               <li>
                  <a href="/explore" title="Explore" data-toggle="" class="no-submenu">
                     <em class="fa fa-cube"></em>
                     <span class="item-text">Explore</span>
                  </a>
               </li>
               <li class="hide">
                  <a href="/stats" title="Stats" data-toggle="" class="no-submenu">
                     <em class="fa fa-cube"></em>
                     <span class="item-text">Stats</span>
                  </a>
               </li>
               <li>
                  <a href="/settings" title="Settings" data-toggle="" class="no-submenu">
                     <em class="fa fa-cube"></em>
                     <span class="item-text">Settings</span>
                  </a>
               </li>
               <li>
                  <a href="/settings" title="Settings" data-toggle="" class="no-submenu">
                     <em class="fa fa-cube"></em>
                     <span class="item-text">Roles</span>
                  </a>
               </li>
               <li>
                  <a href="/settings" title="Settings" data-toggle="" class="no-submenu">
                     <em class="fa fa-cube"></em>
                     <span class="item-text">Permissions</span>
                  </a>
               </li>
               <!-- END Menu-->
            </ul>
         </nav>
         <!-- END Sidebar (left)-->
      </aside>
      <!-- End aside-->
      <!-- START Main section-->
      <section>
         <!-- START Page content-->
         @yield('content')
         <!-- END Page content-->
      </section>
      <!-- END Main section-->
   </div>
   <!-- END Main wrapper-->

   <script src="/assets/js/dashboard.js" type="application/javascript"></script>
</body>

</html>
