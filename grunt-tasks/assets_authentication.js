module.exports = function(grunt) {
   grunt.registerTask('assets:authentication',
   [
      'concat:login_css',
      'concat:register_css',
      'concat:authentication_js',
      'copy:login_css',
      'copy:register_css',
      'copy:authentication_js',
   ]);
};
