<?php global $oketheme; get_header(); while (have_posts()) : the_post(); setPostViews(get_the_ID()); 
if(rwmb_meta($oketheme['epaper_meta_file_source']) == 'upload') {
    $files = rwmb_meta( $oketheme['epaper_meta_file'], ['limit' => 1] );
    $file = reset( $files );
    $pdfURL = $file['url'];
} else if (rwmb_meta($oketheme['epaper_meta_file_source']) == 'gdrive') {
    $url = rwmb_meta($oketheme['epaper_meta_gdrive']);
    $pattern = '/\/file\/d\/([a-zA-Z0-9_-]+)/';
    if (preg_match($pattern, $url, $matches)) {
        $pdfURL = get_site_url().'/proxie_pdf?fileId='.$matches[1];
    } else {
        $pdfURL = null;
    }
} ?>
<section id="content" class="two-column">
    <div class="_col1 flexcon column gap-20">
        <div class="single-content _epaper flexcon nm column gap-20">
            <?php oke_crumb(); ads_content_top();?>

            <div class="_content flexcon gap-20">

                <?php if(has_post_thumbnail()) {
                    echo '<div class="_featured _fullheight" data-helper-title="Featured Image" data-helper-link="'.admin_url('post.php?post='.get_the_ID().'&action=edit#postimagediv').'">';
                        the_post_thumbnail('regular');
                    echo '</div>';
                } ?>

                <div class="_detail flexcon column gap-20 nm">
                    <h1 data-helper-title="Judul" data-helper-link="<?=admin_url('post.php?post='.get_the_ID().'&action=edit');?>"><?php the_title(); ?></h1>
                    <ul class="flexcon column gap-5 nolist nm" data-helper-title="Info <?=$oketheme['epaper']['title']; ?>" data-helper-link="<?=admin_url('post.php?post='.get_the_ID().'&action=edit#epaper_meta');?>">
                        <?php echo rwmb_meta($oketheme['epaper_meta_page'])?'<li><b>'.__('Jumlah Halaman','oketheme').'</b>: '.rwmb_meta($oketheme['epaper_meta_page']).'</li>':''; ?>
                        <?php echo rwmb_meta($oketheme['epaper_meta_lang'])?'<li><b>'.__('Bahasa','oketheme').'</b>: '.rwmb_meta($oketheme['epaper_meta_lang']).'</li>':''; ?>
                        <?php echo rwmb_meta($oketheme['epaper_meta_publisher'])?'<li><b>'.__('Penerbit','oketheme').'</b>: '.rwmb_meta($oketheme['epaper_meta_publisher']).'</li>':''; ?>
                        <?php echo rwmb_meta($oketheme['epaper_meta_published'])?'<li><b>'.__('Tanggal Terbit','oketheme').'</b>: '.rwmb_meta($oketheme['epaper_meta_published']).'</li>':''; ?>

                        <li class="_price"><?php echo rwmb_meta($oketheme['epaper_meta_price'])?:__('Gratis','oketheme'); ?></li>

                        <?php if(rwmb_meta($oketheme['epaper_meta_price'])) {
                            echo '<li class="_button" id="buy-pdf" data-customize-partial-id="epaper" data-helper-title="Metode Order" data-helper-tab="extra/epaper">';
                                if($oketheme['epaper']['order_type'] == 'wa') { ?>
                                    <!-- Direct Whatsapp -->
                                    <a href="https://api.whatsapp.com/send?phone=<?=indo62($oketheme['epaper']['wa']);?>&text=Halo, saya berminat dengan *<?=$oketheme['epaper']['title'].': '.get_the_title(); ?>*. Mohon infonya.." target="_blank">
                                        <button><i class="icofont-brand-whatsapp"></i> <?php _e('Beli Sekarang','oketheme'); ?></button>
                                    </a>
                                <?php } else if($oketheme['epaper']['order_type'] == 'page') { ?>
                                    <!-- Direct Page -->
                                    <a href="<?=get_permalink($oketheme['epaper']['page'])?>">
                                        <button><i class="m-icon">arrow_forward</i> <?php _e('Beli Sekarang','oketheme'); ?></button>
                                    </a>
                                <?php } else if($oketheme['epaper']['order_type'] == 'url') { ?>
                                    <!-- Direct URL -->
                                    <a href="<?=$oketheme['epaper']['url']?>">
                                        <button><i class="m-icon">link</i> <?php _e('Beli Sekarang','oketheme'); ?></button>
                                    </a>
                                <?php }
                            echo '</li>';
                        } else {
                            if($pdfURL) { ?>
                                <li class="_button" id="load-pdf"><button><i class="m-icon">remove_red_eye</i> <?= __('Baca','oketheme').' '.$oketheme['epaper']['title']; ?></button> <span id="pdf-loading"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.gif"></span></li>
                            <?php } else { 
                                echo '<li class="info"><i class="m-icon">info</i> '.sprintf(__('File %s saat ini tidak tersedia.','oketheme'), $oketheme['epaper']['title']).'</li>';
                            } 
                        } ?>

                    </ul>
                </div>
            </div>

            <?php if(get_the_content()) { 
                echo '<div class="wrap-post _artikel" data-helper-title="Konten" data-helper-link="'.admin_url('post.php?post='.get_the_ID().'&action=edit#wp-content-wrap').'">';
                    the_content(); 
                echo '</div>';
            }

            wp_link_pages(array(
                'before' => '<div class="page-links">'.__('Halaman', 'oketheme'),
                'after'  => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));

            edit_post_link('<span class="underlink flexcon inline gap-5 align-center"><i class="m-icon">edit</i>'.__('Sunting','oketheme').'</span>');?>
        </div>

        <?php
        shareit();
        ads_content_bot(); 
        random_epaper(); 
        ?>
        
    </div>
    <?php include (TEMPLATEPATH . '/sidebar.php'); ?>
