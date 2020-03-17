<?php
/*
Plugin Name: PaginasWebPe - Custom fields
Plugin URI: http://paginasweb.pe/
Description: Remove unnecesary fields from billing/shipping
Version: 1.0.0
Author: Oscar Alderete
Author URI: http://paginasweb.pe/
*/
require 'classes/PWP_OverrideCheckoutFields.php';

$PWP_OverrideCheckoutFields=new PWP_OverrideCheckoutFields();
$PWP_OverrideCheckoutFields->init();