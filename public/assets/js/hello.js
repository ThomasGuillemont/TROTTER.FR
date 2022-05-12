// hello
document.addEventListener('DOMContentLoaded', function() {
    let text = ["Quel plaisir de te revoir", "Ah, enfin te revoilà", "On attendait plus que toi", "Hey, coucou toi"];
    let randomText = text[Math.floor(Math.random() * text.length)];
    randomHello.innerHTML = `${randomText} !`;
});