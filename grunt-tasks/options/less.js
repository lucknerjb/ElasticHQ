module.exports = {
   dashboard: {
      expand: true,
      cwd: 'app/assets/dashboard/less/',
      src: ['*.less'],
      dest: 'build/css/dashboard/',
      ext: '.css',
      flatten: true
   },

   public_profile: {
      expand: true,
      cwd: 'app/assets/public_profile/less/',
      src: ['*.less'],
      dest: 'build/css/public_profile/',
      ext: '.css',
      flatten: true
   }
};
