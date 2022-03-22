// load home
document.addEventListener('DOMContentLoaded', function() {
    // Random Hello
    let text = ["Bonjour", "Salut", "Bienvenue", "Coucou"];
    let randomText = text[Math.floor(Math.random() * text.length)];
    // Result
    randomHello.innerHTML = `${randomText} !`;
});