module.exports = function(grunt) {
   grunt.registerTask('assets:website',
   [
      'concat:website_css',
      'concat:website_js',
      'copy:website_css',
      'copy:website_js'
   ]);
};
