var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var run = require('gulp-run');

gulp.task('test', function(){
    gulp.src(['spec/**/*.php', 'src/*.php'])
        .pipe(run('clear'))
        .pipe(phpspec());
});

gulp.task('watch', function(){
   gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);

/*
var minifycss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var less = require('gulp-less');
var rename = require('gulp-rename');
var exec = require('child_process').exec;
var sys = require('sys');


gulp.task('css', function () {
    return gulp.src('public/css/style.less')
        .pipe(less())
        .pipe(autoprefixer())
        .pipe(minifycss())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/css/min'));

});

gulp.task('default', ['watch']);


var watcher = gulp.watch('public/css/*.less', ['css']);
watcher.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
});

gulp.task('phpunit', function(){
   exec('phpunit', function(error, stdout){
       sys.puts(stdout);
   })
});

gulp.task('watch', function(){
    watcher;
    gulp.watch('app.php', [phpunit]);
});
*/

