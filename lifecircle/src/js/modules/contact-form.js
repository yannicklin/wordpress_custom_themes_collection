import {$, $$} from '../utils/$.js';

const paddingClass = 'make-space-for-label';

$$('.wpcf7-form-control').forEach(field => {
    if (field.getAttribute('type') !== 'submit') {
        field.addEventListener('focus', onFieldFocus);
        field.addEventListener('blur', onFieldBlur);

        if (field.value.trim().length > 0) {
            field.classList.add(paddingClass);
        }

        if (field.nodeName.toUpperCase() === 'SELECT') {
            field.parentNode.classList.add('wraps-select');
            field.parentNode.parentNode.classList.add('wraps-select');
        }
    }
});

function onFieldFocus(e) {
    e.target.classList.add(paddingClass);
}

function onFieldBlur(e) {
    if (e.target.value.trim().length === 0) {
        e.target.classList.remove(paddingClass);
    }
}