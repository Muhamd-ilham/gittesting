<?php /* Template Name: Index Berita */ 
get_header(); 
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
query_posts(array(
    'post_type' => 'post',
    'paged' 	=> $paged,
));?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20">
            <?php if($oketheme['crumb_act']) { ?>
                <div class="crumbs">
                    <a href="<?php echo home_url(); ?>"><?php _e('Beranda', 'oketheme'); ?></a>  &raquo;  <?php _e('Index Berita','oketheme'); ?>
                </div>
            <?php } ads_content_top(); ?>
            <h1><?php _e('Index Berita','oketheme'); ?></h1>
            <?php if(get_the_content()) { 
                echo '<div class="wrap-post">' . get_the_content(). '</div>';
            } ?>
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="filter-archive flexcon gap-10">
                <select name="cat">
                    <option value=""><?php _e('Artikel berdasarkan kategori', 'oketheme'); ?></option>
                    <?php
                    $categories = get_categories(array('hide_empty' => false)); // Ambil semua kategori, termasuk yang kosong
                    foreach ($categories as $category) {
                        echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
                    }
                    ?>
                </select>
                <button type="submit"><i class="m-icon">search</i> <?php _e('Mencari', 'oketheme'); ?></button>
            </form>

            <?php if (have_posts()) {
                echo '<div class="archive list _res">';
                while (have_posts()):
                    the_post();
                    loop('regular');
                endwhile;
                echo '</div>';
                oke_pagination();
            } else { 
                _e('Maaf, saat ini belum tersedia post untuk ditampilkan.', 'oketheme');
            } ?>
        </div>
        <?php ads_content_bot(); ?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>	
<?php get_footer(); ?>