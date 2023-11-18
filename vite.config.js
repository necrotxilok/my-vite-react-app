import { defineConfig } from 'vite'
import { splitVendorChunkPlugin } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [splitVendorChunkPlugin(), react()],
  build: {
    manifest: true,
    rollupOptions: {
      input: {
        main: 'src/main.jsx',
        default: 'src/themes/default/index.js',
        colorize: 'src/themes/colorize/index.js',
      }
    },
  },  
})
