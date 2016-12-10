/*
  loading stuff
*/


var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var watch = require('gulp-watch');
var changed = require('gulp-changed');
// var jade = require('gulp-jade');
// var jade = require('gulp-jade-php');
var prettify = require('gulp-html-prettify');
//var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
// var gulpif = require('gulp-if');
// var data = require('gulp-data');
var autoprefixer = require('gulp-autoprefixer');
// var changed = require('gulp-changed');
var coffee = require('gulp-coffee');
// var nodemon = require('gulp-nodemon');
var livereload = require('gulp-livereload');
var deleteLines = require('gulp-delete-lines');
var insert = require('gulp-insert');
var copy = require('gulp-copy');


// var argv = require('yargs').argv;
// var isDevelopment = !argv.production;

// var dummybesin = require('./models/besin').model;

/*

  defining variables

*/

var srcFolder = './src';
var src = {
  php: './*.php',
  views: './views/**/*.jade',
  js: srcFolder + '/js/**/*.js',
  templates: srcFolder + '/templates/**/*.jade',
  lib: srcFolder + '/lib/**/*.php',
  coffee: srcFolder + '/coffee/**/*.coffee',
  sass: srcFolder + '/sass/**/*.scss',
  img: srcFolder + '/img/*',
  data: srcFolder + '/dummy/db.json',
  constants: srcFolder + '/constants/**/*.*'
};
// 
// var prototypeFolder = './prototype';
// var prototype = {
//   base: prototypeFolder,
//   jsfolder: prototypeFolder + '/js',
//   cssfolder: prototypeFolder + '/css',
//   minCss: 'app.min.css',
//   css: 'app.css',
//   minJs: 'app.min.js',
//   js: 'app.js',
//   decofjs: 'app.decof.js',
//   img: prototypeFolder + '/img'
// };



var productionFolder = './public';
var home = '.';
var production = {
  base: productionFolder,
  php: home,
  jsfolder: productionFolder + '/js',
  cssfolder: productionFolder + '/css',
  minCss: 'app.min.css',
  css: 'app.css',
  minJs: 'app.min.js',
  js: 'app.js',
  decofjs: 'app.decof.js',
  lib: 'mylib.php',
  img: productionFolder + '/img'
};



/*

error handler

*/

var onError = function(err) {
  'use strict';
  console.log(err);
  //this.emit('end');
};

/*

task runners

*/

gulp.task('sass', function() {
  'use strict';
  return gulp.src(src.sass)
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(concat(production.css))
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(production.cssfolder));
});


gulp.task('js', function() {
  'use strict';
  return gulp.src(src.js)
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(concat(prototype.js))
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(production.jsfolder));
});

gulp.task('coffee', function() {
  'use strict';
  return gulp.src(src.coffee)
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(coffee({
      bare: true
    }))
    .pipe(concat(production.decofjs))
    .pipe(sourcemaps.init())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(production.jsfolder));
});


/*

  deprecated after livereload

*/
//
// gulp.task('jade', function() {
//   'use strict';
//   return gulp.src(src.templates)
//     .pipe(changed(production.php, {
//       extension: '.php'
//     }))
//     .pipe(plumber({
//       errorHandler: onError
//     }))
//     .pipe(jade({
//       pretty: true,
//       locals: {
//         some: "value"
//       }
//     }))
//     .pipe(prettify({
//       indent_char: ' ',
//       indent_size: 2
//     }))
//     .pipe(gulp.dest(production.php));
// });


// gulp.task('libchanged', function() {
//   'use strict';
//   return gulp.src(src.lib)
//     .pipe(changed(src.lib, {
//       extension: '.php'
//     }))
//     .pipe(plumber({
//       errorHandler: onError
//     }))
//     .pipe(deleteLines({
//       'filters': [
//         /(\x3C+\?+php)|(\?+\x3E)/
//         //  /<script\s+type=["']text\/javascript["']\s+src=/i
//       ]
//     }))
//     .pipe(concat(production.lib))
//     .pipe(sourcemaps.init())
//     .pipe(sourcemaps.write())
//     .pipe(insert.prepend('<?php'))
//     .pipe(insert.append('?>'))
//     .pipe(gulp.dest(production.php));
// });

// gulp.task('constantscopy', function () {
//   'use strict';
//   return gulp.src(src.constants)
//   .pipe(changed(src.lib, {
//     extension: '.php'
//   }))
//   .pipe(plumber({
//     errorHandler: onError
//   }))
//   .pipe(gulp.dest(production.php));
// });


gulp.task('watch', function() {
  'use strict';
  gulp.watch(src.templates, ['jade']);
  // gulp.watch(src.sass, ['sass']);
  // gulp.watch(src.img, ['img']);
});


gulp.task('liverefresh', function() {
  'use strict';
  // gulp.watch(src.templates, ['jade', 'livereload']);
  gulp.watch(src.coffee, ['coffee', 'livereload']);
  gulp.watch(src.sass, ['sass', 'livereload']);
  // gulp.watch(src.lib, ['libchanged', 'livereload']);
  // gulp.watch(src.constants, ['constantscopy', 'livereload']);
  // gulp.watch(src.img, ['img']);
});



gulp.task('livereload', function() {
  'use strict';
  livereload.listen();
  return gulp.src(src.templates)
    .pipe(watch(src.templates))
    .pipe(watch(src.sass))
    .pipe(livereload());



  // gulp.watch(src.views, function() {
  //   livereload();
  // });
  // nodemon({
  //   // the script to run the app
  //   script: './bin/www'
  // //  ext: 'js'
  // }).on('restart', function() {
  //   // when the app has restarted, run livereload.
  //   gulp.src('./bin/www')
  //     .pipe(livereload());
  //     //.pipe(notify('Reloading page, please wait...'));
  // });
});



/*

default runner

*/

gulp.task('default', ['watch', 'jade', 'js', 'coffee', 'sass']);

/*
custom shots
*/

gulp.task('refresh', ['js', 'sass', 'coffee', 'liverefresh']);
