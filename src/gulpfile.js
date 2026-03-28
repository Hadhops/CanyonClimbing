const gulp = require("gulp");
const sass = require('gulp-sass')(require('sass'));
const postcss = require("gulp-postcss");
const exec = require('child_process').exec;

const css = {
	src: "sass/style.scss",
	sassOpts: {
		outputStyle: "compressed",
		precision: 3,
    errLogToConsole: true,
    includePaths: ['node_modules']
	},
	processors: [
		require("autoprefixer"),
		// require('css-mqpacker'),
		require("cssnano"),
	],
};

//Setup Basic Actions

gulp.task("styles", () => {
	return gulp
		.src(css.src)
		.pipe(sass(css.sassOpts))
		.pipe(postcss(css.processors))
		.pipe(gulp.dest(`../`));
});


gulp.task("rollup", (cb) => {
	exec('rollup -c', function (err, stdout, stderr) {
		console.log(stdout);
		console.log(stderr);
		cb(err);
	  });
});

//Useful Tasks
gulp.task("build", gulp.parallel([ "styles", "rollup"]));

gulp.task("watch", () => {
	gulp.watch(['sass/**', 'js/**'], (done) => {
		gulp.parallel([ "styles", "rollup" ])(done);
	});
});