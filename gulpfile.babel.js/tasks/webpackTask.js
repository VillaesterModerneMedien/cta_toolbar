/*
 * @title Watch
 * @description A task to start the server and watch for changes.
 */

// Dependencies
import {series} from "gulp";
import {serve} from "./server";

const gulp =  require('gulp');

const named = require('vinyl-named');
const webpackdefault = require('webpack');
const gulpWebpack = require('webpack-stream');

function startWebpack()
{
  gulp.watch('src/structure/media/com_vmmdatabase/js/*.js', gulp.series('webpack'));
}

gulp.task('webpack', function(){

  return gulp.src(['src/structure/media/com_vmmdatabase/js/customerFormFrontend.js', 'src/structure/media/com_vmmdatabase/js/customerFormBackend.js' ])
    .pipe(named())
    .pipe(gulpWebpack({
        watch: true,
        mode: 'production',
      },webpackdefault
    ))
    .pipe(gulp.dest('dist/media/com_vmmdatabase/js', {overwrite: true, mode: '0744'}));
});


export const webpackTask = gulp.series(
  startWebpack
);

