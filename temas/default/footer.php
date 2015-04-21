<!--blog-->
		<?php do_action( 'bp_after_container' ) ?>
		<?php do_action( 'bp_before_footer' ) ?>

		<div id="rodape">
        	<div id="conteudo_rodape" class="menu_topo">
                <form method="get" id="searchform2" action="<?php bloginfo('url'); ?>">
                    <FIELDSET>
                        <legend><h3>Busca</h3></legend>
                        <input type="text" maxlength="23" tabindex="5" class="input" value="<?php the_search_query(); ?>" name="s" id="s2"/>
                        <input type="submit" id="submit2" class="input" value="ok" tabindex="6"/>
                    </FIELDSET>
                </form>
                <div id="rss_rodape">
                    <a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="RSS"><h3>Assine Nosso RSS</h3></a>
                    <p>*RSS &eacute; um padr&atilde;o de recep&ccedil;&atilde;o de not&iacute;cias que torna poss&iacute;vel se manter informado sobre not&iacute;cias direcionadas por meio de leitores espec&iacute;ficos. &Eacute; suportado por navegadores e leitores de email mais populares.</p>
                </div><!-- #rss_rodape -->
                <hr/>
                <div id="tags_rodape">
                    <h3>Nuvem de Tags</h3>
                    <?php wp_tag_cloud('smallest=7&largest=15'); ?>
                </div><!-- #tags_rodape -->
                <div id="politica_rodape">
                    <h3>Pol&iacute;tica de uso</h3>
                    <p>O blog Comunidade Ctea &eacute; destinado ao p&uacute;blico leigo e profissional interessado em qualidade de vida e esporte. O conte&uacute;do aqui inserido &eacute; baseado na experi&ecirc;ncia dos autores, bem como na pratica de atletas que colaboram com textos e artigos.</p>
                    <p>Essa p&aacute;gina est&aacute; aberta a qualquer informa&ccedil;&atilde;o ou coment&aacute;rio que tenha como objetivo enriquecer o conte&uacute;do da p&aacute;gina, que preza pela [<a href="<?php bloginfo('url'); ?>/politica/" title="Politica de Uso Comunidade Ctea">leia mais</a>]</p>
                </div><!-- #politica_rodape -->
                <div id="part_publi_rodape">
                    <h3>Participe</h3>
                    <ul>
                    	 <?php 
                    	 	global $bp;
							if ( bp_blog_signup_enabled() ) {
								echo '<li><a href="' . $bp->root_domain . '/' . $bp->blogs->slug . '/create/" title="'. __( 'Create a Blog!', 'buddypress' ) . '">Crie seu blog</a></li>';
							}
			            ?>
                        <!-- <li><a href="<?php //bloginfo('url'); ?>/wp-signup.php" title="Crie seu blog!">Crie seu blog</a></li>  -->
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <li><a href="<?php bloginfo('url'); ?>/certificado/" title="Certificado Ctea">Certificado</a></li>
                        <?php wp_meta(); ?>
                    </ul>
                    <br />
                    <h3>&Uacute;ltimas Publica&ccedil;&otilde;es</h3>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                </div><!-- #part_publi_rodape -->
                <div id="cat_rodape">
                    <h3>Categorias</h3>
                    <ul>
                        <?php wp_list_categories('title_li=&orderby=name&show_count=1&depth=1'); ?>
                    </ul>
                </div><!-- #cat_rodape -->
                <p id="assinatura"><?php printf( __( '%s &eacute; orgulhosamente desenvolvida com <a href="http://wordpress.org">WordPress</a> e <a href="http://buddypress.org">BuddyPress</a> por <a href="http://www.inbe.com.br/" alt=""Inbe Comunicação - developing brands>Inbe</a>', 'buddypress' ), get_bloginfo( 'name' ) ); ?></p>
    
                <?php do_action( 'bp_footer' ) ?>
            </div><!-- conteudo_rodape -->
	</div><!-- #rodape -->

		<?php do_action( 'bp_after_footer' ) ?>

		<?php wp_footer(); ?>

	</body>

</html>