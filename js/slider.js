document.querySelectorAll('.slider').forEach(initSlider);

function initSlider(slider) {
    const track = slider.querySelector('.slider__track');
    const viewport = slider.querySelector('.slider__viewport');
    // Convertimos a array para evitar errores de HTMLCollection
    let originalSlides = Array.from(track.children); 
    const prevBtn = slider.querySelector('.prev');
    const nextBtn = slider.querySelector('.next');
    const dotsContainer = slider.querySelector('.dots');

    let perView = 1;
    let index = 0;
    let isDragging = false;
    let startX = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let isTransitioning = false;
    let isInfinite = false;
    let autoplayInterval = null;
    let transitionTimeout = null; // Variable para el seguro anti-bloqueo

    /* ------------------------------
       Helpers
    --------------------------------*/
    function getVisibleSlides() {
        const total = originalSlides.length;
        if (window.innerWidth >= 1024) return Math.min(total, 3);
        if (window.innerWidth >= 600) return Math.min(total, 2);
        return 1;
    }

    /* ------------------------------
       Setup
    --------------------------------*/
    function setupSlider() {
        perView = getVisibleSlides();

        // Pausar autoplay durante setup
        if (autoplayInterval) clearInterval(autoplayInterval);

        // Limpiar clones viejos y restaurar estado limpio
        track.querySelectorAll('.clone').forEach(c => c.remove());
        
        // MODO ESTÁTICO (Pocos items)
        if (originalSlides.length <= perView) {
            slider.classList.add('is-static');
            isInfinite = false;
            track.style.transform = 'none';
            track.style.transition = 'none';
            track.style.justifyContent = 'center'; // O 'flex-start' según gusto
            track.style.cursor = 'default';
            if (dotsContainer) dotsContainer.innerHTML = '';
            // Ocultar flechas si es estático
            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            return;
        }

        // MODO INFINITO
        slider.classList.remove('is-static');
        track.style.justifyContent = 'flex-start';
        track.style.cursor = 'grab';
        if (prevBtn) prevBtn.style.display = '';
        if (nextBtn) nextBtn.style.display = '';
        isInfinite = true;

        const cloneCount = Math.min(3, originalSlides.length);

        // Crear Clones
        const firstClones = originalSlides.slice(0, cloneCount).map(s => {
            const c = s.cloneNode(true);
            c.className = 'slide clone';
            c.setAttribute('aria-hidden', 'true');
            c.querySelectorAll('a').forEach(a => a.setAttribute('tabindex', '-1'));
            return c;
        });

        const lastClones = originalSlides.slice(-cloneCount).map(s => {
            const c = s.cloneNode(true);
            c.className = 'slide clone';
            c.setAttribute('aria-hidden', 'true');
            c.querySelectorAll('a').forEach(a => a.setAttribute('tabindex', '-1'));
            return c;
        });

        firstClones.forEach(c => track.appendChild(c));
        lastClones.reverse().forEach(c => track.insertBefore(c, track.firstChild));

        index = cloneCount;
        createDots();
        // Sin animación al iniciar para evitar saltos visuales
        updatePosition(false);
        startAutoplay();
    }

    /* ------------------------------
       Core Functions
    --------------------------------*/
    function updatePosition(animate = true) {
        if (!isInfinite) return;
        const slideWidth = viewport.clientWidth / perView;
        
        if (animate) {
            track.style.transition = 'transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            // SEGURO ANTI-BLOQUEO: Si transitionend falla, esto lo arregla
            clearTimeout(transitionTimeout);
            transitionTimeout = setTimeout(() => {
                if (isTransitioning) handleTransitionEnd();
            }, 500); // 400ms dura la animación + 100ms de margen
        } else {
            track.style.transition = 'none';
        }

        currentTranslate = -index * slideWidth;
        prevTranslate = currentTranslate;
        track.style.transform = `translateX(${currentTranslate}px)`;
        updateDots();
    }

    function handleTransitionEnd() {
        if (!isInfinite) return;
        isTransitioning = false;
        clearTimeout(transitionTimeout); // Cancelamos el seguro si todo salió bien

        const cloneCount = Math.min(3, originalSlides.length);
        const totalReal = originalSlides.length;

        // Salto instantáneo desde clones
        if (index >= totalReal + cloneCount) {
            index = cloneCount;
            updatePosition(false);
        } else if (index < cloneCount) {
            index = totalReal + cloneCount - 1;
            updatePosition(false);
        }
    }

    function shiftSlide(direction) {
        if (isTransitioning || !isInfinite) return;
        isTransitioning = true;
        index += direction;
        updatePosition(true);
    }

    /* ------------------------------
       Pointer Events (Touch & Mouse)
    --------------------------------*/
    function onPointerDown(e) {
        if (isTransitioning || !isInfinite) return;
        
        isDragging = true;
        startX = e.pageX;
        track.style.transition = 'none';
        track.style.cursor = 'grabbing';
        
        // Parar autoplay al tocar
        if (autoplayInterval) clearInterval(autoplayInterval);

        // Capturar puntero para que no se pierda si sale del div
        track.setPointerCapture(e.pointerId);
    }

    function onPointerMove(e) {
        if (!isDragging) return;
        const currentX = e.pageX;
        const diff = currentX - startX;
        
        // Pequeño umbral para evitar movimientos accidentales al hacer click
        if (Math.abs(diff) > 5) {
            track.style.transform = `translateX(${prevTranslate + diff}px)`;
        }
    }

    function onPointerUp(e) {
        if (!isDragging) return;
        isDragging = false;
        track.style.cursor = 'grab';
        
        const slideWidth = viewport.clientWidth / perView;
        const currentX = e.pageX;
        const movedBy = currentX - startX;

        // Reiniciar autoplay
        startAutoplay();

        // Decidir si cambiar slide
        if (Math.abs(movedBy) > slideWidth / 4) {
            if (movedBy < 0) index++; // Deslizó a izquierda -> Siguiente
            else index--;             // Deslizó a derecha -> Anterior
        }

        isTransitioning = true;
        updatePosition(true);
    }

    /* ------------------------------
       Controls & Autoplay
    --------------------------------*/
    function startAutoplay() {
        const ms = parseInt(slider.dataset.autoplay);
        if (!ms || ms <= 0) return;
        
        if (autoplayInterval) clearInterval(autoplayInterval);
        autoplayInterval = setInterval(() => {
            if (!isDragging && document.visibilityState === 'visible') {
                shiftSlide(1);
            }
        }, ms);
    }

    function createDots() {
        if (!dotsContainer) return;
        dotsContainer.innerHTML = '';
        originalSlides.forEach((_, i) => {
            const btn = document.createElement('button');
            btn.setAttribute('aria-label', `Go to slide ${i + 1}`);
            btn.onclick = () => {
                if (isTransitioning) return;
                // Calculamos índice real sumando los clones iniciales
                index = i + Math.min(3, originalSlides.length);
                isTransitioning = true;
                updatePosition(true);
                startAutoplay(); // Reiniciar timer
            };
            dotsContainer.appendChild(btn);
        });
        updateDots();
    }

    function updateDots() {
        if (!dotsContainer) return;
        const dots = dotsContainer.querySelectorAll('button');
        const cloneCount = Math.min(3, originalSlides.length);
        // Calcular índice visual (0 a N-1)
        let visualIndex = (index - cloneCount) % originalSlides.length;
        if (visualIndex < 0) visualIndex += originalSlides.length;
        
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === visualIndex);
        });
    }

    /* ------------------------------
       EventListeners
    --------------------------------*/
    // Usamos Pointer Events que cubren Mouse y Touch
    track.addEventListener('pointerdown', onPointerDown);
    track.addEventListener('pointermove', onPointerMove);
    track.addEventListener('pointerup', onPointerUp);
    track.addEventListener('pointercancel', onPointerUp); // Importante para móviles
    track.addEventListener('pointerleave', () => {
        if (isDragging) onPointerUp({ pageX: startX }); // Simula soltar si se sale
    });

    track.addEventListener('transitionend', handleTransitionEnd);

    // Evitar clicks en enlaces si se arrastró
    track.addEventListener('click', e => {
        // Si nos movimos aunque sea un poco, prevenimos el click
        if (Math.abs(currentTranslate - prevTranslate) > 10) {
            e.preventDefault();
            e.stopPropagation();
        }
    }, true);

    if (nextBtn) nextBtn.addEventListener('click', () => {
        shiftSlide(1);
        startAutoplay();
    });
    
    if (prevBtn) prevBtn.addEventListener('click', () => {
        shiftSlide(-1);
        startAutoplay();
    });

    // Resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(setupSlider, 200);
    });

    // Visibility (Pausar si minimizan el navegador)
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) clearInterval(autoplayInterval);
        else startAutoplay();
    });

    // Iniciar
    setupSlider();
}