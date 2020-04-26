import {$, $$} from '../utils/$.js';

const members = $$('.board-viz__member');

members.forEach((memberNode, elIndex) => {
    memberNode.addEventListener('click', () => {
        hideAll();
        show(elIndex);
    });

    $('.dismiss-button', memberNode).addEventListener('click', e => {
        e.stopPropagation();
        hideAll();
    });
});

function show(targetIndex) {
    $('html').style.overflow = 'hidden';
    members[targetIndex].classList.add('active');
    $('.board-viz__member-bio', members[targetIndex]).scrollTop = 0;
}

function hideAll() {
    $('html').style.overflow = '';
    members.forEach(
        memberNode => memberNode.classList.remove('active')
    );
}