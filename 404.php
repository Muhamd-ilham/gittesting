<?php get_header();?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _blog flexcon nm column gap-20">
            <?php oke_crumb(); ads_content_top();?>
            <h1><?php _e('Kesalahan 404 - Halaman tidak ditemukan!','oketheme'); ?></h1>
            <div class="wrap-post">
                <h2><?=__('Maaf, halaman yang Anda cari kemungkinan telah dipindahkan atau dihapus.', 'oketheme'); ?></h2>
                <p><a href="<?=home_url();?>">&laquo; <?=__('kembali ke Beranda', 'oketheme');?></a> <?=__('atau silahkan gunakan kolom pencarian dibawah ini.', 'oketheme');?></p>
                <form method="get" action="<?php echo home_url(); ?>" role="search">
                    <input type="search" name="s" placeholder="<?=__('Kata Pencarian', 'oketheme');?>">
                    <button type="submit" role="button"><?=__('Mencari', 'oketheme');?></button>
                </form>
            </div>
        </div>
        <?php random_blog(); ads_content_bot(); ?>
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php get_footer(); ?>