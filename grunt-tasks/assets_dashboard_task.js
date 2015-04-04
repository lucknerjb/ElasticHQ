module.exports = function(grunt) {
   grunt.registerTask('assets:dashboard',
   [
      'copy:images_dashboard',
      'concat:dashboard_js',
      'concat:dashboard_css',
      'copy:dashboard_js',
      'copy:dashboard_css',
      // 'concat:dashboard_js',
      // 'concat:students_profile_app_js',
      // 'concat:student_profile_js',
      // 'less:dashboard',
      // 'concat:dashboard_css',
      // 'copy:dashboard_js',
      // 'copy:student_profile_js',
      // 'copy:students_profile_app_js',
      // 'copy:dashboard_css',
      // 'copy:dashboard_fonts',
      // 'copy:students_tour_build_js',
      // 'copy:students_tour_js',
   ]);
};
