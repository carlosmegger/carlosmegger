<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="all" />
<link href="menu.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/menu.css" rel="stylesheet" type="text/css" media="all" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="<? bloginfo('stylesheet_directory')?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<?php wp_head(); ?> <!--lightbox, e marcador de paginas-->
<link rel="SHORTCUT ICON" href="<? bloginfo('stylesheet_directory')?>/favicon.ico" />
<script type="text/javascript">
function horizontal(){ // Função para organizar o menu
   var navItems = document.getElementById('nav').getElementsByTagName('li');
   for (var i=0; i< navItems.length; i++) {
	 if(navItems[i].getElementsByTagName('ul')[0] != null)
	 {
		navItems[i].onmouseover=function() {this.getElementsByTagName('ul')[0].style.display="block"; }
		navItems[i].onmouseout=function() {this.getElementsByTagName('ul')[0].style.display="none"; }
	 }
   }
}
window.onload=horizontal;
// Função para organizar o menu
</script>
<!--GOOGLE ANALYTICS-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3721520-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><!--GOOGLE ANALYTICS-->
</head>

<body>
<div id="geral">
	<?php get_header();?><!--topo-->
    <div id="corpo"><!--inicio div corpo-->
	 			 <div class="width1"><!-- inicio div width1-->
                 <?php get_sidebar();?>
	 			 </div><!-- final div width1-->
                 <div class="width3"><!-- inicio div width3-->
               	   <div class="width2b"><!--width2-->
                        <div class="style1">Qualidade de vida e valores humanos</div>
                        <div><!--inicio conteudo-->
                          O mundo no qual vivemos é marcado por uma rápida transformação social,  econômica, cultural e religiosa, e este exige um ser humano preparado  para lidar com uma sociedade cada vez mais complexa e diversa e com as  imprevisibilidades que nela há.<br />
Pensando esta condição da sociedade contemporânea e visando resgatar os  valores de convivência que permeiam a vida humana, social e ecológica,  a equipe do Colégio Modelo está desenvolvendo um projeto de caráter  permanente que envolve professores, funcionários, pais e alunos, tanto  na escola como em outros ambientes.<br />
“Acreditamos que se a Educação sozinha não transforma a sociedade, sem  ela tampouco a sociedade muda. (…) se estamos a favor da vida e não da  morte, da equidade e não da injustiça, do direito e não do arbítrio,  não temos outro caminho se não vivermos a nossa opção. Encarná-la  diminuindo assim a distância entre o que dizemos e o que fazemos.”  (Paulo Freire).<br />
Fundamentado no respeitado educador Paulo Freire e acreditando no  respeito à vida, às relações humanas saudáveis e ao meio ambiente, o  Projeto “Valores Humanos e Qualidade de Vida” tem por objetivo garantir  a formação competente do aluno trazendo intencionalmente para a sala de  aula discussões sobre o contexto da vida e da sociedade em que vivemos,  aproximando temas relevantes para entendê-la a partir do olhar  específico de cada disciplina, buscando soluções para os problemas  sociais por meio de uma análise crítica e reflexiva dos conteúdos  apreendidos.<br />
Assim, a instituição e seus colaboradores pretende, através do Projeto,  além de proporcionar a formação acadêmica, alcançar a excelência humana  a partir da conscientização que &quot;Evoluir é cuidar da Vida&quot;.<br />
<br />
</div>
                        <!--fim conteudo-->
                        <div class="style1">Projetos realizados</div>
<div> <!--inicio codigo-->
							<?php if (have_posts()) : ?>
	                            <?php while (have_posts()) : the_post(); ?>							

                                    <div id="post-<?php the_ID(); ?>">
                                    <span class="style3"><em><?php the_date('',''); ?></em></span> 
                                    <a href="<?php the_permalink() ?>" rel="bookmark"> <span class="style2"><?php the_title(); ?></span></a>                                                     
                                    </div> <!-- contentbox -->

									<?php endwhile; ?>
                                    <div class="navigation">
                                     <div class="alignleft"><?php if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; ?></div>
                                    </div>
                            
                                <?php else : ?>
                            
                                    <h2 class="center"><?php _e('Not Found', 'kubrick'); ?></h2>
                                    <p class="center"><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'kubrick'); ?></p>
                                    <?php get_search_form(); ?>
                            
                                <?php endif; ?><br />
</div><!--fim codigo-->
                   </div><!--width2-->
                   
                 	<div class="width1direita"><!--inicio direita-->
                    	<?php get_sidebar('2');?>
                 	</div><!--fim direita-->
      </div><!--fim width3-->
	  </div><!--final da div corpo-->
  <hr class="clearhidden" />
	<?php get_footer();?><!--rodape-->
</div><!--geral-->
</body>
</html>