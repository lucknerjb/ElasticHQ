module.exports = function(grunt) {
   grunt.registerTask('build:students:dev',
   [
      'build:students',
      'watch'
   ]);
};
