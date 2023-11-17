import { defineConfig } from 'vite'
import { splitVendorChunkPlugin } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [/*splitVendorChunkPlugin(),*/ react()],
  build: {
    // generate .vite/manifest.json in outDir
    manifest: true,
    rollupOptions: {
      // overwrite default .html entry
      input: {
        main: '/src/main.jsx',
        default: '/src/themes/default/index.js',
        colorize: '/src/themes/colorize/index.js',
      }
    },
  },  
})
