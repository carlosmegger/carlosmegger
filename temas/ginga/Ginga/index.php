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
    <script type="text/javascript" language="JavaScript">
		var cX = 0; var cY = 0; var rX = 0; var rY = 0;
		function UpdateCursorPosition(e){ cX = e.pageX; cY = e.pageY;}
		function UpdateCursorPositionDocAll(e){ cX = event.clientX; cY = event.clientY;}
		if(document.all) { document.onmousemove = UpdateCursorPositionDocAll; }
		else { document.onmousemove = UpdateCursorPosition; }
		function AssignPosition(d) {
			if(self.pageYOffset) {
				rX = self.pageXOffset;
				rY = self.pageYOffset;
				}
			else if(document.documentElement && document.documentElement.scrollTop) {
				rX = document.documentElement.scrollLeft;
				rY = document.documentElement.scrollTop;
				}
			else if(document.body) {
				rX = document.body.scrollLeft;
				rY = document.body.scrollTop;
				}
			if(document.all) {
				cX += rX; 
				cY += rY;
				}
			d.style.left = (cX+10) + "px";
			d.style.top = (cY+10) + "px";
		}
		function HideContent(d) {
			if(d.length < 1) { return; }
			document.getElementById(d).style.display = "none";
		}
		function ShowContent(d) {
			if(d.length < 1) { return; }
			var dd = document.getElementById(d);
			AssignPosition(dd);
			dd.style.display = "block";
		}
		function ReverseContentDisplay(d) {
			if(d.length < 1) { return; }
			var dd = document.getElementById(d);
			AssignPosition(dd);
			if(dd.style.display == "none") { dd.style.display = "block"; }
			else { dd.style.display = "none"; }
		}
		//-->
	</script>
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
                    <a onmouseover="ShowContent('radio'); return true;" onmouseout="HideContent('radio'); return true;">[show on mouseover, hide on mouseout]</a>
                    <div id="radio" >
                    	
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
