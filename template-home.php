<?php
/**
   Template Name: Home Page
 *
 * This is the template for Home page layout.
 * *
 * @package amco
 */

get_header();
?>

    

    <!-- Our Featured Products start here -->
    <div id="thoughts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 text-center commontop">
                    <h1 style="text-align: center !important; color: #4472c4; ">Welcome To MetroCenter Signworks Company</h1>
                    <h2 style="text-align: center !important;">
                        <?php                   
                        if(function_exists( 'ot_get_option' ) && ot_get_option( 'hp_featured_product_title' ) )
                            echo ot_get_option( 'hp_featured_product_title' );
                        else 
                            echo 'Our Featured Products';
                        ?>
                    </h2>          
                </div>
                <div class="thoughts "> <!-- .owl-carousel -->
                                    

                    <?php 
                    // Disabled, showing the products through post type product
                    if(function_exists( 'ot_get_option' ) && ot_get_option( 'home_page_featured_products_slider' ) )
                    {    
                        $slides = ot_get_option( 'home_page_featured_products_slider', array() ); //var_dump($slides);
                        if ( ! empty( $slides ) ) 
                        {
                            foreach( $slides as $slide ) 
                            {
                                
                                //echo '<div class="item">';

                                echo '<div class="col-md-3 col-sm-6 col-xs-12"><div class="box"><div class="box-top"><div class="image">';

                                echo '<a href="'.$slide['fp_link'].'" title="'.$slide['title'].'" aria-label="'.$slide['title'].'">';

                                $attach_id =  attachment_url_to_postid($slide['fp_image']);                                
                                
                                if($attach_id) { 
                                    //echo wp_get_attachment_image($attach_id, 'full', array( 'class' => 'img-responsive' ));
                                    $image_attributes = wp_get_attachment_image_src( $attach_id, 'full' );
                                    $srcset = wp_get_attachment_image_srcset( $attach_id, 'full' );

                                    echo '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" class="img-responsive" alt="" srcset="'.esc_attr( $srcset ).'" />';

                                }

                                echo '</a>';

                                echo '<div class="caption"><h2>';

                                echo '<a href="'.$slide['fp_link'].'" title="'.$slide['title'].'" aria-label="'.$slide['title'].'">';

                                echo $slide['title'].'</a></h2>';

                                 echo '<p>'.$slide['desc'].'</p>';

                                echo '</div>'; //caption div closing

                                echo '</div></div></div></div>';

                                //echo '</div>';
                            }
                        }    
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
    <!-- thoughts end here -->

    <!-- topservices start here -->
    <div class="topservices">
        <div class="full-container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 commontop">
                    <?php 
                    if(function_exists( 'ot_get_option' ) && ot_get_option( 'hp_services_image' ) )
                    {
                        $attach_id = attachment_url_to_postid(ot_get_option( 'hp_services_image'));
                        if($attach_id) 
                              

                        if($attach_id) { 
                            //echo wp_get_attachment_image($attach_id, 'full','', array( 'class' => 'img-responsive' )); 
                            $image_attributes = wp_get_attachment_image_src( $attach_id, 'full' );
                            $srcset = wp_get_attachment_image_srcset( $attach_id, 'full' );

                            echo '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" class="img-responsive" alt="" srcset="'.esc_attr( $srcset ).'" />';

                        }
                    }
                    ?>        
                </div>
                
                <div class="col-sm-6 col-xs-12 about-box">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="box">
                                <h2>
                                    <?php                   
                                    if(function_exists( 'ot_get_option' ) && ot_get_option( 'our_services_heading' ) )
                                        echo ot_get_option( 'our_services_heading' );
                                    else 
                                        echo 'The Expert Services';
                                    ?>

                                </h2>
                            </div>          
                        </div>     
                    </div>
                    <div class="row">  
                  
                        <?php 
                            if(function_exists( 'ot_get_option' ) && ot_get_option( 'hp_services_list' ) )
                            {    
                                $hp_services_list = ot_get_option( 'hp_services_list', array() ); //var_dump($slides);

                                if ( ! empty( $hp_services_list ) ) 
                                {

                                    foreach( $hp_services_list as $slide ) 
                                    {
                                        echo '<div class="col-md-12">';

                                        echo '<div class="icons"><i class="fa '.$slide['icon_class'].'"></i></div>'; 

                                        echo '<div class="box">';
  
                                         echo '<a href="'.$slide['link'].'" title="'.$slide['title'].'" aria-label="'.$slide['title'].'">';

                                        echo '<h4>'.$slide['title'].'</h4>';

                                        echo '</a>';

                                        echo '<p>'.$slide['desc'].'</p>   
                                              </div></div>';
                                             
                                    }
                                }    
                            }
                            ?>         
                    </div>          

                </div>
            </div>
        </div>
    </div>
    <!-- topservices end here -->

    <!-- blog-home start here -->
    <div class="blog-home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12 commontop text-center">
                    <h2 style="text-align: center !important;">Our Blog</h2>       
                </div>
            </div>
            <div class="row">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 4, // Number of recent posts thumbnails to display
                    'post_status' => 'publish' // Show only the published posts
                ));
                foreach($recent_posts as $post) : 
                    //$excerpt = get_the_excerpt($post['ID']);

                    $excerpt = trim(wp_strip_all_tags( get_the_excerpt($post['ID']), true ));
 
                    $excerpt = substr($excerpt, 0, 175);
                    $post_excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                    ?>

                    <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                        <div class="box">
                            <div class="date"><span><?php echo get_the_date('M j', $post['ID']); ?><br/><?php echo get_the_date('Y', $post['ID']); ?></span></div>
                            <div class="caption">
                            <h2><a href="<?php echo get_permalink($post['ID']) ?>"><?php echo $post['post_title'] ?></a></h2>
                            <!-- <p><?php echo wp_trim_excerpt($excerpt); ?>...</p> -->                  
                            </div>
                        </div>
                    </div>

                <?php endforeach; wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <!-- blog-home end here -->




    <!-- <div class="home-intro" id="welcome">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12"> 
                    <div class="introbox">
                        <?php 
                        while ( have_posts() ) : the_post();
                            the_content(); 
                        endwhile; // End of the loop.
                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
 


<!-- Home page interactive Map.-->
<div id="interactive-map-box">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 text-center commontop">
                    <?php                   
                    if(function_exists( 'ot_get_option' ) && ot_get_option( 'home_page_interactive_map' ) )
                        echo ot_get_option( 'home_page_interactive_map' );
                    ?>
            </div>
        </div>
    </div>
</div>

   

    

<?php
get_footer();
