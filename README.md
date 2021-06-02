# Echo Wordpress Template

## Summary

Echo Wordpress Template for use as a starting template for building custom themes. It uses laravel-mix and compiles with postCss and AutoPrefixr, HTML5 Bootstrap 5, and Webpack for all processing tasks. The theme is setup to use Webpack to compile with postCss (with source maps), run it through AutoPrefixr.

## Usage

Make sure you have nvm installed and reference the `.nvmrc` file that is in the root of the project.

First; download/clone the template. Then rename the folder to `echo-theme`. Then run the following:

```sh
$ cd echo-theme
$ nvm use
$ yarn
```

## Folder structure
- `acf-json` - For Advanced Custom Fields Pro json data files to be hosted.
- `assets` - Where all assets compile to and are referenced for the front end.
- `flexibles` - Flexible content includes to create. We create these custom depending on the project.
- `partials` - Where we keep includes for any template based code. Things like headers, nav that we need on multiple files.
- `post-types` - Where custom post types will go.
- `resources` - The source for all css, js changes. This is where most of our work is pertaining to the front end.
- `settings` - Any WordPress framework settings and functions to include inside the `functions.php` file.
- `templates` - Any templates required for the WordPress backend.
- `.nvmrc` - Node version to use with nvm.
- `404.php` - Template file to use for 404 pages.
- `footer.php` - File to use for the bottom of the template page.
- `front-page.php` - Use this file for the home page unless you are using flexible template file in `templates/template-flexible.php`.
- `functions.php` - The core of all functions will go here. WordPress theme requirement.
- `index.php` - Use this file for the blog archive content and as a catch all for any other content types.
- `mix-manifest.json` - Manifest of assets compiled.
- `package.json` - Node packages.
- `screenshot.png` - Screenshot of log and screenshot that shows in dashboard for theme.
- `search.png` - Search archive file. Will remove in future.
- `searchform.png` - Use as an example to do search form. Will replace with function based call.
- `style.css` - Used for theme settings and config.
- `webpack.mix.js` - Webpack mix settings.
- `yarn.lock` - Yarn lock file for node package verions.

For development environments your need to run this command

```
yarn watch
```

For production environments you need to run

```
yarn production
```

### TODO
- Fix how images are mapped and referenced to `images` instead of `assets/img`
