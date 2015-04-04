module.exports = function(grunt) {
   grunt.registerTask('assets:authentication',
   [
      'concat:authentication_css',
      'concat:authentication_js',
      'copy:authentication_css',
      'copy:authentication_js',
   ]);
};