</section>
<?php endwhile; 
get_footer();
if($pdfURL) { ?>
    <div id="pdf-viewer">
        <div class="_nav">
            <button class="_prev"><i class="m-icon">keyboard_arrow_left</i> <span><?php _e('Sebelumnya','oketheme'); ?></span></button>
            <div class="_info"><span class="_number">1</span> / <span class="_total">1</span></div>
            <button class="_next"><span><?php _e('Selanjutnya','oketheme'); ?></span> <i class="m-icon">keyboard_arrow_right</i></button>
            <span class="_close">&times;</span>
        </div>
        <div class="_content">
            <canvas id="pdf-canvas"></canvas>
            <button class="_prev"><i class="m-icon">keyboard_arrow_left</i></button>
            <button class="_next"><i class="m-icon">keyboard_arrow_right</i></button>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js" id="pdfjs"></script>
    <script>
        jQuery(document).ready(function($) {
            var pdfURL = "<?php echo $pdfURL; ?>";
            var pdfWrap = $("#pdf-viewer");
            var pdfDoc = null;
            var currentPage = 1;
            var totalPages = 1;
            var $canvas = $("#pdf-canvas");
            var ctx = $canvas[0].getContext("2d");
            var pdfLoaded = false;
            function renderPage(num) {
                pdfDoc.getPage(num).then(function (page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({ scale: scale });
                    $canvas.attr({ width: viewport.width, height: viewport.height });
                    var renderContext = { canvasContext: ctx, viewport: viewport };
                    page.render(renderContext);

                    pdfWrap.find("._number").text(num);
                    pdfWrap.find("._total").text(totalPages);
                    pdfWrap.find("._prev").prop("disabled", num <= 1);
                    pdfWrap.find("._next").prop("disabled", num >= totalPages);
                });
            }

            function loadPDF(url) {
                $("#pdf-loading").show();
                pdfjsLib.getDocument(url).promise.then(function (pdf) {
                    pdfDoc = pdf;
                    totalPages = pdf.numPages;
                    renderPage(currentPage);
                    $("#pdf-loading").hide();
                    pdfWrap.css("display", "flex");
                    pdfLoaded = true; 
                });
            }

            $("#load-pdf").click(function () {
                if (!pdfLoaded) {
                    loadPDF(pdfURL);
                } else {
                    pdfWrap.css("display", "flex");
                }
                $("body").addClass("no-scroll");
            });

            pdfWrap.find("._prev").click(function () {
                if (currentPage > 1) {
                    currentPage--;
                    renderPage(currentPage);
                }
            });

            pdfWrap.find("._next").click(function () {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderPage(currentPage);
                }
            });

            pdfWrap.find("._close").click(function () {
                pdfWrap.fadeOut();
                $("body").removeClass("no-scroll");
            });
        });
    </script>
<?php } ?>