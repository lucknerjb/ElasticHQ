module.exports = {
   students: {
      options: { bare: true },
      expand: true,
      cwd: 'dashboard/modules/students',
      src: ['**/*.coffee'],
      dest: 'build/coffee/students/',
      ext: '.js'
   },

   shared: {
      options: { bare: true },
      expand: true,
      cwd: 'dashboard/modules/shared',
      src: ['**/*.coffee'],
      dest: 'build/coffee/shared/',
      ext: '.js'
   },
};

// module.exports = {
//    students: {
//       // options: {
//       //    bare: true,
//       //    sourceMap: true,
//       //    expand: true
//       // },
//       bare: true,
//       // sourceMap: true,
//       // expand: true,
//       // cwd: 'dashboard/students',
//       src: ['dashboard/students/**/*.coffee'],
//       // src: ['dashboard/students/*.coffee'],
//       dest: ['build/coffee/test.js'],
//       // ext: '.js'
//    }
// };
