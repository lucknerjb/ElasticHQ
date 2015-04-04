module.exports = {
   // Regular JS files for DEV
   authentication_js: {
      src: 'build/authentication.js',
      dest: 'public/assets/js/authentication.js'
   },

   authentication_css: {
      src: 'build/authentication.css',
      dest: 'public/assets/css/authentication.css'
   },

   website_js: {
      src: 'build/website.js',
      dest: 'public/assets/js/website.js'
   },

   website_css: {
      src: 'build/website.css',
      dest: 'public/assets/css/website.css'
   },

   dashboard_js: {
      src: 'build/dashboard.js',
      dest: 'public/assets/js/dashboard.js'
   },

   dashboard_top_js: {
      src: 'build/dashboard_top.js',
      dest: 'public/assets/js/dashboard_top.js'
   },

   dashboard_css: {
      src: 'build/dashboard.css',
      dest: 'public/assets/css/dashboard.css'
   },

   // Minified files for PROD
   authentication_min_js: {
      src: 'build/authentication.min.js',
      dest: 'public/assets/js/authentication.min.js'
   },

   authentication_min_css: {
      src: 'build/authentication.min.css',
      dest: 'public/assets/css/authentication.min.css'
   },

   website_min_js: {
      src: 'build/website.min.js',
      dest: 'public/assets/js/website.min.js'
   },

   website_min_css: {
      src: 'build/website.min.css',
      dest: 'public/assets/css/website.min.css'
   },

   dashboard_min_js: {
      src: 'build/dashboard.min.js',
      dest: 'public/assets/js/dashboard.min.js'
   },

   dashboard_top_min_js: {
      src: 'build/dashboard_top.min.js',
      dest: 'public/assets/js/dashboard_top.min.js'
   },

   dashboard_min_css: {
      src: 'build/dashboard.min.css',
      dest: 'public/assets/css/dashboard.min.css'
   },

   // Generic files
   dashboard_fonts: {
      expand: true,
      cwd: 'resources/assets/dashboard/fonts',
      src: ['*.*'],
      dest: 'public/assets/fonts/dashboard'
   },

   images_dashboard: {
      expand: true,
      cwd: 'resources/assets/dashboard/img',
      src: ['**/*'],
      dest: 'public/assets/img/dashboard'
   }
};
