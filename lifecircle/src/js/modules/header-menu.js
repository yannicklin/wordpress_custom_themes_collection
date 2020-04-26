import {$} from '../utils/$.js';

const header = $('header');
const menu = $('.menu', header);
let menuButton;

init();

function init() {
    menuButton = createMenuButton();
    menu.insertAdjacentElement('beforebegin', menuButton);
}

function createMenuButton() {
    const el = document.createElement('button');

    el.className = 'menu-toggle-button collapsed';

    el.innerHTML = `
        <span class="expand-prompt">☰</span>
        <span class="collapse-prompt">&times;</span>
    `;

    el.addEventListener('click', e => {
        el.classList.toggle('collapsed');
    });

    return el;
}