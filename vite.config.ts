import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import usePHP from 'vite-plugin-php'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  plugins: [usePHP({ entry: ['vue.php'] }), vue(), vueDevTools()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
})
