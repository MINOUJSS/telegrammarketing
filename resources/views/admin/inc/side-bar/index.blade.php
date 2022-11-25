<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="admins/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>مسح المواقع (Scraping)</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">            
            <li><a href="{{route('admin.url_for_scrap.create')}}">إضافة عنوان للمسح</a></li>
            <li><a href="{{route('admin.url_for_scrap.index')}}">عرض الكل</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span> بوتات التليغرام (Telegram Bots)</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">            
            <li><a href="{{route('admin.telegram_bots.create')}}">إضافة بوت</a></li>
            <li><a href="{{route('admin.telegram_bots.index')}}">عرض الكل</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span> قنوات التليغرام (Telegram channels)</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">            
            <li><a href="{{route('admin.telegram_channels.create')}}">إضافة قنات</a></li>          
            <li><a href="{{route('admin.telegram_channels.index')}}">عرض الكل</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href=""><i class="fa fa-link"></i> <span> مجموعات التليغرام (Telegram Groups)</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">            
            <li><a href="{{route('admin.telegram_groups.create')}}">إضافة مجموعة</a></li>
            <li><a href="{{route('admin.telegram_groups.index')}}">عرض الكل</a></li>
          </ul>
        </li>
        <li class="active"><a href="#"><i class="fa fa-plus"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        
      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>