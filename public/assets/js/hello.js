// load home
document.addEventListener('DOMContentLoaded', function() {
    // Random Hello
    let text = ["Quel plaisir de te voir", "Ah, enfin te voila", "On attendez que toi"];
    let randomText = text[Math.floor(Math.random() * text.length)];
    // Result
    randomHello.innerHTML = `${randomText} !`;
});