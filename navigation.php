<?php wp_nav_menu(array(
  'theme_location' => 'menu-main',
  'menu' => 'menu-main',
  'container' => 'div',
  'container_id' => 'banner-nav',
  'container_class' => 'banner-nav',
  'menu_class' => 'nav nav-pills flex-grow-1',
  'walker' => new bs4navwalker()
)); ?>
