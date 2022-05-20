document.querySelector('#post').addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();

        let post = e.target.value;

        let data = new FormData();
        data.append('post', post);
    
        fetch('/controllers/actuality-post-ajax-controller.php', {
            method: 'POST',
            body: data
        }).then((response) => {
            return response.json()
        }).then((data) => {
            if (data.code == true) {
                document.getElementById('post').value="";
                reload();
            } else {
                $message = 'Erreur lors de la publication du post'
            }
        })
    }
});