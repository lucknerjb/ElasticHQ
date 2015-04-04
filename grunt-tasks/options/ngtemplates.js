module.exports = {
   students: {
      cwd: 'app/assets/src/students',
      src: 'templates/**/*.html',
      dest: 'build/students.templates.js',
      options: {
         bootstrap: function(module, script) {
            return "angular.module('ShowkasePad').run(['$templateCache', function($templateCache) {" + script + '}]);';
         }
      }
   },

   shared: {
      cwd: 'app/assets/src/shared',
      src: 'templates/**/*.html',
      dest: 'build/shared.templates.js',
      options: {
         bootstrap: function(module, script) {
            return "angular.module('ShowkasePad').run(['$templateCache', function($templateCache) {" + script + '}]);';
         }
      }
   }
};
