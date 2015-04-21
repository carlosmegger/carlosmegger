				<div class="topo"><!--topo--> 
        			<ul class="socialmedia"><!--midias sociais--> 
        				<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS"  class="icomediasocial rss">Rss</a></li>
         				<li><a href="http://twitter.com/gtradebrazil" title="Twitter" class="icomediasocial twitter">Siga-nos no twitter</a></li>        
            			<li><a href="http://www.facebook.com/pages/Curitiba-Brazil/GLOBAL-TRADE-BRAZIL/118476314864606?__a=12&" title="Facebook"  class="icomediasocial face">Facebook</a></li>
   		 			</ul><!--midias sociais--> 
    	 	 	</div><!--final do topo-->
      			<div class="menu"><!--divmenu-->
        			<ul id="nav">
						<?php wp_list_pages('title_li=&child_of=0&depth=1&exclude=66,42,46,48,11&sort_order=DESC&sort_column=menu_order'); ?>
  					</ul>
                	<hr class="clear" />
				</div><!--divmenu-->