module.exports = function(grunt) {
   grunt.registerTask('assets:production',
   [
      // Re-build all the assets
      'assets:dev',

      // Minify CSS
      'cssmin:website_css',
      'cssmin:authentication_css',
      'cssmin:dashboard_css',

      // Uglify JS
      'concurrent:uglify_production',

      // Copy min files
      'copy:website_css_min',
      'copy:website_js_min',
      'copy:authentication_css_min',
      'copy:authentication_js_min',
      'copy:dashboard_css_min',
      'copy:dashboard_js_min',
      'copy:student_profile_js_min',
      'copy:students_tour_js_min'
   ]);
};
