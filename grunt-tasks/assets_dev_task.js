module.exports = function(grunt) {
   grunt.registerTask('assets:dev',
   [
      'assets:website',
      'assets:authentication',
      'assets:dashboard',
      'newer:copy:images_shared',
      'newer:copy:images_dashboard'
   ]);
};
