import './bootstrap';
import 'flowbite';
import  ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', function () {
        if (window.location.pathname.startsWith('/dashboard')) {
            const darkModeToggle = document.getElementById('dark-mode-toggle');
            const rootElement = document.documentElement;
            const sun = document.getElementById('sun');
            const moon = document.getElementById('moon');

            // Check if dark mode is stored in localStorage
            const isDarkMode = localStorage.getItem('darkMode') === 'true';

            // Set initial state based on localStorage
            if (isDarkMode) {
                darkModeToggle.checked = true;
                rootElement.classList.add('dark');
                sun.classList.add('hidden');
                moon.classList.remove('hidden');
            }

            darkModeToggle.addEventListener('change', () => {
                if (darkModeToggle.checked) {
                    localStorage.setItem('darkMode', 'true');
                    rootElement.classList.add('dark');
                    sun.classList.add('hidden');
                    moon.classList.remove('hidden');
                } else {
                    localStorage.setItem('darkMode', 'false');
                    rootElement.classList.remove('dark');
                    sun.classList.remove('hidden');
                    moon.classList.add('hidden');
                }
            });

        // CKEditor
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        ClassicEditor
            .create(document.querySelector('#editor'),
            {
                ckfinder: {
                    uploadUrl: '/dashboard/articles/upload?_token=' + csrfToken
                },
                editorConfig: {
                    bodyClass: 'prose dark:prose-dark' // Add Tailwind's prose class
                },
            }).catch(error => {
                console.error(error);
            });
    }

    // Pastikan hanya berjalan pada route '/'
    document.addEventListener('DOMContentLoaded', function () {
        if (window.location.pathname === '/') {
            const container = document.querySelector('.carousel-content');
            const cards = Array.from(document.querySelectorAll('.article-card'));
    
            let articlesPerSlide = window.innerWidth >= 768 ? 5 : 2;
            let currentIndex = 0;
    
            function chunkArticles() {
                container.innerHTML = '';
                articlesPerSlide = window.innerWidth >= 768 ? 5 : 2;
                for (let i = 0; i < cards.length; i += articlesPerSlide) {
                    const chunk = cards.slice(i, i + articlesPerSlide);
                    const slide = document.createElement('div');
                    slide.classList.add('carousel-slide', 'flex', 'gap-4', 'w-full', 'shrink-0');
                    chunk.forEach(card => slide.appendChild(card));
                    container.appendChild(slide);
                }
            }
    
            function updateCarousel() {
                container.style.transform = `translateX(-${currentIndex * 100}%)`;
            }
    
            chunkArticles();
    
            document.querySelector('[data-carousel-prev]').addEventListener('click', () => {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : container.children.length - 1;
                updateCarousel();
            });
    
            document.querySelector('[data-carousel-next]').addEventListener('click', () => {
                currentIndex = (currentIndex < container.children.length - 1) ? currentIndex + 1 : 0;
                updateCarousel();
            });
    
            window.addEventListener('resize', chunkArticles);
        }
    });
});
