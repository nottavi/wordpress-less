module.exports = function(grunt) {
    
    require('load-grunt-tasks')(grunt);
    
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        
        jshint: {
            all: ['js/global.js', 'js/js-parts/*.js']
        },
        
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> */\n'
            },
            build: {
                src: ['js/plugins/*.js', 'js/global.js', 'js/js-parts/*.js'],
                dest: 'js/theme.min.js'
            }
        },
        
        watch: {
            css: {
                files: ['css/**/*.less'],
                tasks: ['less']
            },
            js: {
                files: ['js/**/*.js', '!js/theme.min.js'],
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
        },
        
        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    "css/theme.min.css": "css/less/style.less"
                }
            }
        }
    });
    
    grunt.registerTask('default', ['jshint', 'uglify']);
    
};