module.exports = function(grunt) {

	const sass = require('node-sass');
	//require('load-grunt-tasks')(grunt);


	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		//paths
		paths: {
			localhostPath : 'localhost/weekafter/public',
			app: '',
			dist: 'public/site/templates',
			app_css: 'css',
			app_js: 'js',
			source_scss: 'sass'
		},

		sass: {
			dev: {
				options: {
					implementation: sass,
					outputStyle: 'expanded',
					sourceMap: false
				},
				files: {
					'<%= paths.dist %>/styles/main.css' : '<%= paths.source_scss %>/bulma.scss'
				}
			}
		},

		/*bower: {
			dev: {
				dest: '<%= paths.source_bower %>',
				js_dest: '<%= paths.source_bower %>/js',
				css_dest: '<%= paths.source_bower %>/css',
			}
		},*/

		browserSync: {
			files: {
				src: [
					'<%= paths.dist %>/*.html',
					'<%= paths.dist %>/*.php',
					'<%= paths.dist %>/inc/*.php',
					'<%= paths.dist %>/**/*.css'
					]
			},
			options: {
				proxy: '<%= paths.localhostPath %>',
				watchTask: true
			}
		},

		watch: {
			sass: {
				files: ['<%= paths.source_scss %>/*.scss'],
				tasks: ['sass:dev']
				//tasks: ['sass:dev', 'concat:css']
			}
		},

		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: '<%= paths.dist %>/styles',
					src: ['*.css', '!*.min.css'],
					dest: '<%= paths.dist %>/styles',
					ext: '.min.css'
				}]
			}
		}
		/*uncss: {
		    dist: {
		        files: {
		            'dist/css/tidy.css': ['/folio', '/news' , '/contact']
		        }
		    }
		}*/

	});

	//load dependencies
	grunt.loadNpmTasks('grunt-browser-sync');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	//grunt.loadNpmTasks('grunt-bower');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	//grunt.loadNpmTasks('grunt-uncss');

	//defaul task
	grunt.registerTask('default', ['browserSync', 'watch']);
	//grunt.registerTask('default', ['cssmin', 'browserSync', 'watch']);
	//grunt.registerTask('cssmin');

	//build
	/*install first
	npm grunt-contrib-clean --save-dev
	npm grunt-contrib-copy --save-dev
	npm grunt-contrib-imagemin --save-dev
	*/
	// grunt.registerTask('build', ['clean:dist', 'copy', 'imagemin', 'ecc']);
	
};
