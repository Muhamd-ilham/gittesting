<?php get_header(); ?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20">
            <?php oke_crumb(); ads_content_top();?>
            

            <?php // Deskripsi Arsip
            if(category_description()){
                echo category_description();
            } else if(is_author()) {
                if(get_the_author_meta('description')) {
                    echo '<div class="author"><img src="'.get_avatar_url (get_the_author_meta('user_email')).'">'.get_the_author_meta('description').'</div>';
                }
            } else if (is_post_type_archive($oketheme['epaper']['slug']??'epaper')) {
                echo '<div class="_desc" data-customize-partial-id="epaper" data-helper-title="Deskripsi ePaper" data-helper-tab="extra/epaper">'.$oketheme['epaper']['archive_desc'].'</div>';
            }
            
            // Loop Content
            if (have_posts()) {
                if (is_post_type_archive($oketheme['epaper']['slug']??'epaper')) {
                    echo '<div class="grid three-col _res">';
                        while (have_posts()) {
                            the_post();
                            loop('regular', '_epaper');
                        }
                    echo '</div>';
                } else {
                    echo '<div class="archive list _res">';
                        while (have_posts()) {
                            the_post();
                            loop('regular');
                        }
                    echo '</div>';
                }
                oke_pagination();
            } else { ?>
                <div class="wrap-post">
                    <h2>
                        <?php _e('Maaf, saat ini belum tersedia post untuk ditampilkan.', 'oketheme');?>
                    </h2>
                    <p><a href="<?=home_url();?>">&laquo; <?=__('kembali ke Beranda', 'oketheme');?></a> <?=__('atau silahkan gunakan kolom pencarian dibawah ini.', 'oketheme');?></p>
                    <form method="get" action="<?php echo home_url(); ?>" role="search">
                        <input type="search" name="s" placeholder="<?=__('Kata Pencarian', 'oketheme');?>">
                        <button type="submit" role="button"><?=__('Mencari', 'oketheme');?></button>
                    </form>
                </div>
            <?php } ?>
        </div>
        <?php if (!have_posts()) { random_blog();} ads_content_bot();?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php get_footer(); ?>