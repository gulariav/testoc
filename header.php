<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package testoc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<?php wp_body_open(); ?>

<div class="fixed-menu">
        
    <!-- header start here-->
    <header class="header-metro">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                    <div id="logo">
                    	<?php 
                    	if(function_exists( 'ot_get_option' ) && ot_get_option( 'header_logo' ) ) {
          					$header_logo_url = ot_get_option( 'header_logo' );  ?>
          					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          						<img src="<?php echo $header_logo_url; ?>" alt="<?php bloginfo( 'name' ); ?> logo" width="150" height="60" />
          					</a>
          				<?php } else { ?>
          					<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        	<?php bloginfo( 'name' ); ?></a></h2>
                       		<p class="site-desc"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        	<?php bloginfo( 'description' ); ?></a>
          				<?php } ?>                        
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                    <div class="links top-menu">      
                    	<a data-fancybox="" data-src="#searchform" href="javascript:;"><i class="fa fa-search" aria-hidden="true"></i></a>
                    	<div id="searchform">
                    		<form method="get" class="search-form" action="<?php echo home_url(); ?>">
                    			<label for="search-site">Search the Site</label>
                    			<input name="s" type="text" placeholder="Search" id="search-site">
                    			<input type="submit" name="submit" value="Search" class="btn btn-alt" >
                    		</form>
                    	</div>            
                    </div>
                    <!-- menu start here -->
                    <div id="menu" class="pull-right">  
                        <nav class="navbar">
                            <div class="collapse navbar-collapse navbar-ex1-collapse padd0">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'nav navbar-nav text-right',
                                    'container'      => '',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s metro">%3$s</ul>'
                                ) );
                                ?>
                            </div>
                        </nav>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- header end here -->
</div>

    

<?php if( is_front_page() ): ?>

    <!-- slider start here -->  
    <div class="slideshow owl-carousel">
    
        <?php 
            if(function_exists( 'ot_get_option' ) && ot_get_option( 'home_slider' ) )
            {    
                $slides = ot_get_option( 'home_slider', array() ); //var_dump($slides);
                if ( ! empty( $slides ) ) 
                {
                    $image_count = 1;

                    foreach( $slides as $slide ) 
                    {
                        $disable_lazyload = 'class="no-lazyload"';                
                        if($image_count != 1) $disable_lazyload = '';

                        echo '<div class="item"><div class="parallax"><div class="scollmain section_wrap">';

                        if($slide['image']) 
                        {
                            echo '<div class="imageeffect scroll_layers" style="background:url(\''.$slide['image'].'\') no-repeat;">&nbsp;</div>';
                        }

                        if(!empty($slide['title']) || !empty($slide['description']))
                        {
                            echo '<div class="slidesdetail container"><div class="col-md-8">
                                  <h2>'.$slide['title'].'</h2>
                                  <p>'.$slide['description'].'</p>';

                            echo '<div class="clear"></div>';  

                            if(!empty($slide['link']))    
                            echo '<a href="'.$slide['link'].'" class="btn" aria-label="Learn more about '.$slide['title'].'">Read More</a>';

                            echo '</div></div>';      
                        }

                        echo '</div></div></div>';
                        $image_count++;
                    }
                }    
            }
            ?>
    </div>
    <!-- slider end here -->

    <!-- lead form start here -->
    <div class="leadform hot-posts">   
        <div class="container">
            <div class="row">     
                <div class="col-lg-4 col-md-4 col-sm-12 pull-right lead-inner">               
                <h2>
                	<?php                   
                    if(function_exists( 'ot_get_option' ) && ot_get_option( 'hot_posts_heading' ) )
                        echo ot_get_option( 'hot_posts_heading' );
                    else 
                        echo 'What\'s Hot';
                    ?>
                </h2>                                

                
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 15, // Number of recent posts thumbnails to display,
                    'post__in' => ot_get_option( 'hot_posts'),
                    'post_status' => 'publish' // Show only the published posts
                ));
                foreach($recent_posts as $post) : 

                    $title_trimmed = trim(wp_strip_all_tags($post['post_title']));

                    if(strlen($title_trimmed) > 50 ) $title_excerpt = substr($title_trimmed, 0, 50).'...';
                    else  $title_excerpt = $title_trimmed;

                   
                    //$excerpt = get_the_excerpt($post['ID']);
                    //$excerpt = trim(wp_strip_all_tags( get_the_excerpt($post['ID']), true ));
 
                    //$excerpt = substr($excerpt, 0, 175);
                    //$post_excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                    ?>

                    <div class="box">
                    	<div class="row">
                    	<div class="col-sm-4 col-md-2">
                    		<div class="whats-hot-thumb">
	                    		<?php if (has_post_thumbnail($post['ID']))
	                    			echo get_the_post_thumbnail($post['ID'], 'whats-hot-thumb'); 
	                    		?>
                    		</div>
                    	</div>
                    	<div class="col-sm-8 col-md-10">
                            <h3><a href="<?php echo get_permalink($post['ID']) ?>"><?php echo $title_excerpt; ?></a></h3>
                            <div class="date"><span><?php echo get_the_date('M j Y', $post['ID']); ?>
                            </span></div>
                            <div class="caption">
                            <!-- <p><?php echo wp_trim_excerpt($excerpt); ?>...</p> -->                  
                            </div>
                        </div>
                    </div>
                    </div>

                <?php endforeach; wp_reset_query(); ?>
            

                </div>                  
            </div>
        </div>
    </div>
    <!-- lead form end here -->

 <?php endif; ?>

	
