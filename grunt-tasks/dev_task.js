module.exports = function(grunt) {
   grunt.registerTask('dev',
   [
      'assets:dev',
      'watch:dev'
   ]);
};
