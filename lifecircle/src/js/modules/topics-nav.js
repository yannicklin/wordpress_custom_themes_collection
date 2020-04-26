import {$, $$} from '../utils/$.js';

function buildSelect(options, value) {
    const root = document.createElement('select');
    root.className = 'topics-nav-select';
    root.value = value;

    options
        .map(option => buildOption(option, option.value === value))
        .forEach(option => root.appendChild(option));

    return root;
}

function buildOption({ label, value }, isSelected) {
    const root = document.createElement('option');

    root.className = 'topics-nav-option';
    root.value = value;
    root.innerText = label;

    if (isSelected) {
        root.setAttribute('selected', 'true');
    }

    return root;
}

const select = buildSelect(
    $$('.menu.topics-nav a').map(linkNode => {
        return {
            label: linkNode.innerText,
            value: linkNode.getAttribute('href')
        };
    }),
    window.location.href
);

select.addEventListener('change', function(e) {
    e.preventDefault();
    window.location.href = e.target.value;
});

$('.menu.topics-nav').insertAdjacentElement('beforebegin', select);