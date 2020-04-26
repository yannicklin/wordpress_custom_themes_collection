function doSmoothScroll(e) {
    if (e && e.preventDefault) {
        e.preventDefault();
    }

    const targetId = window.location.hash.replace('#', '');

    if (targetId) {
        const target = document.getElementById(targetId);

        if (target && target.scrollIntoView) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
}

doSmoothScroll();

window.addEventListener("hashchange", doSmoothScroll, false);