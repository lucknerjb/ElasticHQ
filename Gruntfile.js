function loadConfig(path) {
   var glob = require('glob');
   var object = {};
   var key;

   glob.sync('*', {cwd: path}).forEach(function(option) {
      key = option.replace(/\.js$/,'');
      object[key] = require(path + option);
   });

  return object;
}

module.exports = function(grunt) {
   grunt.loadTasks('grunt-tasks');

   require('time-grunt')(grunt);
   // Only load tasks when they are needed
   require('jit-grunt')(grunt, {
      ngtemplates: 'grunt-angular-templates'
   });

   var config = {
      pkg: grunt.file.readJSON('package.json'),
      env: process.env
   };

   grunt.util._.extend(config, loadConfig('./grunt-tasks/options/'));
   grunt.initConfig(config);
};

// module.exports = function(grunt) {
//    require('time-grunt')(grunt);
//    // Only load tasks when they are needed
//    require('jit-grunt')(grunt);

//    // Configuration
//    grunt.initConfig({
//       pkg: grunt.file.readJSON('package.json'),
//       dirs: {
//          dist: 'dist',
//          build: 'build',
//          bower: 'bower_components'
//       },
//       src: {},
//       scripts_dir: '/home/deployer/scripts/',
//       release_dirname: new Date().getTime(),
//       repos: {
//          scripts: 'git@github.com:showkasepad/scripts.git'
//       },



//    // ###########################################################################################
//    // ######################### REGISTER TASKS
//    // ###########################################################################################











//    //
//    grunt.registerTask('copy:templates:public', [
//       'copy:public_student_templates',
//       'copy:public_shared_templates'
//    ]);


//    //
//    grunt.registerTask('production:build',
//    [
//       // Clean Build and Release dirs
//       'clean:build',
//       'clean:release',

//       // Concat Dashboard Assets
//       'concat:dashboard_js',
//       'concat:dashboard_css',

//       // Concat Frontend + Auth Assets
//       'concat:website_css',
//       'concat:website_js',
//       'concat:authentication_js',

//       // Convert Dashboard jade files
//       // 'jade:production',

//       // Minify JS
//       'uglify:production',

//       // Minify CSS
//       'cssmin:production',

//       // Cache bust JS

//       // Cache bust CSS

//       // Deploy

//       // Update version in package.json & Push deploy commit
//       // 'grunt bump'
//    ]);

//    grunt.registerTask('func:getNextVersionNumber', function() {
//       // Get the current version number
//       var version = grunt.file.readJSON("package.json")['version'];

//       // Update the version number
//    });

//    grunt.registerTask('emails', ['assemble','premailer']);
// };
