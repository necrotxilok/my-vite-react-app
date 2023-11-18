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

	$devMode = true;
	if (!empty($_GET['mode'])) {
		$modeName = $_GET['mode'];
		if (strtolower($modeName) == 'prod') {
			$devMode = false;
			$assetsDir = __DIR__.'/assets';
			$assetsOrigin = __DIR__.'/../dist/assets';
			if (file_exists($assetsDir)) {
				rmdir($assetsDir);	
			}
			if (file_exists($assetsOrigin)) {
				symlink($assetsOrigin, $assetsDir);
			}
			$manifestFile = __DIR__.'/../dist/manifest.json';
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
			$main = getDependencies('src/main.jsx');
			//prd($main);
		}
	}

	if (!empty($_GET['theme'])) {
		$themeName = $_GET['theme'];
		if (!in_array($themeName, ['default', 'colorize'])) {
			die('Invalid theme <b>' . $themeName . '</b>!');
		}
		if (!$devMode) {
			$theme = getDependencies('src/themes/' . $themeName . '/index.js');
			//prd($theme);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<link rel="icon" type="image/svg+xml" href="img/vite.svg" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="theme-color" content="#000000" />
	<meta name="description" content="React App + Vite."/>
	<link rel="apple-touch-icon" href="img/logo192.png" />
	<link rel="manifest" href="manifest.json" />

	<title>My Vite React App</title>

<?php if ($devMode) { ?>
	<!-- Development Scripts -->
	<script type="module">
		import RefreshRuntime from 'http://localhost:5173/@react-refresh'
		RefreshRuntime.injectIntoGlobalHook(window)
		window.$RefreshReg$ = () => {}
		window.$RefreshSig$ = () => (type) => type
		window.__vite_plugin_react_preamble_installed__ = true
	</script>	
	<script type="module" src="http://localhost:5173/@vite/client"></script>
<?php if (!empty($themeName)) { ?>
	<script type="module" src="http://localhost:5173/src/themes/<?=$themeName?>/index.js"></script>
<?php } ?>
	<script type="module" src="http://localhost:5173/src/main.jsx"></script>
<?php } else { ?>
	<!-- Production Scripts -->
<?php if (!empty($theme)) { ?>
<?php foreach ($theme['styles'] as $style) { ?>
	<link rel="stylesheet" href="<?=$style?>" />
<?php } ?>
<?php foreach ($theme['scripts'] as $script) { ?>
	<script type="module" src="<?=$script?>"></script>
<?php } ?>
<?php } ?>
<?php foreach ($main['styles'] as $style) { ?>
	<link rel="stylesheet" href="<?=$style?>" />
<?php } ?>
<?php foreach ($main['scripts'] as $script) { ?>
	<script type="module" src="<?=$script?>"></script>
<?php } ?>
<?php } ?>
</head>
<body>
	<div id="root"></div>
<?php if ($devMode) { ?>
	<!--<?="Running in DEV Mode"?>-->
<?php } else { ?>
	<!--<?="Running in PROD Mode"?>-->
<?php } ?>
</body>
</html>