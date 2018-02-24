var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;


gulp.task('sass', function () {
    //來源
    return gulp.src('sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        //目的地
        .pipe(gulp.dest('css/'));
});

gulp.task('default', ['sass'], function () {

    browserSync.init({
        server: {
            //根目錄
            baseDir: "./",
            index: "milestone.html"
            // index: "id.html"
        }
    });
    gulp.watch(["sass/*.scss", "sass/**/*.scss"], ['sass']).on('change', reload);
    gulp.watch("*.html").on('change', reload);
    gulp.watch("js/*.js").on('change', reload);
    // gulp.watch("images/*").on('change', reload);
});