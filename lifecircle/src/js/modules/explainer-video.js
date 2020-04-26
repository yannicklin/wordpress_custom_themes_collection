import {$$} from '../utils/$.js';

jQuery(document).on('lightbox-show', show);
jQuery(document).on('lightbox-hide', hide);

function show() {
    $$('.carer-stories .slide').forEach(slideNode => {
        slideNode.classList.add('is-showing-lightbox');
    });
}

function hide() {
    $$('.carer-stories .slide').forEach(slideNode => {
        slideNode.classList.remove('is-showing-lightbox');
    });
}