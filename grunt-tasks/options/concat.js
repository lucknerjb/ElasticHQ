var grunt = require('grunt');

module.exports = {
   authentication_js: {
      options: {
         separator: grunt.util.linefeed + ';' + grunt.util.linefeed,
         stripBanners: false
      },
      src: [
         'resources/assets/shared/js/jquery/jquery-1.11.1.js',
         'resources/assets/shared/js/bootstrap.min.js',
      ],
      dest: 'build/authentication.js'
   },

   login_css: {
      src: [
         'resources/assets/dashboard/css/bootstrap/bootstrap.css',
         'resources/assets/dashboard/css/bootstrap/bootstrap-overrides.css',
         'resources/assets/dashboard/css/compiled/layout.css',
         'resources/assets/dashboard/css/compiled/elements.css',
         'resources/assets/dashboard/css/compiled/icons.css',
         'resources/assets/dashboard/css/lib/font-awesome.css',
         'resources/assets/dashboard/css/compiled/signin.css'
      ],
      dest: 'build/login.css'
   },

   register_css: {
      src: [
         'resources/assets/dashboard/css/bootstrap/bootstrap.css',
         'resources/assets/dashboard/css/bootstrap/bootstrap-overrides.css',
         'resources/assets/dashboard/css/compiled/layout.css',
         'resources/assets/dashboard/css/compiled/elements.css',
         'resources/assets/dashboard/css/compiled/icons.css',
         'resources/assets/dashboard/css/lib/font-awesome.css',
         'resources/assets/dashboard/css/compiled/signup.css'
      ],
      dest: 'build/register.css'
   },

   website_js: {},

   website_css: {},

   dashboard_js: {
      options: {
         separator: grunt.util.linefeed + ';' + grunt.util.linefeed,
         stripBanners: false
      },
      src: [
         'resources/assets/shared/js/jquery/jquery-1.11.1.js',
         'resources/assets/shared/js/bootstrap.min.js',
         'resources/assets/dashboard/js/theme.js',
      ],
      dest: 'build/dashboard.js'
   },

   dashboard_css: {
      src: [
         'resources/assets/dashboard/css/bootstrap/bootstrap.css',
         'resources/assets/dashboard/css/bootstrap/bootstrap-overrides.css',
         'resources/assets/dashboard/css/compiled/layout.css',
         'resources/assets/dashboard/css/compiled/elements.css',
         'resources/assets/dashboard/css/compiled/icons.css',
         'resources/assets/dashboard/css/lib/font-awesome.css',
         'resources/assets/dashboard/css/compiled/theme.css'
      ],
      dest: 'build/dashboard.css'
   },
};
