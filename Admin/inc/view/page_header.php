        <section class="content-header">
          <h1><?php echo ucwords($section); ?>
            <!-- checking to add 'Add New Blog' -->
          	<?php if ($section == 'all posts') { ?>
          		<a href="<?php echo BASE_URL; ?>Admin/pages/blog/add_post.php"><small><span class="label label-info">Add New</span></small></a>
          	<?php } ?>
            <!-- checking to add 'Add New Product' -->
            <?php if ($section == 'all products') { ?>
              <a href="<?php echo BASE_URL; ?>Admin/pages/product/add_product.php"><small><span class="label label-info">Add New Product</span></small></a>
            <?php } ?>            

          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo BASE_URL; ?>Admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php echo ucwords($section_head); ?></a></li>
            <li class="active"><?php echo $page_title; ?></li>
          </ol>
        </section>