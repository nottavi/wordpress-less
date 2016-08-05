module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    jshint: {
      all: ['js/main.js']
    },

    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd HH:MM") %> */\n'
      },
      build: {
        src: ['js/plugins/*.js', 'js/main.js'],
        dest: 'js/main.min.js'
      }
    },

    watch: {
      js: {
        files: ['js/**/*.js', '!js/main.min.js'],
        tasks: ['jshint', 'uglify']
      }
    },

    imagemin: {
      dist: {
        files: [{
          expand: true,
          cwd: 'img/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'img/'
        }]
      }
    }
  });

  grunt.registerTask('default', ['jshint', 'uglify']);

};