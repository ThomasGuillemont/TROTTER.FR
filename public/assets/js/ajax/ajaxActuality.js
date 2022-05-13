let reload = () => {
    fetch('/controllers/actuality-ajax-controller.php')

    .then((response)=> {
        //! string json encode for javascript
        return response.json();
    })

    .then(datas => {
        let posts = '';
        let user_id_value = document.getElementById('id_user_input').value;

        datas[0].forEach(post => {
            datas[1].forEach(banned => {
                if(post.id_user != banned.id_users){
                        posts +=
                            `<div class="d-flex flex-row justify-content-start mb-3 mt-3">`
                    if (parseInt(post.id_user) == parseInt(user_id_value)) {
                        posts +=
                            `<div class="d-flex flex-column my-message w-100">`;
                    } else {
                        posts +=
                        `<div class="d-flex flex-column message w-100">`;
                    }
                        posts +=
                                `<div class="small d-flex align-item-start">
                                    <img class="img-friends me-3 ms-2" src="${post.avatar}" alt="Image de profil">
                                    <div class="d-flex flex-column align-self-center">
                                        <p class="mb-0 fw-bold d-flex justify-content-start">
                                            <a class="orange" href="/profil?id=${post.id_user}">${post.pseudo}</a>
                                        </p>
                                        <div class="d-flex justify-content-start">
                                            <p class="mb-0 fst-italic fw-bold">${post.post_at}</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-6 ps-2 text-start mb-0 pt-3 mb-3">
                                    ${post.post}
                                </p>`;
                if (parseInt(post.id_user) == parseInt(user_id_value)) {
                    posts +=
                        `<div class="d-flex justify-content-end fw-bold">
                            <div>
                                <a class="fst-italic small p-2" href="/modifier-actualité?id=${post.id}">Modifier</a>
                                <a class="fst-italic small p-2" href="supprimer-actualité?id=${post.id}">Supprimer</a>
                            </div>
                        </div>`;
                } else {
                    posts +=
                        `<div class="d-flex justify-content-end fw-bold">
                            <div class="like" data-id="${post.id}"></div>
                            <div class="d-flex align-self-end">
                                <a class="fst-italic small p-2" href="/signaler-actualité?id=${post.id}">Signaler</a>
                            </div>
                        </div>`;
                }
                    posts +=
                        `</div>
                        </div>`;
                        ajax.innerHTML = posts;
                }
            })
        })

        setInterval(reload,120000);
    }).finally(() => {
        let like = document.querySelector('.like');
        like.addEventListener('click', (e) => {
            e.target.classList.toggle('is-active');
            console.log(e.target.dataset.id);
            // je fetch en ajax post avec le e target id
            // fetch('/controllers/like-ajax-controller.php', {

        });
    })
}

reload();