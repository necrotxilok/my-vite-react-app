<?php

define('PROD_DIST_DIR', '../dist');

$manifest = null;

function loadManifest() {
	global $manifest;
	$assetsDir = getPath(getcwd().'/assets');
	if (file_exists($assetsDir)) {
		if (isLinuxServer()) {
			// Linux Server
			exec("rm -rf $assetsDir");
		} else {
			// windows Server
			exec("rmdir /Q /S $assetsDir");
		}
	}
	$assetsOrigin = getPath(PROD_DIST_DIR.'/assets');
	if (file_exists($assetsOrigin)) {
		mkdir($assetsDir);
		if (isLinuxServer()) {
			// Linux Server
			exec("cp $assetsOrigin/* $assetsDir");
		} else {
			// windows Server
			exec("xcopy $assetsOrigin\\* $assetsDir");
		}
	}
	$manifestFile = getPath(PROD_DIST_DIR.'/manifest.json');
	if (file_exists($manifestFile)) {
		$manifest = json_decode(file_get_contents($manifestFile), true);
	}
	if (empty($manifest)) {
		die('Unable to find <b>manifest.json</b> to load scripts!');
	}
	if (empty($manifest['src/main.jsx'])) {
		die('Invalid <b>manifest.json</b> to load scripts!');
	}
	//prd($manifest);
}

function getDependencies($dep) {
	global $manifest;
	$styles = [];
	$scripts = [];
	if (!empty($manifest[$dep]['file'])) {
		if (!empty($manifest[$dep]['imports'])) {
			foreach($manifest[$dep]['imports'] as $import) {
				$dependencies = getDependencies($import);
				$styles = array_merge($dependencies['styles'], $styles);
				$scripts = array_merge($dependencies['scripts'], $scripts);
			}
		}
		$scripts[] = $manifest[$dep]['file'];
		if (!empty($manifest[$dep]['css'])) {
			foreach($manifest[$dep]['css'] as $css) {
				$styles[] = $css;
			}
		}
	}
	return [
		'styles' => $styles,
		'scripts' => $scripts
	];
}

function loadMain() {
	return getDependencies('src/main.jsx');
}

function loadTheme($themeName) {
	return getDependencies('src/themes/' . $themeName . '/index.js');
}
