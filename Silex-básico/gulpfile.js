const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const less = require('gulp-less');

gulp.task('browser-sync', function(){
    browserSync.init({
        proxy: "localhost:8000",
        files: [
            "src/**/**.php",
            "public/index.php",
            "templates/**/*.phtml"
        ]
    })
});

gulp.task('less', function(){
    gulp.src('./assets/less/style.less').pipe(less()).pipe(gulp.dest('./public/build/css'))

});

gulp.task('dev', ['less', 'browser-sync']);
