<form class="inline-search-form" role="search" method="get" id="searchform" action="<?php bloginfo('url');?>">
  <div class="input-group add-on">
    <input class="form-control" placeholder="Search for churches or articles" name="s" id="s" type="text" value="<?php _e( get_search_query() );?>" />
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">SEARCH</button>
    </div>
  </div>
</form>
