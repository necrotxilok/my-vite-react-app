import React from 'react'
import { createRoot } from 'react-dom/client'
import App from './app'

// Get App MainTheme
if (window.MainTheme) {
	const theme = window.MainTheme
	console.log(theme)
	document.body.classList.add(theme.name + '-theme')
} else {
	console.error('No Theme Loaded')
}

// Start React Application
console.log('Starting My Pure React App...')

const container = document.getElementById('root')
const root = createRoot(container)
root.render(
	<React.StrictMode>
		<App/>
	</React.StrictMode>
)
