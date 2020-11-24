let gulp = require('gulp');
let sass = require('gulp-sass');
let sourcemaps = require('gulp-sourcemaps');
let watch = require('gulp-watch');

gulp.task('sass', function (done) {
    gulp.src('./public/sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./public/css'))
    done()
})
gulp.task('sass:watch', function (){
    gulp.watch('./public/sass/**/*.scss', gulp.series('sass'))
})
