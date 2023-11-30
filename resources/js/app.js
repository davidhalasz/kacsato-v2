import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();


function scrollToDiv(sectionName) {
    window.location.href = `/#${sectionName}`;
    var div = document.getElementById(sectionName);
    div.scrollIntoView({
        behavior: "smooth"
    });
}
