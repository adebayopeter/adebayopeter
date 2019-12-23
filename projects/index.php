<?php
	// controller Codes Begins Here ---
	require_once('../inc/config.php');

	// View Codes - (Header) ---
	$section = "My Work";
	include(ROOT_PATH . 'inc/view/project_header.php');
?>

<div style="max-width: 1200px; width: 97%; margin: 100px auto;">
    <!-- Category Titles Begins -->
    <div id="js-filters-juicy-projects" class="cbp-l-filters-buttonCenter">
        <!-- For ALL CATEGORY Begins -->
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
            All Projects <div class="cbp-filter-counter"></div>
        </div>
        <!-- For ALL CATEGORY Ends -->

        <?php // Show Other individual Categories
            $all_category = SiteCategory::getCategories();
            foreach ($all_category as $my_category) {
                $categoryalias = $my_category->getValueEncoded("alias");
                $category_name = $my_category->getValueEncoded("title");
        ?>
        <div data-filter=".<?php echo $categoryalias; ?>" class="cbp-filter-item">
            <?php echo $category_name; ?> <div class="cbp-filter-counter"></div>
        </div>        
        <?php } // end of forech loop ?>
    </div>
    <!-- Category Titles Ends -->
    
    <!-- All Site Project Begins here -->
    <div id="js-grid-juicy-projects" class="cbp">
        <!-- get Sites Profile begins -->
        <?php
            $startRow = 0;
            $numRows = 12; // 12
            $all_sitesprofile = SitesProfile::getSitesProfiles($startRow, $numRows);
            foreach ($all_sitesprofile as $my_sitesprofiles) {
                $categoryname = $my_sitesprofiles->getValueEncoded("categoryid");
                $sitename = $my_sitesprofiles->getValueEncoded("sitename");
                $image1 = $my_sitesprofiles->getValueEncoded("image1");

                // Category Class
                $categorytitle = SiteCategory::getCategoryTitle($categoryname);

        ?>
        <div class="cbp-item <?php echo $categorytitle->getValueEncoded("alias"); ?>">
            <div class="cbp-caption" style="border: 1px solid rgba(36, 59, 123, 0.07);">
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

    <div id="js-loadMore-juicy-projects" class="cbp-l-loadMore-button">
        <a href="moreprojects.php" class="cbp-l-loadMore-link" rel="nofollow">
            <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
            <span class="cbp-l-loadMore-loadingText">LOADING...</span>
            <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
        </a>
    </div>
</div>

<?php
	// View Codes - (Header) ---
	include(ROOT_PATH . 'inc/view/footer.php');
?>
	</body>
</html>