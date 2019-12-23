      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo BASE_URL; ?>Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $fullname; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($section_head == 'home_main') { echo 'active'; }?>">
              <a href="<?php echo BASE_URL; ?>Admin/index.php">
                <span class="glyphicon glyphicon-dashboard"></span></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="<?php if ($section_head == 'app') { echo 'active'; }?> treeview">
              <a href="#">
                <span class="glyphicon glyphicon-hdd"></span>
                <span>App Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($section == 'all app') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/app/index.php"> All Sites</a></li>
                <li class="<?php if ($section == 'apps') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/app/add_post.php"> Add New App</a></li>
                <li class="<?php if ($section == 'categories') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/app/categories.php"> Categories</a></li>
              </ul>
            </li>            
            <li class="<?php if ($section_head == 'blog') { echo 'active'; }?> treeview">
              <a href="#">
                <span class="glyphicon glyphicon-pushpin"></span>
                <span>Blog Post</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($section == 'all posts') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/blog/index.php"> All Posts</a></li>
                <li class="<?php if ($section == 'posts') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/blog/add_post.php"> Add New Post</a></li>
                <li class="<?php if ($section == 'categories') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/blog/categories.php"> Categories</a></li>
              </ul>
            </li>
            <li class="<?php if ($section_head == 'blog images') { echo 'active'; }?>">
              <a href="<?php echo BASE_URL; ?>Admin/pages/blog_images.php">
                <span class="glyphicon glyphicon-picture"></span></i> <span>Blog Library</span>
              </a>
            </li>
            <li class="<?php if ($section_head == 'product') { echo 'active'; }?> treeview">
              <a href="#">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($section == 'all products') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/product/index.php"> Products</a></li>
                <li class="<?php if ($section == 'add product') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/product/add_product.php"> Add New Product</a></li>
                <li  class="<?php if ($section == 'category products') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/product/categories.php"> Categories</a></li>
                <li  class="<?php if ($section == 'product choice') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/product/product_choice.php"> Product Choice</a></li>                   
                <li  class="<?php if ($section == 'product gallery') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/product/product_img.php"> Product Gallery</a></li>                 
              </ul>
            </li>
            <li class="<?php if ($section_head == 'about us') { echo 'active'; }?>">
              <a href="<?php echo BASE_URL; ?>Admin/pages/aboutus.php">
                <span class="glyphicon glyphicon-tower"></span> <span> About Us</span>
              </a>
            </li>            
            <li class="<?php if ($section_head == 'social media') { echo 'active'; }?>">
              <a href="<?php echo BASE_URL; ?>Admin/pages/social_media.php">
                <span class="glyphicon glyphicon-bullhorn"></span> <span> Social Media</span>
              </a>
            </li>
            <li class="<?php if ($section_head == 'users') { echo 'active'; }?> treeview">
              <a href="#">
                <span class="glyphicon glyphicon-user"></span>
                <span>Users Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($section == 'all users') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/users/"> All Users</a></li>
                <!--
                <li class="<?php if ($section == 'add users') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/users/"> Add New</a></li>
                -->
                <!--
                <li class="<?php if ($section == 'edit users') { echo 'active'; }?>">
                  <a href="<?php echo BASE_URL; ?>Admin/pages/users/edituser.php?sdk=<?php echo $userdetails['id'] . 'usd=' . $userdetails['usecode']; ?>"> 
                  Edit Your Profile</a></li>
                -->
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>