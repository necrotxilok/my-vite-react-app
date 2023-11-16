
import DefaultTheme from '@themes/default'
import './colorize.css'

const ColorizeTheme = {
	name: "colorize",

	// Title
	title: "Colorize your lifestyle!",

	// Colors
	backgroundColor: "#b10eae",
	color: "#fff",
	primaryColor: "#db22e1",

	// Images
	logoImage: 'img/colorize_logo.png',
	backgroundImage: 'img/colorize_bg.jpg',
}

export default Object.assign({}, DefaultTheme, ColorizeTheme)
