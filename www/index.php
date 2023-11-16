<!DOCTYPE html>
<html>
<head>
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
	<script type="module" src="http://localhost:5173/src/main.jsx"></script>	
</head>
<body>
	<div id="root"></div>
	<!--<?="Running in DEVELOPMENT Mode!"?>-->
</body>
</html>