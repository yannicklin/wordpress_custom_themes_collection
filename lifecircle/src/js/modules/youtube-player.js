import YouTubePlayer from 'youtube-player';
import {$, $$} from '../utils/$.js';

const isIE = !!$('html.ie');
const body = $('body');
let triggerableLinks = [];
let player;
let playerStateListener;
init();

/**
 * @returns {HTMLIFrameElement}
 */
function getPlayerNode() {
    if (!$('#player-root')) {
        createPlayerNode(getDismissButtonNode());
    }

    return $('#player-root');
}

/**
 * @returns {HTMLDivElement}
 */
function getContainerNode() {
    return $('#youtube-player-container');
}

/**
 * @returns {HTMLElement}
 */
function getDismissButtonNode() {
    return $('.dismiss-button', getContainerNode());
}

function init() {
    body.insertAdjacentElement('beforeend',createInitialNode());

    triggerableLinks = $$('[data-open-in-lightbox]');

    triggerableLinks.forEach(link => {
        link.addEventListener('click', event => {
            event.preventDefault();

            const targetElement = event.target.closest('[data-open-in-lightbox]');
            const link = targetElement.getAttribute('href');

            openInLightbox(link, targetElement);
        });
    });
}

/**
 * @param {string} url
 * @param {HTMLElement?} sourceEl
 */
function openInLightbox(url, sourceEl) {
    const theUrl = setLightboxUrl(url);
    const playerVars = parseSearchParams(theUrl.searchParams);

    if (!isIE) {
        player = new YouTubePlayer(getPlayerNode(), {
            playerVars
        });
        playerStateListener = player.on('stateChange', onPlayerStateChanged);
    }

    if (sourceEl) {
        sourceEl.classList.add('is-showing-lightbox');
    }

    show();
    play();
}

function onPlayerStateChanged(e) {
    if (e.data === 0 /* zero means "ended" */) {
        closeLightbox();
    }
}

/**
 * @param {HTMLElement?} targetEl
 */
function closeLightbox(targetEl) {
    stop();

    if (player) {
        player.off(playerStateListener);
        playerStateListener = null;
        player.destroy();
        player = null;
    }

    clearLightboxUrl();
    hide();

    $$('.is-showing-lightbox').forEach(el => el.classList.remove('is-showing-lightbox'));
}

function show() {
    getContainerNode().removeAttribute('hidden');
    jQuery(document).trigger('lightbox-show');

    // for some reason we have to make the video element
    // exist on a translateZ() layer or MSEdge won't actually show the video
    setTimeout(() => {
        getDismissButtonNode().style.transform = 'translateZ(0px)';
    }, 2000);
}

function hide() {
    jQuery(document).trigger('lightbox-hide');

    getDismissButtonNode().style.transform = '';

    getContainerNode().setAttribute('hidden', true);
}

function play() {
    if (player) {
        player.playVideo();
    }
}

function stop() {
    if (player) {
        player.stopVideo();
    }
}

/**
 * @param {URLSearchParams} params
 * @returns {Object}
 */
function parseSearchParams(params) {
    const str = params.toString();

    return str.split('&').map(line => line.split('=')).reduce((acc, [key, value]) => {
        acc[unescape(key)] = unescape(value);
        return acc;
    }, {});
}

function setLightboxUrl(url) {
    const result = new URL(url);
    const thisPage = new URL(window.location.href);

    if (result.origin.includes('youtube')) {
        result.searchParams.append('rel', '0');
        result.searchParams.append('controls', '1');
        result.searchParams.append('showinfo', '0');
        result.searchParams.append('modestbranding', '1');
        result.searchParams.append('modestbranding', '1');
        result.searchParams.append('playsinline', '1');
        result.searchParams.append('enablejsapi', '1');
        result.searchParams.append('origin', thisPage.origin);

        result.pathname = result.pathname.replace('watch', 'embed');
    }

    getPlayerNode().setAttribute('src', result.toString());

    return result;
}

function clearLightboxUrl() {
    getPlayerNode().setAttribute('src', '');
}

function createInitialNode() {
    const initialNode = document.createElement('div');
    initialNode.id = 'youtube-player-container';
    initialNode.setAttribute('hidden', true);

    const dismissButton = document.createElement('button');
    dismissButton.innerHTML = '&times;';
    dismissButton.className = 'dismiss-button';
    dismissButton.addEventListener('click', closeLightbox);

    const overlay = document.createElement('div');
    overlay.className = 'overlay';
    overlay.addEventListener('click', closeLightbox);

    initialNode.appendChild(overlay);
    initialNode.appendChild(dismissButton);
    createPlayerNode(dismissButton);

    return initialNode;
}

function createPlayerNode(placeBeforeNode) {
    const playerRoot = document.createElement('iframe');
    playerRoot.setAttribute('allowfullscreen', 'true');
    playerRoot.setAttribute('frameborder', '0');
    playerRoot.setAttribute('allow', 'autoplay; encrypted-media');
    playerRoot.id = 'player-root';

    placeBeforeNode.insertAdjacentElement('beforebegin', playerRoot);
}