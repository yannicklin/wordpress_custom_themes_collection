import {$} from '../utils/$.js';

const needToTalkSection = $('.need-to-talk');
const explainerVideo = $('#explainer');
const explainerPrompt = $('.explainer-teaser');

/**
 * Extract the (WYSIWYG-authored) link in the text
 * and also make the guide picture link to that URL.
 */
if (needToTalkSection) {
    const firstLink = $('a', needToTalkSection);
    const guidePicture = $('.guide-picture', needToTalkSection);
    if (firstLink && guidePicture) {
        const pictureLink = document.createElement('a');
        pictureLink.classList.add('guide-picture-link');
        pictureLink.setAttribute('href', firstLink.getAttribute('href'));

        wrap(guidePicture, pictureLink);
    }
}

/**
 * @param {Element} target
 * @param {Element} wrapper
 */
function wrap(target, wrapper) {
    target.insertAdjacentElement('beforebegin', wrapper);
    wrapper.insertAdjacentElement('afterbegin', target);
}

if (explainerPrompt && explainerVideo) {
    import('./explainer-video.js');
}

if ($('.carer-stories')) {
    import('./carer-stories-carousel.js');
}
