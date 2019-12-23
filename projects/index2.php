<?php
	// controller Codes Begins Here ---
	require_once('../inc/config.php');

	// View Codes - (Header) ---
	$section = "My Work";
	include(ROOT_PATH . 'inc/view/project_header.php');
?>

<div style="max-width: 1200px; width: 97%; margin: 100px auto;">
    <div id="js-filters-juicy-projects" class="cbp-l-filters-buttonCenter">
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
            All <div class="cbp-filter-counter"></div>
        </div>
        <div data-filter=".identity" class="cbp-filter-item">
            Identity <div class="cbp-filter-counter"></div>
        </div>
        <div data-filter=".web-design" class="cbp-filter-item">
            Web Design <div class="cbp-filter-counter"></div>
        </div>
        <div data-filter=".graphic" class="cbp-filter-item">
            Graphic <div class="cbp-filter-counter"></div>
        </div>
        <div data-filter=".logos" class="cbp-filter-item">
            Logo <div class="cbp-filter-counter"></div>
        </div>
    </div>

    <div id="js-grid-juicy-projects" class="cbp">
        <div class="cbp-item graphic">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/ab19cd.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="projects.php" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="<?php echo BASE_URL; ?>img/eb6888.png" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Dashboard</div>
            <div class="cbp-l-grid-projects-desc">Web Design / Graphic</div>
        </div>
        <div class="cbp-item web-design logos">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/af7705.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project2.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="http://scriptpie.com/cubeportfolio/img/?i=1200x900/efc6c0" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="World Clock Widget<br>by Paul Flavius Nechita">view larger</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">World Clock Widget</div>
            <div class="cbp-l-grid-projects-desc">Logo / Web Design</div>
        </div>
        <div class="cbp-item graphic logos">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/308f13.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project3.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="http://vimeo.com/14912890" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="To-Do Dashboard<br>by Tiberiu Neamu">view video</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">To-Do Dashboard</div>
            <div class="cbp-l-grid-projects-desc">Graphic / Logo</div>
        </div>
        <div class="cbp-item web-design graphic">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/2d3e6d.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project4.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/4900333&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Events and  More<br>by Tiberiu Neamu">view sound</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Events and More</div>
            <div class="cbp-l-grid-projects-desc">Web Design / Graphic</div>
        </div>
        <div class="cbp-item identity web-design">
            <div class="cbp-slider-inline">
                <div class="cbp-slider-wrapper">
                    <div class="cbp-slider-item cbp-slider-item--active">
                        <a href="http://scriptpie.com/cubeportfolio/img/?i=1200x900/6eee29" class="cbp-lightbox" data-title="WhereTO App<br>by Tiberiu Neamu">
                            <img src="<?php echo BASE_URL; ?>img/ae557b.png" alt="">
                        </a>
                    </div>
                    <div class="cbp-slider-item">
                        <a href="http://scriptpie.com/cubeportfolio/img/?i=1200x900/f2adde" class="cbp-lightbox" data-title="World Clock Widget<br>by Paul Flavius Nechita">
                            <img src="<?php echo BASE_URL; ?>img/2d3e6d.png" alt="">
                        </a>
                    </div>
                    <div class="cbp-slider-item">
                        <a href="http://scriptpie.com/cubeportfolio/img/?i=1200x900/2ad2f3" class="cbp-lightbox" data-title="World Clock Widget<br>by Paul Flavius Nechita">
                            <img src="<?php echo BASE_URL; ?>img/308f13.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="cbp-slider-controls">
                    <div class="cbp-slider-prev"></div>
                    <div class="cbp-slider-next"></div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">WhereTO App</div>
            <div class="cbp-l-grid-projects-desc">Web Design / Identity</div>
        </div>
        <div class="cbp-item identity web-design">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/b08497.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project6.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="http://scriptpie.com/cubeportfolio/img/?i=1200x900/701d46" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Ski * Buddy<br>by Tiberiu Neamu">view larger</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Ski * Buddy</div>
            <div class="cbp-l-grid-projects-desc">Identity / Web Design</div>
        </div>
        <div class="cbp-item graphic logos">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/308f13.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project7.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="http://scriptpie.com/cubeportfolio/img/?i=audio/e8040a" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Seemple* Music for iPad<br>by Tiberiu Neamu">view sound</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Seemple* Music for iPad</div>
            <div class="cbp-l-grid-projects-desc">Graphic / Logo</div>
        </div>
        <div class="cbp-item identity graphic">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/33cbc1.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project8.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="http://www.youtube.com/watch?v=Bu9OiDmxCrQ" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Remind~Me More<br>by Tiberiu Neamu">view video</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Remind~Me More</div>
            <div class="cbp-l-grid-projects-desc">Identity / Graphic</div>
        </div>
        <div class="cbp-item web-design graphic">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/b4e2cf.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project9.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="https://www.ted.com/talks/andrew_bastawrous_get_your_next_eye_exam_on_a_smartphone" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Workout Buddy<br>by Tiberiu Neamu">view video</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Workout Buddy</div>
            <div class="cbp-l-grid-projects-desc">Web Design / Graphic</div>
        </div>
        <div class="cbp-item identity web-design">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/35fadd.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project10.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="https://www.youtube.com/watch?v=3wbvpOIIBQA" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Bills Bills Bills<br>by Cosmin Capitanu">view video</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Bills Bills Bills</div>
            <div class="cbp-l-grid-projects-desc">Identity / Web Design</div>
        </div>
        <div class="cbp-item identity logos">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/b611ec.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project11.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="http://scriptpie.com/cubeportfolio/img/?i=video/044cd4" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Generic Apps<br>by Cosmin Capitanu">view video</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Generic Apps</div>
            <div class="cbp-l-grid-projects-desc">Identity / Logo</div>
        </div>
        <div class="cbp-item graphic web-design">
            <div class="cbp-caption">
                <div class="cbp-caption-defaultWrap">
                    <img src="<?php echo BASE_URL; ?>img/ee3501.png" alt="">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <a href="ajax-juicy-projects/project12.html" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                            <a href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/26519543&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true" class="cbp-lightbox cbp-l-caption-buttonRight" data-title="Speed Detector<br>by Cosmin Capitanu">view sound</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cbp-l-grid-projects-title">Speed Detector</div>
            <div class="cbp-l-grid-projects-desc">Graphic / Web Design</div>
        </div>

    </div>

    <div id="js-loadMore-juicy-projects" class="cbp-l-loadMore-button">
        <a href="ajax-juicy-projects/loadMore.html" class="cbp-l-loadMore-link" rel="nofollow">
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