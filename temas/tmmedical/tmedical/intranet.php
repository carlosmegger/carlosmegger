<?php
/*
Template Name:intranet
*/
?>
<?php get_header(); ?>
        <div id="width4"><!--width4-->
                <h2><?php the_title(); ?></h2>	
				<? get_sidebar(); ?><!--submenu-->
                <div id="content"><!--content-->
                        <div class="floatleft2"><!--floatleft2--> 
                            <form id="LoginForm" action="http://webmail.tmmedical.com.br/" method="post"> <input id="pgrel" name="pgrel" type="hidden" /> <input name="FormCharset" type="hidden" value="UTF-8" />E-mail:
        <input id="Username" name="Username" type="text" /><span class="labelDomain">@tmmedical.com.br</span><br />
        
        Senha:
        <input id="Password" name="Password" type="password" /><span>
        </span>
        
        <select id="SessionSkin" name="SessionSkin"> <option value="Classica">Clássico</option> <option selected="selected" value="Mobimail">Mobimail</option> </select> <input id="Language" name="Language" type="hidden" /> <input id="Entrar" class="button" name="Entrar" type="submit" value="ENTRAR" /> </form>
                            </div><!--floatleft2--> 
                        <div class="floatleft2"><!--floatleft2--> 
                            <?php # 1 - Loop de jornais ------?>
                            <?php if (have_posts()) : ?>
                                <?php 
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $temp = $wp_query;
                                    $wp_query= null;
                                    $wp_query = new WP_Query();
                                    $wp_query->query('showposts=10'.'&paged='.$paged.'&category_name=jornal'); 
                                    while ($wp_query->have_posts()) : $wp_query->the_post(); 
                                ?> <!-- IMPORTANTE -->
                                    <div class="posthome" id="post-<?php the_ID(); ?>">
                                        <span class="style2"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                                    </div>
                                <?php endwhile; ?>   
                                    <div class="navigation" align="left"><!--navigation--> 
                                <?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?>
                                    </div><!--navigation--> 
                            <?php endif; ?>
                            </div><!--floatleft2--> 
				</div><!--content-->   	
			       <hr class="clearhidden"/>            
  		</div><!--width4-->
       <hr class="clearhidden"/>  
</div><!--geral-->
<?php get_footer(); ?>
