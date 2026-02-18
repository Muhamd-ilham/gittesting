<?php ads_fullwidth_bot(); ads_floating()// Ads Fullwidth Bottom & Floating ?>
</section>
<?php global $oketheme; ?>
<section id="footer" class="container flexcon column gap-20">
    <!-- Footer Top -->
    <?php if (is_active_sidebar('footer-left') || is_active_sidebar('footer-mid') || is_active_sidebar('footer-right')) {?>
        <div class="_top flexcon gap-30 justify-between">
            <?php if (is_active_sidebar('footer-left')) { ?>
                <div class="flexcon column gap-20">
                    <?php dynamic_sidebar('footer-left'); ?>
                </div>
            <?php } if (is_active_sidebar('footer-mid')) {?>
                <div class="flexcon column gap-20">
                    <?php dynamic_sidebar('footer-mid'); ?>
                </div>
            <?php } if (is_active_sidebar('footer-right')) {?>
                <div class="flexcon column gap-20">
                    <?php dynamic_sidebar('footer-right'); ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- Footer Bottom -->
    <div class="_bottom flexcon gap-30 row-gap-20 align-center justify-between">
        <?php // Gambar Footer
        if($oketheme['footer_img']) { ?>
            <div class="_gambar" data-customize-partial-id="footer" data-helper-title="Gambar Footer" data-helper-tab="footer">
                <?=$oketheme['footer_img_url']?'<a href="'.$oketheme['footer_img_url'].'">':'';?>
                    <img src="<?=$oketheme['footer_img'];?>" alt="<?=$oketheme['nama_web'];?> footer image" <?=get_wh_img($oketheme['footer_img']);?>>
                <?=$oketheme['footer_img_url']?'</a>':'';?>
            </div>
        <?php } 

        // Menu Footer
        echo '<div class="_menu hscroll" data-helper-title="Menu Footer" data-helper-tab="footer">';
            if($oketheme['botmenu']) { 
                wp_nav_menu(array(
                    'menu' => $oketheme['botmenu'],
                    'container' => '',
                    'menu_class' => '',
                    'fallback_cb' => false
                ));
            } else { ?>
                <ul>
                    <li><a href="<?=get_home_url(); ?>" title="<?php _e('Beranda','oketheme'); ?>"><?php _e('Beranda','oketheme'); ?></a></li>
                    <?php wp_list_pages('title_li&use_desc_for_title=0');?>
                </ul>
            <?php }
        echo '</div>';

        // Social Media
        social_media(); ?>
    </div>
</section>
<section id="copyright" class="flexcon column justify-center nm">
    <h5 data-customize-partial-id="dasar" data-helper-title="Nama & Slogan" data-helper-tab="dasar"><?php echo $oketheme['nama_web'].' - '.$oketheme['slogan_web']; ?></h5>
    <div class="small" data-customize-partial-id="footer" data-helper-title="Copyright" data-helper-tab="footer">
        <?=$oketheme['footer_text']?:copyright();?>
    </div>
</section>
<?php wp_footer(); ?>
</body>
</html>