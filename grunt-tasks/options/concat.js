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

   authentication_css: {
      src: [
         'resources/assets/dashboard/css/bootstrap.css',
         'resources/assets/dashboard/plugins/fontawesome/css/font-awesome.min.css',
         'resources/assets/dashboard/plugins/animo/animate+animo.css',
         'resources/assets/dashboard/css/app.css',
         'resources/assets/dashboard/css/common.css',
      ],
      dest: 'build/authentication.css'
   },

   dashboard_top_js: {
      options: {
         separator: grunt.util.linefeed + ';' + grunt.util.linefeed,
         stripBanners: false
      },
      src: [
         'resources/assets/dashboard/plugins/modernizr/modernizr.js',
         'resources/assets/dashboard/plugins/fastclick/fastclick.js',
      ],
      dest: 'build/dashboard_top.js'
   },

   website_js: {},

   website_css: {},

   dashboard_js: {
      options: {
         separator: grunt.util.linefeed + ';' + grunt.util.linefeed,
         stripBanners: false
      },
      src: [
         'resources/assets/dashboard/plugins/jquery/jquery.min.js',
         'resources/assets/dashboard/plugins/bootstrap/js/bootstrap.min.js',
         // 'resources/assets/dashboard/plugins/chosen/chosen.jquery.min.js',
         // 'resources/assets/dashboard/plugins/slider/js/bootstrap-slider.js',
         // 'resources/assets/dashboard/plugins/filestyle/bootstrap-filestyle.min.js',
         'resources/assets/dashboard/plugins/animo/animo.min.js',
         // 'resources/assets/dashboard/plugins/sparklines/jquery.sparkline.min.js',
         // 'resources/assets/dashboard/plugins/slimscroll/jquery.slimscroll.min.js',
         'resources/assets/dashboard/plugins/store/store+json2.min.js',
         // 'resources/assets/dashboard/plugins/screenfull/screenfull.min.js',
         // 'resources/assets/dashboard/plugins/flot/jquery.flot.min.js',
         // 'resources/assets/dashboard/plugins/flot/jquery.flot.tooltip.min.js',
         // 'resources/assets/dashboard/plugins/flot/jquery.flot.resize.min.js',
         // 'resources/assets/dashboard/plugins/flot/jquery.flot.pie.min.js',
         // 'resources/assets/dashboard/plugins/flot/jquery.flot.time.min.js',
         // 'resources/assets/dashboard/plugins/flot/jquery.flot.categories.min.js',
         'resources/assets/dashboard/plugins/jquery.serializejson/jquery.serializejson.js',
         'resources/assets/dashboard/js/app.js',
         'resources/assets/dashboard/js/custom.js',
      ],
      dest: 'build/dashboard.js'
   },

   dashboard_css: {
      src: [
         'resources/assets/dashboard/css/bootstrap.css',
         'resources/assets/dashboard/plugins/fontawesome/css/font-awesome.min.css',
         'resources/assets/dashboard/plugins/animo/animate+animo.css',
         'resources/assets/dashboard/plugins/csspinner/csspinner.min.css',
         'resources/assets/dashboard/css/app.css',
      ],
      dest: 'build/dashboard.css'
   },
};
