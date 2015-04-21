<?php get_header(); ?>
<div id="contentarea">
    <div id="contentareabg">
        <h1 class="title-desc"><?php the_title(); ?></h1>
        <div class="descricao-conteudo" id="post-<?php the_ID(); ?>">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>   
                <?php the_content(__('(more...)')); ?>
                <?php endwhile; else: ?>
            <?php endif; ?>
        </div> <!--descricao-conteudo-->  
    </div><!--contentareabg-->
<?php get_footer(); ?>