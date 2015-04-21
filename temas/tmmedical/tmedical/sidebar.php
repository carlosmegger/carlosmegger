				<!--submenu-->
						<?php
                          if(is_page(array(7,44,46,48,58,))){
							  echo "<ul id='submenu'><!--submenu-->";
                             wp_list_pages("title_li=&child_of=7&depth=1");
							 echo "</ul><!--submenu-->";
                                }
                          else if(is_page(array(32,74,76,78,80,))){
							  echo "<ul id='submenu'><!--submenu-->";
                             wp_list_pages("title_li=&child_of=32&depth=1");
							 echo "</ul><!--submenu-->";
                                }								
                          else if(is_page(array(34,105,108,))){
							  echo "<ul id='submenu'><!--submenu-->";
                             wp_list_pages("title_li=&child_of=34&depth=1");
							 echo "</ul><!--submenu-->";
                                }								
                      	?>
                 <!--submenu-->