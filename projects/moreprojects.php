<?php
    // controller Codes Begins Here ---
    require_once('../inc/config.php');

    // View Codes - (Header) ---
    $section = "My Work";
    include(ROOT_PATH . 'inc/view/project_header.php');
?>
<div class="cbp-loadMore-block1">
    <!-- get Sites Profile begins -->
    <?php
        $startRow = 12; // 12
        $numRows = 12;  // 12
        $all_sitesprofile = SitesProfile::getSitesProfiles($startRow, $numRows);
        foreach ($all_sitesprofile as $my_sitesprofiles) {
            $categoryname = $my_sitesprofiles->getValueEncoded("categoryid");
            $sitename = $my_sitesprofiles->getValueEncoded("sitename");
            $image1 = $my_sitesprofiles->getValueEncoded("image1");

            // Category Class
            $categorytitle = SiteCategory::getCategoryTitle($categoryname);
    ?>
    <div class="cbp-item <?php echo $categorytitle->getValueEncoded("alias"); ?>">
        <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
                <img src="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $image1; ?>" alt="<?php echo $sitename; ?>">
            </div>
            <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                            <a href="<?php echo BASE_URL; ?>projects/projects.php?skd=<?php echo $sitename; ?>" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_1200_900 . $image1; ?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?php echo $sitename; ?><br>by Adebayo Peter Olaonipekun">view larger</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cbp-l-grid-projects-title"><?php echo $sitename; ?></div>
        <div class="cbp-l-grid-projects-desc"><?php echo $categorytitle->getValueEncoded("title"); ?></div>
    </div>
    <?php }  // end of foreach loop ?>
    <!--  // get Sites Profile ends -->  
</div>

<div class="cbp-loadMore-block2">
    <!-- get Sites Profile begins -->
    <?php
        $rStartRow = 24; // 24
        $rNumRows = 100; // 100
        $rsitesprofile = SitesProfile::getSitesProfiles($rStartRow, $rNumRows);
        foreach ($rsitesprofile as $my_rSitesprofiles) {
            $rCategoryname = $my_rSitesprofiles->getValueEncoded("categoryid");
            $rSitename = $my_rSitesprofiles->getValueEncoded("sitename");
            $rimage1 = $my_rSitesprofiles->getValueEncoded("image1");

            // Category Class
            $rCategorytitle = SiteCategory::getCategoryTitle($rCategoryname);
        ?>
    <div class="cbp-item <?php echo $rCategorytitle->getValueEncoded("alias"); ?>">
        <div class="cbp-caption">
            <div class="cbp-caption-defaultWrap">
                <img src="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_380_250 . $image1; ?>" alt="<?php echo $rSitename; ?>">
            </div>
            <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                    <div class="cbp-l-caption-body">
                        <a href="<?php echo BASE_URL; ?>projects/projects.php?skd=<?php echo $rSitename; ?>" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                        <a href="<?php echo BASE_URL . DOC_UPLOADPATH_SITE_PROFILE_1200_900 . $rimage1; ?>" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="<?php echo $rSitename; ?><br>by Adebayo Peter Olaonipekun">view larger</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cbp-l-grid-projects-title"><?php echo $rSitename; ?></div>
        <div class="cbp-l-grid-projects-desc"><?php echo $rCategorytitle->getValueEncoded("title"); ?></div>
    </div>
    <?php }  // end of foreach loop ?>
    <!--  // get Sites Profile ends --> 
</div>
