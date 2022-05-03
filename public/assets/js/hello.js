// load home
document.addEventListener('DOMContentLoaded', function() {
    // Random Hello
    let text = ["Quel plaisir de te revoir ici", "Ah, enfin te revoilà", "On attendez plus que toi", "Hey, coucou toi"];
    let randomText = text[Math.floor(Math.random() * text.length)];
    // Result
    randomHello.innerHTML = `${randomText} !`;
});