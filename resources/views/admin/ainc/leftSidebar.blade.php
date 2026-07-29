<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{Route('admin-dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{'storage/uploads/user_images/'.Auth::user()->user_image}}" class="img-circle profile_img" alt="image">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{Auth::user()->name}}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a href="{{Route('admin-dashboard')}}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a></li>
          <li><a href="{{url('image-slide')}}"><i class="fa fa-arrows-h"></i> Slides <span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('admin-post')}}"><i class="fa fa-pencil-square-o"></i> Posts <span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('manage-video')}}"><i class="fa fa-file-movie-o"></i> Video Library <span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('manage-picture')}}"><i class="fa fa-image"></i> Manage Picture<span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('admin-anouncement')}}"><i class="fa fa-bullhorn"></i> Special Anouncement <span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('minister-description')}}"><i class="fa fa-comment"></i> Minister Description <span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('about-us')}}"><i class="fa fa-comment"></i> About Us<span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('manage-leader')}}"><i class="fa fa-comment"></i> Manage Leaders<span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('manage-department')}}"><i class="fa fa-institution"></i> Manage Service Department<span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{url('manage-document')}}"><i class="fa fa-folder-open-o"></i> Manage Documents<span class="fa fa-chevron-right"></span></a></li>
          <li><a href="{{Route('user_view')}}"><i class="fa fa-users"></i> User <span class="fa fa-chevron-right"></span></a></li>
        </ul>
      </div>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>