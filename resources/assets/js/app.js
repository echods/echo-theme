import bootstrap from './bootstrap'; // Load plugins needed here

(function($) {

    'use strict';


    class AppClass {
        constructor(properties) {
            this.properties = properties;
        }

        init() {
            return 'Application Init';
        }
    }

    var appInit = new AppClass;
    console.log(appInit.init()); 

})(jQuery);
