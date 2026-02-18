<?php get_header(); 
echo '<h1 class="xeo">'.$oketheme['nama_web'].' | '.$oketheme['slogan_web'].'</h1>';

if(is_array($oketheme['htop'])) {
    foreach ($oketheme['htop'] as $key => $subkey) {
        if (isset($subkey['act']) && $subkey['act']) {
            switch ($key) {
                case 'head_blog': head_blog();
                break;
                case 'feat_blog': featured_blog();
                break;
                case 'feat_cat': featured_cat();
                break;
            }
        }
    }
} ?>

<section id="content" class="two-column _home">
    <div class="_col1 flexcon column gap-20">
        <?php 
        ads_content_top(); // Ads Content #Top
        if(is_array($oketheme['hbot'])) {
            foreach ($oketheme['hbot'] as $key => $subkey) {
                if (isset($subkey['act']) && $subkey['act']) {
                    switch ($key) {
                        case 'latest_blog': latest_blog();
                        break;
                        case 'feat_cat': featured_cat2();
                        break;
                        case 'recom_blog': recommended_blog();
                        break;
                        case 'latest_epaper': latest_epaper();
                        break;
                        case 'video_blog': video_blog();
                        break;
                        case 'photo_blog': photo_blog();
                        break;
                    }
                }
            }
        } 
        ads_content_bot(); // Ads Content #Bottom
        ?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>

<?php get_footer(); ?>