import './polyfills/childnode.replacewith';
import './polyfills/element.closest';
import './modules/browser-detect';
import './modules/header-menu';

// Import the apps styles
import '../scss/app.scss'

const isFrontPage = !!document.querySelector('body.home');
const isIE = /Trident.*rv[ :]*11\./.test(navigator.userAgent);
const isMSEdge = typeof CSS !== 'undefined' && CSS.supports("(-ms-ime-align:auto)");
const rootNode = document.querySelector('html');

(async () => {
    if (isFrontPage) {
        await import('./modules/front-page');
    }
})();

rootNode.classList.remove('no-js');

if (isIE) {
    rootNode.classList.add('ie');
}

if (isMSEdge) {
    rootNode.classList.add('ms-edge');
}

if ($('[data-open-in-lightbox]').length > 0) {
    import('./modules/youtube-player');
}

if ($('.menu.topics-nav').length > 0) {
    import('./modules/topics-nav.js');
}

if ($('.guide-teasers').length > 0) {
    import('./modules/guide-teasers.js');
}

if ($('.board-viz').length > 0) {
    import('./modules/board-viz.js');
}

if ($('.wpcf7-form').length > 0) {
    import('./modules/contact-form.js');
}
