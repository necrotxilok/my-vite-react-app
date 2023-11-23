import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  publicDir: false,
  build: {
    outDir: './dist-ui',
    minify: true,
    rollupOptions: {
      external: ['react', 'react/jsx-runtime'],
    },
    lib: {
      entry: './src/components/index.js',
      formats: ['es'],
      fileName: 'components',
    },
  },  
})
