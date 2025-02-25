    <?php
    $pageTitle = "Accueil";
    include 'header.php';
    ?>
   
<div id="loader-wrapper">
    <video autoplay muted loop id="loader-video">
        <source src="images/LogoAnimation.mp4" type="video/mp4">
        Votre navigateur ne supporte pas la vidéo HTML5.
    </video>
    <div id="loader-content">
        <p>Bienvenue chez</p>
        <h1>Mercedes AMG</h1>
        <p class="humiliation-text">Avec BMW M, vous êtes juste dans la course. Avec Mercedes AMG, vous la gagnez. 💥</p>

        <div class="loading-bar"></div>
    </div>
</div>


<div class="main-content" style="display: none;">
      <div class="videointro">
        <video autoplay muted loop id="Video">
            <source src="images/mercedesintro.mp4" type="video/mp4">  
            Votre navigateur ne supporte pas la vidéo HTML5.
        </video>
        <div class="videointro-content">
            <h1>Mercedes Benz AMG</h1>

            <a href="#intro" class="btn-en-savoir-plus">En savoir plus</a>
        </div>
    </div>
</div>

    <section id="intro" class="intro">
        <div class="indextexte">
        <h2 class="h2index">Une Légende Automobile</h2>
        <p>Mercedes-AMG est la division haute performance de Mercedes-Benz AG, fondée en 1967 par Hans Werner Aufrecht et Erhard Melcher. Spécialisée dans le développement et la production de véhicules sportifs, AMG transforme les modèles Mercedes-Benz en machines puissantes et dynamiques. Le nom AMG représente « Aufrecht, Melcher et Großaspach », ce dernier étant le lieu d'origine d'Aufrecht.

    Les modèles AMG se distinguent par leurs designs audacieux, leurs doubles sorties d’échappement, leurs grilles spécifiques, et leur logo AMG. Ces véhicules incarnent un mélange unique de luxe, de sportivité et d'innovations technologiques.

    Chaque moteur AMG est méticuleusement assemblé à la main à Affalterbach, en Allemagne, selon la philosophie « Un homme, un moteur », garantissant une qualité et une attention au détail sans compromis.

    Avec une large gamme incluant des modèles électrifiés sous l’appellation AMG E Performance, Mercedes-AMG offre des performances impressionnantes, alliant puissance, précision, et raffinement, tout en repoussant les limites de l'ingénierie automobile.</p>
    </div>
    </section>

    <section id="indexgalerie" class="indexgalerie">
    <div class="carousel-wrapper">
        <div class="carousel">
            <button class="carousel-btn prev-btn">&lt;</button>
            
                     <!-- Mercedes-AMG GLE 63 -->
                     <div class="carousel-item">
                <img src="images/galerie/gle63.jpg" alt="Mercedes-AMG GLE 63">
                <div class="info">
                    <h3>Mercedes-AMG GLE 63</h3>
                    <p>Un SUV hautes performances qui combine puissance, agilité et confort, grâce à son moteur V8 biturbo et ses technologies avancées.</p>
                    <button class="son-btn" onclick="playSound('son-mercedes-gle63')">Faire rugir le moteur</button>
                    <audio id="son-mercedes-gle63" src="audio/mercedesgle63.mp3"></audio>
                </div>
            </div>
         
         
            <!-- Mercedes-AMG S 63 -->
            <div class="carousel-item active">
                <img src="images/galerie/classes.jpg" alt="Mercedes-AMG S 63">
                <div class="info">
                    <h3>Mercedes-AMG S 63</h3>
                    <p>Une berline de luxe alliant performance de haut niveau et confort exceptionnel grâce à son moteur V8 biturbo et son design raffiné.</p>
                    <button class="son-btn" onclick="playSound('son-mercedes-s63')">Faire rugir le moteur</button>
                    <audio id="son-mercedes-s63" src="audio/mercedess63.mp3"></audio>
                </div>
            </div>

            <!-- Mercedes-AMG CLS 63 -->
            <div class="carousel-item">
                <img src="images/galerie/cls63.jpg" alt="Mercedes-AMG CLS 63">
                <div class="info">
                    <h3>Mercedes-AMG CLS 63</h3>
                    <p>Une berline sportive au design audacieux, offrant une puissance impressionnante et une conduite dynamique avec son moteur V8 biturbo.</p>
                    <button class="son-btn" onclick="playSound('son-mercedes-cls63')">Faire rugir le moteur</button>
                    <audio id="son-mercedes-cls63" src="audio/mercedescls63.mp3"></audio>
                </div>
            </div>

            <!-- Mercedes-AMG G 63 -->
            <div class="carousel-item">
                <img src="images/galerie/classeg.jpg" alt="Mercedes-AMG G 63">
                <div class="info">
                    <h3>Mercedes-AMG G 63</h3>
                    <p>Le SUV iconique qui allie luxe, robustesse et performances tout-terrain impressionnantes, propulsé par un moteur V8 biturbo.</p>
                    <button class="son-btn" onclick="playSound('son-mercedes-g63')">Faire rugir le moteur</button>
                    <audio id="son-mercedes-g63" src="audio/mercedesg63.mp3"></audio>
                </div>
            </div>



            <button class="carousel-btn next-btn">&gt;</button>
        </div>
    </div>
   
</section>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const btnScroll = document.querySelector('.btn-en-savoir-plus');
        btnScroll.addEventListener('click', (e) => {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            const target = document.querySelector(btnScroll.getAttribute('href'));
            window.scrollTo({
                top: target.offsetTop,
                behavior: 'smooth'
            });
        });
    });



    </script>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const carouselItems = document.querySelectorAll('.carousel-item');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentIndex = 0;

        function updateCarousel() {
            carouselItems.forEach((item, index) => {
                item.classList.remove('active');
                if (index === currentIndex) {
                    item.classList.add('active');
                }
            });
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex === carouselItems.length - 1;
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < carouselItems.length - 1) {
                currentIndex++;
                updateCarousel();
            }
        });

        updateCarousel(); 
    });
    </script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const loaderWrapper = document.getElementById('loader-wrapper');
    const mainContent = document.querySelector('.main-content');

    setTimeout(() => {
        loaderWrapper.style.opacity = '0'; // Transition en fondu
        loaderWrapper.style.visibility = 'hidden'; // Masquer après la transition
        mainContent.style.display = 'block'; // Afficher le contenu principal
    }, 5000); 
});
</script>

<script>
function playSound(soundId) {
    const sound = document.getElementById(soundId);
    const soundButton = sound.previousElementSibling;

    // Si le son est déjà en cours, on l'arrête
    if (!sound.paused) {
        sound.pause();
        sound.currentTime = 0; // Remettre le son au début
        soundButton.textContent = 'Faire rugir le moteur'; // Revenir au texte initial
    } else {
        // Sinon, on joue le son
        sound.play();
        soundButton.textContent = 'Arrêter le moteur'; // Changer le texte du bouton
    }
}



</script>


    <?php include 'footer.php'; ?>
