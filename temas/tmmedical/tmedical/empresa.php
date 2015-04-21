<?php
/*
Template Name: empresa
*/
?>
<?php get_header(); ?>
        <div id="width4"><!--width4-->
                <h2><?php the_title(); ?></h2>	
				<? get_sidebar(); ?><!--submenu-->
                <div id="content"><!--content-->
                         <?php while (have_posts()) : the_post(); ?>
                             <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">		
                               	<?php the_content(); ?>
                             </div>
                        <?php endwhile; ?>      
                </div><!--content-->   	
			       <hr class="clearhidden"/>  
                <div class="width1empresa"><!--width1empresa-->  
                	<h3>Visão</h3>
                    A TM será a empresa mais dedicada e qualificada 
                    na distribuição de produtos da área de saúde 
                    no território que atua.
                </div><!--width1empresa-->      
                <div class="width1empresa"><!--width1empresa-->  
                <h3>Missão</h3>
                Crescer e desenvolver-se, vendendo produtos 
                de alta qualidade na área de saúde, 
                conquistando a confiança dos nossos clientes
                e fornecedores.
                </div><!--width1empresa-->    
                <div class="width1empresa"><!--width1empresa-->  
                <h3>Politica de Qualidade</h3>
                Oferecer produtos de tecnologia e um 
                atendimento completo e inovador, 
                melhorando continuamente o Sistema da 
                Qualidade, com compromisso de atender 
                aos requisitos.
                </div> <!--width1empresa-->        
  		</div><!--width4-->
       <hr class="clearhidden"/>  
</div><!--geral-->
<?php get_footer(); ?>
