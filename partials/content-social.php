<?php
  $social_icons = array(
    'fb'  => array(
      'link'  => 'https://www.facebook.com/sharer.php?u='.get_the_permalink(),
      'icon'  => 'fa fa-facebook'
    ),
    'tw'  => array(
      'link'  => 'https://twitter.com/intent/tweet?text='.get_the_title().'&url='.get_the_permalink(),
      'icon'  => 'fa fa-twitter'
    ),
    'li'  => array(
      'link'  => 'https://www.linkedin.com/sharing/share-offsite/?url='.get_the_permalink(),
      'icon'  => 'fa fa-linkedin'
    ),
  );
  echo "<ul class='list-inline'>";
  foreach ($social_icons as $slug => $social_icon) {
    echo '<li><a target="_blank" href="'.$social_icon['link'].'"><i class="'.$social_icon['icon'].'"></i></a></li>';
  }
  echo "</ul>";
