import { themes } from '@storybook/theming'

//import "../src/app/app.css"
import defaultTheme from "../src/themes/default/default"
import colorizeTheme from "../src/themes/colorize/colorize"

const themeDecorator = (Story, context) => {
  delete window.MainTheme
  const bg = context.globals.backgrounds.value
  if (bg == defaultTheme.backgroundColor) {
    window.MainTheme = defaultTheme
  }
  if (bg == colorizeTheme.backgroundColor) {
    window.MainTheme = colorizeTheme
  }
  // Get App MainTheme
  for (var bodyClass of document.body.classList) { 
    if (bodyClass.endsWith('-theme')) {
      document.body.classList.remove(bodyClass)
    }
  }
  if (window.MainTheme) {
    const theme = window.MainTheme
    document.body.classList.add(theme.name + '-theme')
  } else {
    console.error('No Theme Loaded')
  }  
  return Story()
}

const preview = {
  parameters: {
    actions: { argTypesRegex: "^on[A-Z].*" },
    controls: {
      matchers: {
        color: /(background|color)$/i,
        date: /Date$/i,
      },
    },
    docs: {
      theme: themes.dark,
    },
    backgrounds: {
      default: 'none',
      values: [
        //{ name: 'light', value: '#f8f8f8' },
        //{ name: 'dark', value: '#333333' },
        { name: 'none', value: '#222222' },
        { name: 'default', value: defaultTheme.backgroundColor },
        { name: 'colorize', value: colorizeTheme.backgroundColor },
      ],
    },
  },
  decorators: [themeDecorator],
}

export default preview
