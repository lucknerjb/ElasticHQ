module.exports = {
   // Regular JS files for DEV
   authentication_js: {
      src: 'build/authentication.js',
      dest: 'public/assets/js/authentication.js'
   },

   login_css: {
      src: 'build/login.css',
      dest: 'public/assets/css/login.css'
   },

   register_css: {
      src: 'build/register.css',
      dest: 'public/assets/css/register.css'
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

   dashboard_css: {
      src: 'build/dashboard.css',
      dest: 'public/assets/css/dashboard.css'
   },

   // Minified files for PROD
   authentication_min_js: {
      src: 'build/authentication.min.js',
      dest: 'public/assets/js/authentication.min.js'
   },

   login_min_css: {
      src: 'build/login.min.css',
      dest: 'public/assets/css/login.min.css'
   },

   register_min_css: {
      src: 'build/register.min.css',
      dest: 'public/assets/css/register.min.css'
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

   dashboard_min_css: {
      src: 'build/dashboard.min.css',
      dest: 'public/assets/css/dashboard.min.css'
   },

   // Generic files
   dashboard_fonts: {
      expand: true,
      cwd: 'core/src/css/dashboard/vendor/fontawesome/fonts',
      src: ['*.*'],
      dest: 'public/fonts/dashboard'
   },

   images_shared: {
      expand: true,
      cwd: 'resources/assets/shared/img',
      src: ['**/*'],
      dest: 'public/img/shared'
   },

   images_dashboard: {
      expand: true,
      cwd: 'resources/assets/dashboard/img',
      src: ['**/*'],
      dest: 'public/assets/img/dashboard'
   }
};
