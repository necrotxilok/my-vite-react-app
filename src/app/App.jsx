import React, { useEffect, useState } from 'react'

// Import from UI Components Source
import Button from '../components/button'

// Import from UI Components Library
/*
import '../../dist-ui/style.css'
import { Button } from '../../dist-ui/components'
*/

import './app.css'

export default function App(props) {
	const theme = window.MainTheme || {}
	const [counter, setCounter] = useState(0)

	useEffect(() => {
		// Component Did Mount
		console.log('Hello World App! :)')
	}, [])
	
	return (
		<div 
			id='app'
			style={{
				backgroundImage: theme.backgroundImage ? 'url(' + theme.backgroundImage + ')' : ''
			}}
		>
			<div>
				{theme.logoImage && <img src={theme.logoImage} alt="mainlogo"/>}
				<h1>{theme.title || "Hello World!"}</h1>
				<Button 
					label={"Clicker " + counter}
					onClick={() => {
						setCounter(counter + 1)
					}}
				/>
			</div>
		</div>
	)
}
