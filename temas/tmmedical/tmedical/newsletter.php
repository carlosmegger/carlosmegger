<?php 
/*
Template Name: newsletter
*/
?>
<?php get_header(); ?>
        <div id="width4"><!--width4-->
                <h2><?php the_title(); ?></h2>	
				<? get_sidebar(); ?><!--submenu-->
                <div id="content"><!--content-->
                           <div id="news_form"><!--news_form-->
						   	<?php wpnewsletter_opt_in(); ?>  
                           </div><!--news_form-->
                </div><!--content-->   	
			       <hr class="clearhidden"/>            
  		</div><!--width4-->
       <hr class="clearhidden"/>  
</div><!--geral-->
<?php get_footer(); ?>
