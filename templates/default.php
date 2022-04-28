<?php

/*

type: layout

name: Default

description: Default

*/
?>
<script>
  mw.require("<?php print $config['url_to_module']; ?>domain_checker.css", true);
  mw.lib.require('fontAwesome');
</script>
<div id="<?php print $domain_checker_id; ?>" class="domain_checker-module" role="note">
  <div class="edit safe-mode nodrop" data-field="domain_checker_text" rel="domain_checker_module" data-id="<?php print $domain_checker_id; ?>" <?php print $attributes; ?>>
    <h2><?php _e('Check your preferred domain availability.'); ?></h2>
  </div>
</div>

<form action="" method="GET" class="domain-checker-form m-t-40">
  <div class="input-group">
    <input id="dc-searchBar" aria-describedby="dc-searchBarButton" class="form-control search-field m-0" type="text" name="domain" placeholder="<?php _e('Search domain name (include an extention)...'); ?>" aria-label="<?php _e('Search domain name'); ?>" value="<?php if (isset($_GET['domain'])) {
                                                                                                                                                                                                                                                                        echo $_GET['domain'];
                                                                                                                                                                                                                                                                      } ?>">
    <button type="submit" id="dc-searchBarButton" class="btn <?php print $type; ?> m-0 dc-searchBarButton" style="border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important;"><?php if ($type != "btn-search") {
                                                                                                                                                                                                    _e('Check availability');
                                                                                                                                                                                                  } else {
                                                                                                                                                                                                    echo "<i class='fa fa-search'></i>";
                                                                                                                                                                                                  } ?></button>
  </div>
</form>
<?php
error_reporting(0);
if (isset($_GET['domain'])) {
  $domain = $_GET['domain'];
  if (gethostbyname($domain) != $domain) {
    print("<h5 class='dc-result dc-fail'>");
    _e('This domain is unavailable. ');
    print("</h5>");
    print("<a href='https://www.whois.com/whois/" . $_GET['domain'] . "' target='_blank'>");
    _e('Click here for more information.');
    print("</a>");
  } else {
    print("<h5 class='dc-result dc-success'>");
    _e('This domain is available! Contact us to register it.');
    print("</h5>");
  }
}
?>