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
	<!-- Development Scripts -->
	<script type="module">
		import RefreshRuntime from 'http://localhost:5173/@react-refresh'
		RefreshRuntime.injectIntoGlobalHook(window)
		window.$RefreshReg$ = () => {}
		window.$RefreshSig$ = () => (type) => type
		window.__vite_plugin_react_preamble_installed__ = true
	</script>	
	<script type="module" src="http://localhost:5173/@vite/client"></script>
	<script type="module" src="http://localhost:5173/src/themes/colorize/index.js"></script>
	<script type="module" src="http://localhost:5173/src/main.jsx"></script>
</head>
<body>
	<div id="root"></div>
	<!--<?="Running in DEVELOPMENT Mode!"?>-->
</body>
</html>