<?php

function pr($data) {
	echo '<pre>'; 
	print_r($data); 
	echo '</pre>';
}

function prd($data) {
	pr($data);
	die();
}

function getPath($str) {
	return str_replace("/", DIRECTORY_SEPARATOR, $str);
}

function isLinuxServer() {
	return DIRECTORY_SEPARATOR == '/';
}
