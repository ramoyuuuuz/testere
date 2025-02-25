// Menu Burger
function toggleMenu() {
    const navbarLinks = document.querySelector('.navbar-links');
    navbarLinks.classList.toggle('active');
}

// Fonction pour afficher la section correspondante et cacher les autres
function showSection(sectionId) {
    // Masquer toutes les sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
        section.style.display = 'none';
    });

    // Afficher la section sélectionnée
    const activeSection = document.getElementById(sectionId);
    activeSection.style.display = 'block';

    // Fermer le menu burger après sélection (uniquement sur mobile)
    const navbarLinks = document.querySelector('.navbar-links');
    if (navbarLinks.classList.contains('active')) {
        navbarLinks.classList.remove('active');
    }
}

// Afficher la section "accueil" dès le début
window.onload = () => {
    showSection('accueil');
};

