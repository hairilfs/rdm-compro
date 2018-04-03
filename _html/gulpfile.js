var gulp        = require('gulp'),
    uglify      = require('gulp-uglify'),
    compass     = require('gulp-compass'),
    cssnano     = require('gulp-cssnano'),
    concatJS    = require('gulp-concat'),
    clean       = require('gulp-clean'),
    fileinclude = require('gulp-file-include'),
    browserSync = require('browser-sync'),
    plumber     = require('gulp-plumber'),
    rev         = require('gulp-rev-mtime'),
    rename      = require('gulp-rename'),
    imageResize = require('gulp-image-resize'),     // $ brew install graphicsmagick && brew install imagemagick
    gulpSequence = require('gulp-sequence'),
    image       = require('gulp-image');


gulp.task('js', function(){
    gulp.src([
            // './bower_components/holderjs/holder.min.js',
            './bower_components/jquery/jquery.min.js',
            './bower_components/tether/dist/js/tether.min.js',
            './bower_components/bootstrap/dist/js/bootstrap.min.js',
            './bower_components/retinajs/dist/retina.min.js',
            './bower_components/owl.carousel/dist/owl.carousel.min.js',
            './bower_components/isotope-layout/dist/isotope.pkgd.min.js',

            './src/js/global.js'
        ])
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(concatJS('script.js'))
        .pipe(gulp.dest('./app/assets'));

    gulp.src([
            './bower_components/jquery/jquery.min.js',
            './bower_components/tether/dist/js/tether.min.js',
            './bower_components/bootstrap/dist/js/bootstrap.min.js',
            './bower_components/retinajs/dist/retina.min.js',
            './src/js/landing.js'
        ])
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(concatJS('landing.js'))
        // .pipe(uglify())
        .pipe(gulp.dest('./app/assets'));
});

gulp.task('compass', function() {
    gulp.src(['./src/sass/style.scss','./src/sass/landing.scss'])
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(compass({
            image: './app/assets/img',
            css: './app/assets',
            sass: 'src/sass'
        }))
        .pipe(gulp.dest('./app/assets'));
});

gulp.task('html', function() {
    gulp.src(['./src/html/*.html'])
        .pipe(plumber())
        .pipe(fileinclude({
            prefix: '@@',
            basepath: '@file'
        }))
        .pipe(gulp.dest('./app'));
});

gulp.task('delete-app', function(){
    return gulp.src('./app', {read: false})
        .pipe(plumber())
        .pipe(clean());
});

gulp.task('delete-img', function(){
    return gulp.src('./app/assets/img', {read: false})
        .pipe(plumber())
        .pipe(clean());
});

gulp.task('assets', function(){
    gulp.src('./src/assets/**/*')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(gulp.dest('./app/assets'));

    gulp.src('./src/uploads/**/*')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(gulp.dest('./app/uploads'));

    gulp.src('./src/icon/icon.png')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(gulp.dest('./app/assets/icon'));
});

gulp.task('bower', function(){
    gulp.src('./src/bower/**/*')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(gulp.dest('./bower_components'));
    gulpSequence('compass');
});

gulp.task('image', function() {
    gulp.src('./src/assets/img/*')
        .pipe(image())
        .pipe(gulp.dest('./app/assets/img'));
});

gulp.task('minify-js-css', function(){
    gulp.src('./app/assets/script.js')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(uglify())
        .pipe(gulp.dest('./app/assets'));

    gulp.src('./app/assets/style.css')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(cssnano({discardComments: {removeAll: true}}))
        .pipe(gulp.dest('./app/assets'));
});

gulp.task('clean', gulpSequence('bower','delete-app','compass','js','html','assets'));

gulp.task('minify', gulpSequence('minify-js-css','delete-img','image'));

gulp.task('watch',function(){
    browserSync.init({
        server: {
            baseDir: './app',
            directory: true
        },
        browser: 'google chrome',
        notify: false,
        cors: true
    });

    gulp.watch('./src/js/*.js',['js']);

    gulp.watch(['./src/sass/*.scss','./src/sass/*/*.scss'],['compass']);

    gulp.watch(['./src/html/*.html', './src/html/**/*.html'],['html']);


    gulp.watch([
        './app/*.html',
        './app/assets/*.js',
        './app/assets/*.css'
        ]).on('change', function() {
            browserSync.reload();
        });

    gulp.watch('./src/bower/**/*.scss').on('change', function() {
        gulpSequence('[bower], compass')
    });
});

gulp.task('icon', function(){
    gulp.src('./src/icon/icon.png')
        .pipe(imageResize({ 
          width : 194,
          height : 194,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-194.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 192,
          height : 192,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-192.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 180,
          height : 180,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-180.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 152,
          height : 152,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-152.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 144,
          height : 144,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-144.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 180,
          height : 180,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-180.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 120,
          height : 120,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-120.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 114,
          height : 114,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-114.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 96,
          height : 96,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-96.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 76,
          height : 76,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-76.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 72,
          height : 72,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-72.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 60,
          height : 60,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-60.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 57,
          height : 57,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-57.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 32,
          height : 32,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-32.png'))
        .pipe(gulp.dest('./app/assets/icon'))

        .pipe(imageResize({ 
          width : 16,
          height : 16,
          crop : false,
          upscale : true
        }))
        .pipe(rename('icon-16.png'))
        .pipe(gulp.dest('./app/assets/icon'))
});

gulp.task('build', function () {
    gulp.src('./app/*.html')
        .pipe(plumber({
          errorHandler: function (error) {
            console.log(error.message);
            this.emit('end');
        }}))
        .pipe(rev({
          'cwd': './app',
          'suffix': 'build'
        }))
        .pipe(gulp.dest('./app'));
});
