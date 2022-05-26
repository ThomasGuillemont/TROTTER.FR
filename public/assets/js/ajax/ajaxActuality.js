let reload = () => {

    fetch("/controllers/actuality-ajax-controller.php")

    .then((response) => {
        //! string json encode for javascript
        return response.json();
    })

    .then((datas) => {
        let actualityWithoutBan = datas.data.filter(
        (posts) => posts.users_banned == null
        );

        let actualities = [];
        let tmp = new Set();
        idUserConnect = datas.user.id;

        let actualityWithUserLikedPosts = actualityWithoutBan.filter(actualityWithUserLikedPost => {
            if(actualityWithUserLikedPost.likes_users == idUserConnect) {
                return actualityWithUserLikedPost;
            }
        })
        let actualityWithUserLikedPostsIds =  actualityWithUserLikedPosts.map(actualityWithUserLikedPost => actualityWithUserLikedPost.id);

        actualityWithoutBan.forEach((post) => {
            if (!tmp.has(post.id) && !actualityWithUserLikedPostsIds.includes(post.id)) {
                    tmp.add(post.id);
                    actualities.push(post);
            } else if(!tmp.has(post.id)) {
                tmp.add(post.id);
                actualities.push({...post,  isLiked: true});
            }
        });

        let postBlock = "";

        actualities.forEach((post) => {
            let actionBtn = "";
            if (post.id_user == idUserConnect) {
            actionBtn = `
                        <a class="fst-italic small p-2" href="/modifier-actualite?id=${post.id}">Modifier</a>
                        <a class="fst-italic small p-2" href="supprimer-actualite?id=${post.id}">Supprimer</a>
                    `;
            } else {
                actionBtn = `
                    <div class="like ${post.isLiked && "is-active"}" data-id="${post.id}"></div>
                    <div class="d-flex align-self-end">
                        <a class="fst-italic small p-2" href="/signaler-actualite?id=${post.id}">Signaler</a>
                    </div>
                `;
            }

            let tagItem = `

                    <div class="d-flex flex-row justify-content-start mb-3 mt-3">
                        <div class="d-flex flex-column ${post.id_user == idUserConnect ? "my-message" : "message"} w-100">
                            <div class="small d-flex align-item-start">
                                <img class="img-friends m-2" src="${post.avatar}" alt="Avatar de l'utilisateur ${post.pseudo}">
                                <div class="d-flex flex-column align-self-center">
                                    <div class="mb-0 fw-bold d-flex justify-content-start">
                                        <a class="orange" href="/profil?id=${post.id_user}">${post.pseudo}</a>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p class="mb-0 fst-italic fw-bold">${post.post_at}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="fs-6 ps-2 text-start mb-0 pt-3 mb-3">
                                ${post.post}
                            </p>
                            <div class="d-flex justify-content-end fw-bold">
                                <div class="d-flex justify-content-end fw-bold">
                                    ${actionBtn}
                                </div>
                            </div>
                        </div>
                    </div>
                `;

            postBlock += tagItem;
        });
        document.querySelector("#ajax").innerHTML = postBlock;

    });

    setInterval(reload,120000);

    document.body.addEventListener('click', (e) => {
        let target = e.target;
        if (target.classList.contains('like')) {

            if (target.classList.contains('is-active')) {

                let myForm = new FormData();
                myForm.append('id_post', target.dataset.id);
                
                fetch('/controllers/remove-like-ajax-controller.php', {
                    method: 'POST',
                    body: myForm
                })

                .then((response) => {
                    if (response.status == 200) {
                        target.classList.remove('is-active');
                    }
                })

            } else {

                let myForm = new FormData();
                myForm.append('id_post', target.dataset.id);
                
                fetch('/controllers/like-ajax-controller.php', {
                    method: 'POST',
                    body: myForm
                })

                .then((response) => {
                    if (response.status == 200) {
                        target.classList.add('is-active');
                        setTimeout('reload', 1000);
                    }
                })
            }
        }
    })

};

window.addEventListener("load", reload);
