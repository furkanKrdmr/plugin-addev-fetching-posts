<?php

/*
Plugin Name: Actu Addev
Plugin URI: https://
Description: Fetching post
Version: 1.0.0
Author: Furkan KARADEMIR    
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: 
*/

defined( 'ABSPATH' ) || die();

function contentHtml(){
  $args = array (
        'showposts' => '1',
        'category_name' => 'Top Content'
        );
        $query = new WP_QUERY($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                foreach ((get_the_category()) as $category) {
                   $catName = $category->cat_name . ' ';
                     }
               }
            }
  ?>
        <style>
            .container-actualites {
                margin-top: 50px;
            }
			.date{
				padding: 10px;
			}
    
            .Non_classé_{
                background-color: aqua;
				padding: 10px
            }
            .post {
                height: 400px;
                width: 450px;
                overflow: scroll;
                padding-right: 11px;
            }
    
            .post::-webkit-scrollbar {
                display: none;
            }
    
            .container-post {
                margin-bottom: 15px;
                border: black 1px solid;
                height: 120px;
            }
    
            .container-post img {
                width: 180px;
                height: 120px;
                display: inline-block;
                vertical-align: middle;
            }
    
            .container-post p {
                margin: auto;
                width: 220px;
                display: inline-block;
                vertical-align: middle;
                overflow: hidden;
            }
    
            .container-post-top {
                height: 200px;
                width: 100%;
                margin-bottom: 15px;
                border: black 1px solid;
            }
            .container-p-post-top {
                height: 150px;
                width: 100%;
                display: flex;
            }
    
            .p-in-post-top {
                display: flex;
                align-items: center;
                
            }
    
            .container-etiquette-post-top {
                justify-content: space-between;
            }
    
            .etiquette {
                background-color: forestgreen;
                width: 107px;
                height: 25px;
				padding: 10px;
            }
    
            .container-icon-post-top {
                float: right;
                padding-right: 100px;
            }
    
            .p-in-post {
    
                align-items: center;
                text-align: center;
                height: 67px;
                padding: 4.5px;
            }
    
            .container-icon-post {
                float: right;
            }
    
            .container-etiquette-post {
                padding-left: 10px;
            }
    
            .img-name {
                height: 85px;
                width: 80px;
                border-radius: 50%;
            }
    
            .container-nom {
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-left: 20px;
            }
    
            .post-name {
                height: 355px;
                width: 300px;
                overflow: scroll;
            }
    
            .post-name::-webkit-scrollbar {
                display: none;
            }
    
            .bloc-name-img {
                padding: 15px;
                color: white;
            }
    
            .container-member {
                background-color: #aa9c8f;
                height: 390px;
            }
    
            .border-member {
                color: white;
                padding: 5px;
                box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
            }
        </style>
    
        <div class="container container-actualites">
            <h2>Actualités</h2>
            <div class="row d-flex">
                <div class="col-12">
                    <div class="container-post-top d-flex">
                        <div class=" col-6 container-image-post-top" style="padding:0;">
                            <iframe width="300" height="200" src="https://www.youtube.com/embed/zh8aV6c_n6M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="container-bloc-post-top p-0 col-6 flex-column">
                            <div class="container-etiquette-post-top d-flex">
                                <div class="etiquette"><?php echo $catName; ?></div>
                                <div class="date">
                                    <?php
                                    echo the_date();
                                    ?>
                                </div>
                            </div>
                            <div class="container-p-post-top">
                                <p class="p-in-post-top text-center">
                                    <?php
                                    echo get_the_title();
									
									wp_reset_postdata();?>
                                </p>
                            </div>
    
                            <div class="container-icon-post-top">
                                <i class="far fa-thumbs-up" style="margin-right: 25px ;"></i>
                                <i class="fas fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex">
                    <div class="post">
                        <?php
                        $postContainer = array('numberposts' => 5, 'order' => 'DESC', 'orderby' => 'date', 'category__not_in' => 6);
                        $query = new WP_Query($postContainer);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();                            
                                foreach ((get_the_category()) as $category) {
                                    $catName = $category->cat_name . ' ';
                                }
                                echo'<div class="container-post d-flex">
                                        <div class=" col-5 container-image-post" style="padding:0;">
                                            <img src="' . get_the_post_thumbnail_url() . '" alt="" class="img-post"></img>
                                        </div>
                                        <div class="container-bloc-post col-6 flex-column">
                                            <div class="container-etiquette-post d-flex">
                                                <div class=" '. str_replace(array(" ", "&"),"_",$catName) . '">' . $catName .
    
                                                '</div>
                                            </div>
                                            <div class="container-p-post">
                                                <a href="'. get_the_permalink() .'"><p class="p-in-post d-flex">' . get_the_title() . '</p></a>
                                            </div>
        
                                            <div class="container-icon-post">
                                                <i class="far fa-thumbs-up" style="margin-right: 25px ;"></i>
                                                <i class="fas fa-comments"></i>
                                            </div>
                                        </div>
                                    </div>';
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="d-flex flex-column container-member">
                        <h6 class="border-member text-center">Ils nous ont rejoint :</h6>
                        <div class="post-name ">
                            <div class="d-flex bloc-name-img">
                                <img src="http://addevmaterials.mx/wp-content/uploads/2021/06/AdobeStock_240738433.jpeg" alt="" class="img-name"></img>
                                <div class="container-nom">
                                    <h5>Gabriel RUBAT</h5>
                                    <h6>HR Director</h6>
                                </div>
                            </div>
                            <div class="d-flex bloc-name-img">
                                <img src="http://addevmaterials.mx/wp-content/uploads/2021/06/AdobeStock_240738433.jpeg" alt="" class="img-name"></img>
                                <div class="container-nom">
                                    <h5>Gabriel RUBAT</h5>
                                    <h6>HR Director</h6>
                                </div>
                            </div>
                            <div class="d-flex bloc-name-img">
                                <img src="http://addevmaterials.mx/wp-content/uploads/2021/06/AdobeStock_240738433.jpeg" alt="" class="img-name"></img>
                                <div class="container-nom">
                                    <h5>Gabriel RUBAT</h5>
                                    <h6>HR Director</h6>
                                </div>
                            </div>
                            <div class="d-flex bloc-name-img">
                                <img src="http://addevmaterials.mx/wp-content/uploads/2021/06/AdobeStock_240738433.jpeg" alt="" class="img-name"></img>
                                <div class="container-nom">
                                    <h5>Gabriel RUBAT</h5>
                                    <h6>HR Director</h6>
                                </div>
                            </div>
                            <div class="d-flex bloc-name-img">
                                <img src="http://addevmaterials.mx/wp-content/uploads/2021/06/AdobeStock_240738433.jpeg" alt="" class="img-name"></img>
                                <div class="container-nom">
                                    <h5>Gabriel RUBAT</h5>
                                    <h6>HR Director</h6>
                                </div>
                            </div>
                            <div class="d-flex bloc-name-img">
                                <img src="http://addevmaterials.mx/wp-content/uploads/2021/06/AdobeStock_240738433.jpeg" alt="" class="img-name"></img>
                                <div class="container-nom">
                                    <h5>Gabriel RUBAT</h5>
                                    <h6>HR Director</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
};


function displayContent(){
    $showContent = contentHtml();
    return $showContent;
}

add_shortcode('posts','displayContent');
