module.exports = function(grunt) {
   grunt.registerTask('build:students',
   [
      'ngtemplates:shared',
      'ngtemplates:students',
      'concat:shared',
      'concat:students',
      'assets:dashboard',
      'newer:copy:dashboard_js',
      'newer:copy:dashboard_css',
      'newer:copy:authentication_css',
      'copy:students',
      'copy:public_student_templates',
      'copy:public_shared_templates',
   ]);
};
