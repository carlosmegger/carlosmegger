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
                        <div class="style1">Projeto Brincadeira é Coisa Séria</div>
                        <div><!--inicio conteudo-->
                          <p>A Equipe Pedagógica e as Professoras (Educação Infantil e Ensino  Fundamental I) do Colégio Modelo, elaboraram esse projeto, que  contempla a brincadeira no cotidiano e vida escolar de nossos alunos,  onde junto ao aprendizado, nossos alunos desenvolvem a construção do  caráter e das relações sociais, através de brincadeiras dirigidas com a  orientação das professoras regentes.</p>
                          <p>O projeto pretende complementar as aulas e os conteúdos  curriculares, sendo desenvolvidas no planejamento bimestral e semanal,  com propostas de atividades que envolvem o ato de brincar e aprender,  sendo realizado em quase todas as sextas-feiras.</p>
                          <p>Essas brincadeiras levam nossos alunos a desenvolverem suas  habilidades intelectuais e emocionais, também os ajudam na construção  das relações interpessoais e intrapessoais. As brincadeiras fazem com  que as crianças interajam, façam amizades, compartilhem, cooperem e  respeitem as regras das brincadeiras em grupo, aprendendo também o que  é “ganhar e perder”. A idéia é estimar as crianças através do movimento  corporal, coordenação motora e visual, ritmo, expressão, lúdico,  brincadeiras de rodas, autonomia, saúde e resgate de brincadeiras  “antigas”. As crianças também irão adquirir através do convívio com  outras crianças novos valores, trocas de ideais e novos conhecimentos.</p>
                          <p>Os alunos do Colégio Modelo poderão desenvolver junto de suas  Professoras as brincadeiras em todas as dependências do Colégio, sendo  na sala de aula, pátios (externo e interno), quadra de esportes, quadra  de grama sintética, parquinho, Cidade Mirim, Brinquedoteca, entre  outros locais.</p>
                          <p>Contamos com a colaboração de nosso corpo Docente, alunos e pais de  alunos, para que possamos desenvolver esse projeto “Brincadeira é Coisa  Séria”, tornando as aulas mais prazerosas e fazendo com que nossos  alunos desenvolvam-se com mais criatividade, preparando-os para o mundo  adulto.<br />
</p>
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