<?php get_header(); while (have_posts()) : the_post(); ?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20">
            <?php oke_crumb(); ads_content_top();?>
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>    
            <?php if(has_post_thumbnail()) { ?>
                <div class="_featured ofc">
                    <?php the_post_thumbnail(); ?>  
                </div>
            <?php } ?>
            <?php if(get_the_content()) { ?>
                <div class="wrap-post">
                    <?php the_content();?>
                </div>
            <?php } ?>
            <?php edit_post_link('<span class="underlink flexcon inline gap-5 align-center"><i class="m-icon">edit</i>'.__('Sunting','oketheme').'</span>');?>
            <?php shareit(); ?>
        </div>
        <?php comments_template('/komentar.php'); ads_content_bot(); ?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php endwhile; get_footer(); ?>