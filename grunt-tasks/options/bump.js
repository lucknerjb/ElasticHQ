module.exports = function(grunt) {
   return {
      options: {
         files: ['package.json'],
         updateConfigs: ['pkg'],
         commit: true,
         commitMessage: 'Release v%VERSION%',
         commitFiles: ['package.json'],
         createTag: true,
         tagName: 'v%VERSION%',
         tagMessage: 'Version %VERSION%',
         push: true,
         // If we use "upstream", we'd have to configure that after every git clone that we do.
         // Instead, dynamically set the remote branch
         pushTo: grunt.option('pushTo') || 'origin master',
         gitDescribeOptions: '--tags --always --abbrev=1 --dirty=-d',
         globalReplace: false
      }
   };
};
