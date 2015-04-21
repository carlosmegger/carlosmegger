        <div id="sidebar" class="double-border">
            <div class="double-border-sub">
            	<div id="sidebar-redirect"></div>
                <div class="widget">
                    <h2>Categorias</h2>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </div><!--widget-->
               
                <div class="widget">
                    <form action="<?php bloginfo('url'); ?>" method="get">
                        <fieldset>
                            <h2><label for="busca">Busca</label></h2>
                            <p>
                                <input type="text" name="s" id="busca" />
                                <button type="submit">Ok</button>
                            </p>
                        </fieldset>
                    </form>
                </div><!--widget-->
            </div><!--double-border-sub-->
        </div><!--sidebar-->