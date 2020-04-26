import {$, $$} from '../utils/$.js';

const slides = $$('.carer-stories .slide');
const slidesContainer = slides[0].parentNode;

let slideProgressionTimer;

jQuery(document).on('lightbox-show', show);
jQuery(document).on('lightbox-hide', hide);

function show() {
    stopSlideProgression();
    slides.forEach(slideNode => {
        slideNode.classList.add('is-showing-lightbox');
    });
}

function hide() {
    startSlideProgression();
    slides.forEach(slideNode => {
        slideNode.classList.remove('is-showing-lightbox');
    });
}

startSlideProgression();

function getCurrent() {
    return $('.current', slidesContainer);
}

function getNextAfterCurrent() {
    let next = getCurrent().nextElementSibling;

    if (next) {
        return next;
    }

    return slides[0]; // loop around back to the first one.
}

function moveToNext() {
    const current = getCurrent();
    const next = getNextAfterCurrent();
    current.classList.remove('current');
    next.classList.add('current');
}

function stopSlideProgression() {
    clearInterval(slideProgressionTimer);
}

function startSlideProgression() {
    slideProgressionTimer = setInterval(moveToNext, 7000);
}