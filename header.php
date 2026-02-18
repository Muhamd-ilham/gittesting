<?php global $oketheme;?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head();?>
</head>
<body>
<?php maintenance_mode(); ads_mobile();?>

<section class="top-header flexcon justify-between align-center">
	<?php flash_blog(); // Flash Blog

	// Top Search
	if($oketheme['topsearch_act']) { ?>
		<form class="top-search flexcon align-center" method="get" action="<?php echo home_url(); ?>" role="search" data-customize-partial-id="header" data-helper-title="Pencarian" data-helper-tab="header">
			<input type="search" name="s" placeholder="<?=__('Topik berita apa yang Anda cari?', 'oketheme');?>">
			<button type="submit" role="button"><i class="m-icon">search</i></button>
		</form>
		<div class="toggle-search"><i class="m-icon">search</i></div>
	<?php } ?>
</section>

<section class="header flexcon gap-10 align-center justify-between container <?=$oketheme['sticky_header_act']?'_sticky':'';?>">
	<!-- Toggle Menu -->
	<button class="toggle-menu bttn"><i class="m-icon">menu</i></button>

	<!-- Top Logo -->
	<div class="top-logo flexcon column nm" data-customize-partial-id="dasar" data-helper-title="Logo" data-helper-tab="dasar">
		<?php if ($oketheme['dark_mode']['act'] && $oketheme['dark_mode']['logo_act'] && $oketheme['dark_mode']['logo_web'] && ((isset($_COOKIE['warta_dark']) && $_COOKIE['warta_dark'] == '1') || (!isset($_COOKIE['warta_dark']) && $oketheme['dark_mode']['default']))) {
            echo '<a class="logo-img" href="' . get_home_url() . '"><img fetchpriority="high" src="' . $oketheme['dark_mode']['logo_web'] . '" class="logo-web" alt="' . $oketheme['nama_web'] . ' logo" ' . get_wh_img($oketheme['dark_mode']['logo_web']) . '></a>';
            echo '<a class="logo-text" style="display:none" href="' . get_home_url() . '"><b>' . $oketheme['nama_web'] . '</b></a>';
            echo '<p class="logo-text elipsis clamp2" style="display:none">' . $oketheme['slogan_web'] . '</p>';
        } else if ($oketheme['logo_web']) {
            echo '<a class="logo-img" href="' . get_home_url() . '"><img fetchpriority="high" src="' . $oketheme['logo_web'] . '" class="logo-web" alt="' . $oketheme['nama_web'] . ' logo" ' . get_wh_img($oketheme['logo_web']) . '></a>';
            echo '<a class="logo-text" style="display:none" href="' . get_home_url() . '"><b>' . $oketheme['nama_web'] . '</b></a>';
            echo '<p class="logo-text elipsis clamp2" style="display:none">' . $oketheme['slogan_web'] . '</p>';
        } else {
            echo '<a class="logo-text" href="' . get_home_url() . '"><b>' . $oketheme['nama_web'] . '</b></a>';
            echo '<p class="logo-text elipsis clamp2">' . $oketheme['slogan_web'] . '</p>';
            echo '<a class="logo-img" style="display:none" href="' . get_home_url() . '"><img fetchpriority="high" src="" class="logo-web" alt="' . $oketheme['nama_web'] . ' logo" ' . get_wh_img($oketheme['logo_web']) . '></a>';
        }?>
	</div>
	
	<!-- Top Menu -->
	<nav class="top-menu" data-helper-title="Menu Header" data-helper-tab="header">
		<?php if($oketheme['topmenu']) { 
			wp_nav_menu(array(
				'menu' => $oketheme['topmenu'],
				'container' => '',
				'menu_class' => '',
				'fallback_cb' => false
			));
		} else { ?>
			<ul>
				<li><a href="<?=get_home_url(); ?>" title="<?php _e('Beranda','oketheme'); ?>"><?php _e('Beranda','oketheme'); ?></a></li>
				<?php echo !empty($oketheme['epaper']['act'])?'<li><a href="'.get_site_url().'/'.$oketheme['epaper']['slug'].'">'.$oketheme['epaper']['title'].'</a></li>':''; ?>
				<?php wp_list_pages('title_li&use_desc_for_title=0');?>
			</ul>	
		<?php } ?>
	</nav>
	
	<!-- Dark Mode Switch -->
	<?php if($oketheme['dark_mode']['act']) { ?>
		<div class="light-dark m-icon" data-customize-partial-id="desain">
            <?php if ((isset($_COOKIE['warta_dark']) && $_COOKIE['warta_dark'] == '1') || (!isset($_COOKIE['warta_dark']) && $oketheme['dark_mode']['default'])) {
                echo 'dark_mode';
            } else {
                echo 'light_mode';
            }?>
        </div>
	<?php } ?>
</section>

<section class="container flexcon column gap-20">
	<!-- Menu Category -->
	<?php if(isset($oketheme['cat_menu']['act']) && $oketheme['cat_menu']['act']) { ?>
		<div class="menu-cat flexcon" data-helper-title="Menu Category" data-helper-tab="header" data-helper-position="_top-left">
            <?php if($oketheme['cat_menu']['home']) { ?>
                <a class="_home" href="<?=get_home_url(); ?>" title="<?php _e('Beranda','oketheme'); ?>"><i class="m-icon">home</i></a>
            <?php } 
            if ($oketheme['cat_menu']['menu']) {
                wp_nav_menu([
                    'menu'        => $oketheme['cat_menu']['menu'],
                    'container'   => '',
                    'menu_class'  => 'hscroll flexcon',
                    'fallback_cb' => false,
                ]);
            } else {?>
                <ul class="hscroll flexcon">
                    <?php wp_list_categories('title_li&use_desc_for_title=0&hierarchical=0&hide_empty=0');?>
                </ul>
            <?php }?>
		</div>
	<?php } ?>

	<!-- Top Tags -->
	<?php if(!empty($oketheme['toptags']['act'])): ?>
		<div class="top-tags flexcon align-center gap-10" data-helper-title="Trending Tags" data-helper-tab="header">
			<div class="_title"><?=$oketheme['toptags']['title']?:__('Trending Tags','oketheme'); ?></div>
			<?php the_popular_tags($oketheme['toptags']['period']); ?>
		</div>
	<?php endif; ?>
	<?php ads_fullwidth_top(); // Ads Fullwidth Top ?>
