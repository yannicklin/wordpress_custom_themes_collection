import {$, $$} from '../utils/$.js';

$$('.guide-teasers').forEach(slidesContainer => {
    const slides = $$('.guide-teaser', slidesContainer);
    const startingSlideIndex = randomIntFromInterval(0, slides.length - 1);

    let slideProgressionTimer;

    slides[startingSlideIndex].classList.add('current');

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

    function buildProgressionButton(slide, targetSlideIndex) {
        const el = document.createElement('span');
        el.className = 'progression-button';

        if (slides.indexOf(slide) === targetSlideIndex) {
            el.classList.add('active');
        }

        el.addEventListener('click', ev => {
            ev.preventDefault();
            ev.stopPropagation();

            setCurrent(slides.indexOf(slide));
        });

        return el;
    }

    function buildProgressionButtons() {
        slides.forEach((slideNode, thisSlideIndex) => {
            const placementTarget = $('.details-container', slideNode);
            slides
                .map(slide => buildProgressionButton(slide, thisSlideIndex))
                .forEach(button => placementTarget.appendChild(button));
        });
    }

    buildProgressionButtons();
    startSlideProgression();
    slidesContainer.removeAttribute('data-ready');

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

    function setCurrent(index) {
        stopSlideProgression();

        const current = getCurrent();
        current.classList.remove('current');
        slides[index].classList.add('current');

        startSlideProgression();
    }

    function stopSlideProgression() {
        clearInterval(slideProgressionTimer);
    }

    function startSlideProgression() {
        slideProgressionTimer = setInterval(moveToNext, 7000);
    }
});

/**
 * @see https://stackoverflow.com/a/7228322/1063035
 * @param {number} min
 * @param {number} max
 * @returns {number}
 */
function randomIntFromInterval(min,max) {
    return Math.floor(Math.random()*(max-min+1)+min);
}