<?php
# The template for displaying search form.
?>
<form role="search" method="get" class="homeSearchForm" action="<?php echo home_url('/'); ?>">
    <input type="search" class="homeSearchField" placeholder="Site search" value="<?php echo get_search_query() ?>" name="s" />
    <input type="image" class="homeSearchButton" src="https://www.emilgadzhiyev.me/wp-content/themes/emilgadzhiyev/assets/svg/search.svg">
</form>