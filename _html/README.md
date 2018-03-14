**Starter HTML**

---

1. Clone this project
2. Run `npm install` on terminal. This command will download all required node_modules & bower_components.
3. Run `gulp watch`.
4. Project ready.

---

### Watch
Run `gulp watch`

	Andys-iMac:starter-html jon$ gulp watch
	[13:24:30] Starting 'watch'...
	[13:24:30] Finished 'watch' after 36 ms
	[BS] Proxying: http://localhost
	[BS] Access URLs:
	-------------------------------------
       Local: http://localhost:3000
    External: http://192.168.0.30:3000
    -------------------------------------
          UI: http://localhost:3001
          UI External: http://192.168.0.30:3001
    -------------------------------------

### Deployment
Run `gulp build` when you ready to staging or production to the server.

** PS: `gulp build` will minify `global.js` and add timestamp on reference file e.q style.css?1605010919**

	Andys-iMac:starter-php jon$ gulp
	[13:23:49] Using gulpfile /Applications/XAMPP/xamppfiles/htdocs/starter-php/gulpfile.js
	[13:23:49] Starting 'required'...
	[13:23:49] Starting 'plugins'...
	[13:23:49] Finished 'required' after 33 ms
	[13:23:49] Finished 'plugins' after 16 ms
	[13:23:49] Starting 'default'...
	[13:23:49] Finished 'default' after 24 μs
	

### Change Log
2016-10-14 Update gulp:bower; gulp:assets; /src/bower
2016-06-01 Add gulp: delete-app ; copy-assets, assets/fonts & assets/img copy from src to app folder
2016-02-15 Fixing
2015-11-07 Add gulp, bower package manager for jquery, bootstrap,
