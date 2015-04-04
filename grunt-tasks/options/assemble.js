module.exports = {
   options: {
      layoutdir: 'core/emails/html/src/layouts',
      flatten: true
   },
   pages: {
      src: ['core/emails/html/src/*.hbs'],
      dest: 'core/emails/html/compiled'
   }
};
