<?php get_header();?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20">
            <?php oke_crumb(); ads_content_top();?>
            <h1><?php _e('Pencarian','oketheme'); ?></h1>
            <p><?php echo sprintf( __( '%s hasil pencarian dengan kata kunci:', 'oketheme' ), $wp_query->found_posts ).' <u>'.get_search_query().'</u>'; ?></p>
            <?php if (have_posts()) {
                echo '<div class="archive list _res">';
                    while (have_posts()) {
                        the_post(); loop('regular');
                    }
                echo '</div>';
                oke_pagination();
            } else { ?>
                <div class="wrap-post">
                    <h2>
                        <?php _e('Maaf, tidak ada hasil untuk ditampilkan.', 'oketheme');?>
                    </h2>
                    <p><a href="<?=home_url();?>">&laquo; <?=__('kembali ke Beranda', 'oketheme');?></a> <?=__('atau silahkan gunakan kolom pencarian dibawah ini.', 'oketheme');?></p>
                    <form method="get" action="<?php echo home_url(); ?>" role="search">
                        <input type="search" name="s" placeholder="<?=__('Kata Pencarian', 'oketheme');?>">
                        <button type="submit" role="button"><?=__('Mencari', 'oketheme');?></button>
                    </form>
                </div>
            <?php } ?>
        </div>
        <?php if (!have_posts()) { random_blog();} ads_content_bot(); ?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php get_footer(); ?>