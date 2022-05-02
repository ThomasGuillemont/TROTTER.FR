// load home
document.addEventListener('DOMContentLoaded', function() {
    // Random Hello
    let text = ["Quel plaisir de te voir", "Ah, enfin te revoilà", "On attendez que toi", "Salut biloute", "Hey, bonjour toi", "Bonjour, c'est aujourd'hui qu'on a rien de prévu"];
    let randomText = text[Math.floor(Math.random() * text.length)];
    // Result
    randomHello.innerHTML = `${randomText} !`;
});