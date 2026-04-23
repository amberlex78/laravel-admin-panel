import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Apply theme immediately before Alpine loads to prevent flash
(function () {
    const saved = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (saved === 'dark' || (!saved && prefersDark)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
})();

document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
        isDark: document.documentElement.classList.contains('dark'),

        toggle() {
            this.isDark = !this.isDark;
            if (this.isDark) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        }
    });
});

Alpine.start();
