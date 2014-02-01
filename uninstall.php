<?php 

if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit();
}

$_ENV['ORBISIUS_DIGISHOP_TEST'] = 1;

require_once(dirname(__FILE__) . '/orbisius-cyberstore.php');

$orbisius_digishop_obj = Orbisius_CyberStore::get_instance();
$orbisius_digishop_obj->on_uninstall();
