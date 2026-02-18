<div id="sidebar" class="_col2 flexcon column gap-20 <?php echo $oketheme['sidebar_lr']=='left'?'_left':'_right'; ?>">

    <?php if(is_array($oketheme['sidebar'])) {
        foreach ($oketheme['sidebar'] as $key => $subkey) {
            if (isset($subkey['act']) && $subkey['act']) {
                switch ($key) {
                    case 'ads1': ads_sidebar1();
                    break;
                    case 'trending_blog': trending_blog();
                    break;
                    case 'comment_blog': top_comment_blog();
                    break;
                    case 'latest_blog': slatest_blog();
                    break;
                    case 'ads2': ads_sidebar2();
                    break;
                    case 'widget': dynamic_sidebar('sidebar');
                    break;
                }
            }
        } 
    } ?>
    
</div>