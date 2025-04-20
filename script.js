const canvas = document.getElementById("bubbleCanvas");
const ctx = canvas.getContext("2d");

// Ajuster la taille du canvas à la fenêtre
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

// Création des bulles
const bubbles = [];
const numBubbles = 50; // Nombre de bulles

for (let i = 0; i < numBubbles; i++) {
    bubbles.push({
        x: Math.random() * canvas.width, // Position aléatoire
        y: Math.random() * canvas.height,
        radius: Math.random() * 20 + 10, // Taille aléatoire (10 à 30 px)
        speed: Math.random() * 2 + 1, // Vitesse aléatoire
        color: `hsl(${Math.random() * 360}, 100%, 50%)`, // Couleur aléatoire
        opacity: Math.random() * 0.5 + 0.5 // Transparence aléatoire
    });
}

// // Animation des bulles
function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let bubble of bubbles) {
        bubble.y -= bubble.speed; // Fait monter la bulle
        if (bubble.y + bubble.radius < 0) {
            // Réinitialisation en bas
            bubble.y = canvas.height + bubble.radius;
            bubble.x = Math.random() * canvas.width;
        }

        // Dessin de la bulle
        ctx.beginPath();
        ctx.arc(bubble.x, bubble.y, bubble.radius, 0, Math.PI * 2);
        ctx.fillStyle = bubble.color;
        ctx.globalAlpha = bubble.opacity;
        ctx.fill();
        ctx.globalAlpha = 1;
        ctx.closePath();
    }

    requestAnimationFrame(animate);
}

animate(); // Lancer l'animation