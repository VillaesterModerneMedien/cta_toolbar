export const pjson = require('../package.json');

export const config = {
  browserSyncConfig: {
    ghostMode: {
      clicks: true,
      scroll: true,
      links: true,
      forms: true
    },
    server: {
      baseDir: ['/dist/']
    },
    proxy: pjson.buildconfigs.proxy,
    https: true,
    open: false,
    debugInfo: false,
    watchTask: false,
    notify: {
      styles: [
        'padding: 8px 16px;',
        'position: fixed;',
        'font-size: 12px;',
        'font-weight: bold',
        'z-index: 9999;',
        'top: inherit',
        'border-radius: 0',
        'right: 0;',
        'top: 0;',
        'color: #f4f8f9;',
        'background-color: #026277;',
        'text-transform: uppercase'
      ]
    }
  },
  paths: {
    src: './src/',
    dest: './dist/',
    copy: {
      src: ['src/structure/**/**', 'src/structure/**/.*', '!src/structure/**/*.{php,html,xml,ini,less,json,css,scss,js}', '!src/structure/**/.*.{php,html,xml,ini,less,json,css,scss,js}'],
      replacesrc: ['src/structure/**/**.{php,html,xml,ini,less,json,css,scss,js}', 'src/structure/**/.*.{php,html,xml,ini,less,json,css,scss,js}'],
      dest: 'dist/',
      watch: ['src/structure/**/*.{php,html,xml,ini,less,json,css,scss,js}'],
    }
  }
};

export const isProd = process.env.NODE_ENV === 'production';

export const stringsreplace = extend({}, {"[VERSION]": pjson.version} , pjson.replacejson);

function extend(target) {
  var sources = [].slice.call(arguments, 1);
  sources.forEach(function (source) {
    for (var prop in source) {
      target[prop] = source[prop];
    }
  });
  return target;
}
