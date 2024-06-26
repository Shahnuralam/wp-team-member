<?php
/*
Plugin Name: Team Member
Plugin URI: https://www.linkedin.com/in/alamshahnur/
Description: object oriented programming base  wordpress  plugin  build for  Orbit Tecnologies
Author: Shahnur Alam
Version: 1.0.0
Author URI: 
*/
if (!defined('WPINC')) {
    die;
}

define('TM_CPT_PLUGIN_DIR', trailingslashit(dirname(__FILE__)));

require plugin_dir_path(__FILE__) . 'includes/class-team-member-cpt.php';
require plugin_dir_path(__FILE__) . 'includes/class-post-type-register.php';
require plugin_dir_path(__FILE__) . 'includes/class-cpt-metaboxes.php';
require plugin_dir_path(__FILE__) . 'includes/class-cpt-frontend.php';


$cpt_register = new TeamMemberRegister;
$cpt_register->init();



$post_type = new TeamMember($cpt_register);
register_activation_hook(__FILE__, array($post_type, 'activate'));


$metaboxes = new TeamMemberMetaboxes;
$metaboxes->init();

$metaboxes = new TeamMemberFrontend;
$metaboxes->init();



