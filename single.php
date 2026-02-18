<?php global $oketheme; get_header(); while (have_posts()) : the_post(); setPostViews(get_the_ID());?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20" id="printArea">
            <?php oke_crumb(); ads_content_top();?>
            <div class="_category">
                <?php the_category(' '); ?>
            </div>
            <h1 data-helper-title="Judul" data-helper-link="<?=admin_url('post.php?post='.get_the_ID().'&action=edit');?>"><?php the_title(); ?></h1>

            <?php if(!empty($oketheme['single_detail'])) { ?>
                <ul class="_detail flexcon wrap col-gap-20 row-gap-10 nolist" data-customize-partial-id="single" data-helper-title="Detail Post: Single" data-helper-tab="single-post">
                    <?php if (in_array("author", $oketheme['single_detail'])) { ?>
                        <li><i class="m-icon">account_circle</i> <?=rwmb_meta($oketheme['post_meta_writer'])?: get_the_author(); ?></li>
                    <?php } if (in_array("date", $oketheme['single_detail'])) { ?>
                        <li><i class="m-icon">calendar_month</i> <?php the_post_time(); ?></li>
                    <?php } if (in_array("views", $oketheme['single_detail'])) { ?>
                        <li><i class="m-icon">visibility</i> <?php echo getPostViews(get_the_ID()); ?></li>
                    <?php } if (in_array("comments", $oketheme['single_detail'])) { ?>
                        <li><i class="m-icon">comment</i> <a href="#komentar"><?php echo get_comments_number().' '; _e('komentar','oketheme'); ?></a></li>
                    <?php } ?>
                    <li><i class="m-icon">print</i> <a href="#print" id="printBttn"><?php _e('Cetak','oketheme'); ?></a></li>
                </ul>
            <?php } 
            
            shareit();
            
            if(has_post_thumbnail() && $oketheme['featured_single_act'] && !rwmb_meta($oketheme['post_meta_featured'])) {
                echo '<div class="_featured relative ofc" data-helper-title="Featured Image" data-helper-link="'.admin_url('post.php?post='.get_the_ID().'&action=edit#postimagediv').'">';
                    the_post_thumbnail();
                echo '</div>';
                the_caption_thumbnail();
            }
            
            if(get_the_content()) { 
                if($oketheme['font_control_act']) {
                    echo '<div class="_font-size flexcon gap-10 align-center info" data-customize-partial-id="single" data-helper-title="Kontrol Font" data-helper-tab="single-post">
                        <p class="medium nm flexcon align-center gap-5">
                            <i class="m-icon">info</i> '.__('Atur ukuran teks artikel ini untuk mendapatkan pengalaman membaca terbaik.','oketheme').'
                        </p>
                        <div class="_control flexcon">
                            <a id="font-decrease" class="m-icon">text_decrease</a>
                            <a id="font-increase" class="m-icon">text_increase</a>
                        </div>
                    </div>';
                }
                echo '<div class="wrap-post _artikel" data-helper-title="Konten" data-helper-link="'.admin_url('post.php?post='.get_the_ID().'&action=edit#wp-content-wrap').'">';
                    the_content(); 
                echo '</div>';
                related_content(); 
            }

            wp_link_pages(array(
                'before' => '<div class="page-links">'.__('Halaman', 'oketheme'),
                'after'  => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));

            the_gallery();

            if (rwmb_get_value($oketheme['post_meta_video']) != '') {
                echo '<div class="_video">'.rwmb_meta($oketheme['post_meta_video']).'</div>';
            }

            the_tags('<div class="tags"><b>Tags</b>','','</div>');
            edit_post_link('<span class="underlink flexcon inline gap-5 align-center"><i class="m-icon">edit</i>'.__('Sunting','oketheme').'</span>');
            
            the_info();?>
        </div>

        <?php 
        ads_content_bot(); 
        related_blog(); 
        comments_template('/komentar.php'); 
        random_blog(); 
        ?>
        
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php endwhile; get_footer(); ?>