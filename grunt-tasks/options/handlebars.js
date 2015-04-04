module.exports = {
   students: {
      files: {
         'build/student-templates.js': [ 'dashboard/modules/students/templates/**/*.hbs' ]
      },
      options: {
         namespace: 'SPTemplates',
         processName: function(filePath) {
            return filePath.replace(/^dashboard\/modules\/students\/templates\//, '').replace(/\.hbs$/, '');
         }
      }
   },

   shared: {
      files: {
         'build/shared-templates.js': [ 'dashboard/modules/shared/templates/**/*.hbs' ]
      },
      options: {
         namespace: 'SPTemplates',
         processName: function(filePath) {
            return filePath.replace(/^dashboard\/modules\/shared\/templates\//, '').replace(/\.hbs$/, '');
         }
      }
   }
};
