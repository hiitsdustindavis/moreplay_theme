var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();


gulp.task('sass', function(){
  return gulp.src('sass/**/*.sass')
    .pipe(sass()) //This just declares that we are using gulp-sass
    .pipe(gulp.dest('css/'))
});

// (files to watch, [task(s) to run])
gulp.task('watch', function(){
  gulp.watch('sass/**/*.sass', ['sass']);
});
