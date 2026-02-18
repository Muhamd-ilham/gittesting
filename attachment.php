<?php get_header(); while (have_posts()) : the_post(); ?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20">
            <?php oke_crumb(); ads_content_top();?>
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>   
            <ul class="_detail flexcon gap-20 nolist">
                <li class="flexcon align-center gap-5"><?php echo __('Diupload pada','oketheme').': '; the_post_time(); ?></li>
            </ul> 
            <div class="wrap-post">
                <?php echo '<img src="'.img_url(get_the_ID()).'">'; ?>
            </div>
            <?php if(get_the_content()) { ?>
                <div class="wrap-post">
                    <?php the_content();?>
                </div>
            <?php } ?>
            <p>
                <b><?php _e('Sumber:','oketheme'); ?></b> <a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php echo get_the_title($post->post_parent) ?>"><?php echo get_the_title($post->post_parent) ?></a>
            </p>
            <?php edit_post_link('<span class="underlink flexcon inline gap-5 align-center"><i class="m-icon">edit</i>'.__('Sunting','oketheme').'</span>');?>
            <?php shareit(); ?>
        </div>
        <?php random_blog(); ads_content_bot(); ?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php endwhile; get_footer(); ?>