
    // Random text
    let text = ["Enfin te voila ici", "Coucou toi", "Hello", "Comment ça va"];
    let randomText = text[Math.floor(Math.random() * text.length)];
    // Result
    draw.innerHTML = `${randomText}`;
