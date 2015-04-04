module.exports = {
   website: {
      options: { mangle: false },
      files: { 'build/website.min.js': ['build/website.js'] }
   },

   dashboard: {
      options: { mangle: false },
      files: { 'build/dashboard.min.js': 'build/dashboard.js' }
   },

   authentication: {
      options: { mangle: false },
      files: { 'build/authentication.min.js': 'build/authentication.js' }
   },

   student_profile: {
      options: { mangle: false },
      files: { 'build/student-profile.min.js': 'build/student-profile.js' }
   },

   students_tour: {
      options: { mangle: false },
      files: { 'build/students-tour.min.js': 'build/students-tour.js' }
   }
};
