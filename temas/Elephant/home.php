<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<div id="contentarea">
    <div id="contentareabg">
        <h1> Quem Somos </h1>
        <p class="quemsomos">A Elefantinho Colorido tem o objetivo de oferecer produtos de qualidade, nacionais e importados, através de compras pela internet, para maior comodidade das mamães e seus bebês.  Nosso compromisso é com sua satisfação, por isso os produtos são selecionados com cuidado e o atendimento é ágil e eficaz para que você receba suas compras com segurança em sua casa.</p>          
        <h2> Mural do bebê</h2>
       <div id="muralbebe">
        <?php $my_query = new WP_Query('category_name=mural&showposts=1');
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate2 = $post->ID; ?> <!-- IMPORTANTE -->
             <div id="post-<?php the_ID(); ?>">
             <?php if ( has_post_thumbnail()) the_post_thumbnail('mural-thumbnails'); ?>
             </div>
         <?php endwhile; ?>
        </div>
        <!--muralbebe-->
        <p class="fotobebe"> Quer publicar a foto do seu bebê no Mural Elefantinho Colorido? Envie um e-mail para muraldobebe@elefantinhocolorido.com.br
e saiba como.</p>
        <h3> Conheça alguns de nossos produtos</h3>
        <div id="lojavirtual">
            <a href="#" target="_blank"><img src="<?php bloginfo('stylesheet_directory')?>/banner.png" width="428" alt="Loja" title="Loja" border="0"/></a>
        </div>
         <div id="faleconosco"> 
             <a href="mailto:contato@elefantinhocolorido.com.br" target="_blank"><img src="<?php bloginfo('stylesheet_directory')?>/contato.png" width="421" alt="Contato" title="Contato" border="0"/></a>
         </div>
        <div id="produtos">
            <div <?php post_class() ?> id="post-<?php the_ID(); ?>"> 
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
                    <div class="storycontent"><!--storycontent-->
                        <?php the_content(__('(more...)')); ?>
                    </div><!--storycontent-->
                <?php endwhile; else: ?>
                <?php endif; ?>
            </div><!--fim codigo-->
        </div> <!--produtos-->
    </div> <!--contentareabg-->
<?php get_footer(); ?>