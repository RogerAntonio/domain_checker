<?php
$domain_checker_id = $params['id'];

$domain_checker_options = [];
$domain_checker_options['btn_type'] = '';
$domain_checker_options['domain_checker_id'] = '';

$get_domain_checker_options = get_module_options($params['id']);
if (!empty($get_domain_checker_options)) {
  foreach ($get_domain_checker_options as $get_domain_checker_option) {
    $domain_checker_options[$get_domain_checker_option['option_key']] = $get_domain_checker_option['option_value'];
  }
}

$type = $domain_checker_options['btn_type'];

if (isset($params['domain_checker_id'])) {
  $domain_checker_id = $params['domain_checker_id'];
}

$attributes = '';
if (isset($params['domain_checker_onclick'])) {
  $attributes .= 'onclick="' . $params['domain_checker_onclick'] . '"';
}

if ($type == false and isset($params['btn_type'])) {
  $type = $params['btn_type'];
}
if ($type == '') {
  $type = 'btn-primary';
}

$module_template = get_option('data-template', $params['id']);
if ($module_template == false and isset($params['template'])) {
  $module_template = $params['template'];
}
if ($module_template != false) {
  $template_file = module_templates($config['module'], $module_template);
} else {
  $template_file = module_templates($config['module'], 'default');
}

if (is_file($template_file) != false) {
  include($template_file);
} else {
  print lnotif("No template found. Please choose a template.");
}
