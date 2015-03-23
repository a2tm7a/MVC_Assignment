<?php

require_once __DIR__."/../vendor/autoload.php";

Toro::serve(array(
	"/" => "Controllers\\HomeController",
	"/signin"=>"Controllers\\SignIn",
	"/signup"=>"Controllers\\Signup",
	"/display"=>"Controllers\\Display",
	"/display_user_notifications"=>"Controllers\\Display_user_notifications",
	"/logout"=>"Controllers\\Logout",
	"/callingmodelajax"=>"Controllers\\CallingModelAjax"
	
	));