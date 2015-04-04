module.exports = {
   simple: {
      options: {
         removeComments: true
      },
      files: [{
         expand: true,
         src: ['core/emails/html/compiled/*.html'],
         dest: ''
      }]
   }
};
