<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Saudabilidade</title>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/jquery-1.4.2.min.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
    <script type="text/javascript">
		$(function(){		
			$('a[class="menu"]').click(function() {			
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
				&& location.hostname == this.hostname) {				
					var $target = $(this.hash);					
					$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');					
					if ($target.length) {					
						var targetOffset = $target.offset().top;						
						$('html,body').animate({scrollTop: targetOffset}, 600);							
						return false;						
					}					
				}				
			});			
		});
    </script>
    <?php 
    	//mp3j_addscripts();
    ?>
    <?php wp_head (); ?>
</head>

<body>
		<div id="header">
        		<div class="width4">
                <div id="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png"/></div>
                <ul class="menu">
                	<li><a href="#1" class="menu">Home</a></li>
                    <li><a href="#2" class="menu">Experimente</a></li>
                    <li><a href="#3" class="menu">Midia</a></li>
                    <li><a href="#4" class="menu">Trabalhe Conosto</a></li>
                    <li><a href="#5" class="menu">Franquias</a></li>
                    <li><a href="#6" class="menu">Contato</a></li>
                    </ul>
                    <div id="radio">
	                    <!-- <object id="audioplayer_1" width="290" height="24" type="application/x-shockwave-flash" name="audioplayer_1" style="outline: medium none;" data="http://www.inbewebhost.com.br/ginga/wp-content/plugins/audio-player/assets/player.swf?ver=2.0.4.1"> 
	                    	<param name="bgcolor" value="#FFFFFF"> 
	                    	<param name="wmode" value="transparent"> 
	                    	<param name="menu" value="false"> 
	                    	<param name="flashvars" value="animation=no&encode=yes&initialvolume=60&remaining=no&noinfo=no&buffer=5&checkpolicy=no&rtl=no&bg=E5E5E5&text=333333&leftbg=CCCCCC&lefticon=333333&volslider=666666&voltrack=FFFFFF&rightbg=B4B4B4&rightbghover=999999&righticon=333333&righticonhover=FFFFFF&track=FFFFFF&loader=009900&border=CCCCCC&tracker=DDDDDD&skip=666666&titles=Adrenalina%2CAirplanes%2CDo%20lado%20de%20c%C3%A1&artists=Luan%20Santana%2CBOB%20ft%20Paramore%2CChimarruts&soundFile=aHR0cDovL2RhcnRoL0dpbmdhL2Ntcy9hdWRpby9BZHJlbmFsaW5hLm1wMyxodHRwOi8vZGFydGgvR2luZ2EvY21zL2F1ZGlvL0FpcnBsYW5lcy5tcDMsaHR0cDovL2RhcnRoL0dpbmdhL2Ntcy9hdWRpby9kb19sYWRvX2NhLm1wMw&playerID=audioplayer_1"> 
	                    </object> -->
	                    <?php //mp3j_put( '[mp3-jplayer tracks="FEED:LIB" pick="5" shuffle="y"]' ); ?>
                    </div><!--radio-->
                </div><!--width4-->
        </div><!--header-->
        
        <div class="width4"><!--width4-->
              
        <h2 id="1">Home</h2>
        <div class="content"><!--content-->
				           
                <?php # 1 -HOME --------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=home&showposts=1');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div id="post-<?php the_ID(); ?>"><!--post-->               
										<?php the_content(); ?>
                                        <?php if ( function_exists( 'get_smooth_slider_category' ) ) { get_smooth_slider_category('slide'); } ?>
         						 </div> <!--post-->
                <?php endwhile; ?>                            
                
        <hr class="clear"/>
        </div><!--content-->

		        
                		
		<h2 id="2">Experimente</h2>
        <div class="content"><!--content-->

                <?php # 2 - Experimente --------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=experimente&showposts=1');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div id="post-<?php the_ID(); ?>"><!--post-->               
										<?php the_content(); ?>
         						 </div> <!--post-->
                <?php endwhile; ?>              
                
		<hr class="clear" />
		</div><!--content-->
        


        <h2 id="3">Midia</h2>
        <div class="content"><!--content-->


                <?php # 2 - Midia --------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=midia&showposts=1');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div id="post-<?php the_ID(); ?>"><!--post-->               
										<?php the_content(); ?>
         						 </div> <!--post-->
                <?php endwhile; ?>  

		<hr class="clear" />
        </div><!--content-->
       
        
     
        <h2 id="4">Trabalhe Conosco</h2>
        <div class="content"><!--content-->

                <?php # 2 - Trabalhe conosco --------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=trabalhe_conosco&showposts=1');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div id="post-<?php the_ID(); ?>"><!--post-->               
										<?php the_content(); ?>
         						 </div> <!--post-->
                <?php endwhile; ?>  

		<hr class="clear" />
        </div><!--content-->
		
             
             
		<h2 id="5">Franquias</h2>
        <div class="content"><!--content-->
                <?php # 2 - Franquias --------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=franquias&showposts=1');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div id="post-<?php the_ID(); ?>"><!--post-->               
										<?php the_content(); ?>
         						 </div> <!--post-->
                <?php endwhile; ?>  
            <hr class="clear" />	  		
		</div><!--content-->
        
		<h2 id="6">Contato</h2>
        <div class="content"><!--content-->
                <?php # 2 - Franquias --------------------- ?>
                   		 <?php $my_query = new WP_Query('category_name=contato&showposts=1');
                            while ($my_query->have_posts()) : $my_query->the_post();
                            	$do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
                           		 <div id="post-<?php the_ID(); ?>"><!--post-->               
										<?php the_content(); ?>
         			 			</div> <!--post-->
                <?php endwhile; ?> 
            <hr class="clear" />	  		
		</div>  <!--content-->      
              <p>.</p>
              <p>.</p>
              <p>.</p>
        </div><!--width4-->
<?php 	wp_footer(); ?>
</body>
</html>
