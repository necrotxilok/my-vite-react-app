import { create } from '@storybook/theming/create'

import Logo from './assets/MyViteReactAppLogo.png'

export default create({
  base: 'dark',
  brandTitle: 'My Vite React App',
  //brandUrl: 'https://example.com',
  brandImage: Logo,
  brandTarget: '_self',
})
