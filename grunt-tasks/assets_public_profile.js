module.exports = function(grunt) {
   grunt.registerTask('assets:public_profile',
   [
      'less:public_profile',
      'concat:public_profile_css',
      'copy:public_profile_css',
   ]);
};
