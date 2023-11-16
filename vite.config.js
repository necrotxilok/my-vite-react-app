import { defineConfig } from 'vite'
import { splitVendorChunkPlugin } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [/*splitVendorChunkPlugin(),*/ react()],
  /*build: {
     // generate sourceMaps on build
    sourcemap: true
  }*/
  build: {
    // generate .vite/manifest.json in outDir
    manifest: true
  },  
})
