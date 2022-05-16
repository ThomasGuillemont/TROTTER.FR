let reload = () => {
    fetch('/controllers/actuality-ajax-controller.php')

    .then((response)=> {
        //! string json encode for javascript
        return response.json();
    })

    .then(datas => {
        let actualityWithoutBan = datas.data.filter(posts => posts.users_banned == null )
        console.log(actualityWithoutBan);

        let actuality = [];
        actualityWithoutBan.forEach(posts => {

            console.log(posts, 'posts')

            if (actuality.length > 0) {
                console.log(actuality.length, 'length')

                actuality.forEach(items => {

                    console.log(items.id, posts.id);

                    // if (!(items.id == posts.id)) {
                    //     actuality.push(posts);
                    // }

                })
            } else {
                actuality.push(posts);
            }
        });
        console.log(actuality);

        idUserConnect = datas.user.id;

        // let actualityWithUserLikes = actuality.map()

//         let posts = '';
//         let newArray = [];
//         let likedPost = [];

//         datas.forEach(post => {

//             if(post.users_banned == null){
//                 console.log(likedPost)
//                 let active

//                 if(parseInt(post.likes_posts) == parseInt(post.id) && parseInt(post.likes_users) == parseInt(user_id_value)){
//                     likedPost.push(post.id)
//                 }
//                 console.log(newArray)
//                 if (!newArray.includes(post.id)) {
//                     newArray.push(post.id);

                    
//                     posts +=
//                         `<div class="d-flex flex-row justify-content-start mb-3 mt-3">`;

//                     if (parseInt(post.id_user) == parseInt(user_id_value)) {
//                         posts +=
//                             `<div class="d-flex flex-column my-message w-100">`;
//                     } else {
//                         posts +=
//                         `<div class="d-flex flex-column message w-100">`;
//                     }
//                         posts +=
//                                 `<div class="small d-flex align-item-start">
//                                     <img class="img-friends me-3 ms-2" src="${post.avatar}" alt="Image de profil">
//                                     <div class="d-flex flex-column align-self-center">
//                                         <p class="mb-0 fw-bold d-flex justify-content-start">
//                                             <a class="orange" href="/profil?id=${post.id_user}">${post.pseudo}</a>
//                                         </p>
//                                         <div class="d-flex justify-content-start">
//                                             <p class="mb-0 fst-italic fw-bold">${post.post_at}</p>
//                                         </div>
//                                     </div>
//                                 </div>
//                                 <p class="fs-6 ps-2 text-start mb-0 pt-3 mb-3">
//                                     ${post.post}
//                                 </p>`;
//                     if (parseInt(post.id_user) == parseInt(user_id_value)) {
//                         posts +=
//                             `<div class="d-flex justify-content-end fw-bold">
//                                 <div>
//                                     <a class="fst-italic small p-2" href="/modifier-actualité?id=${post.id}">Modifier</a>
//                                     <a class="fst-italic small p-2" href="supprimer-actualité?id=${post.id}">Supprimer</a>
//                                 </div>
//                             </div>`;
//                     } else {
//                         // console.log(likes.likes_id_users, 'ID_USER BDD');
//                         // console.log(user_id_value, 'ID_USER _ CONNECTER');
//                         // console.log(likes.likes_id_posts, 'ID_POST BDD');
//                         // console.log(post.id, 'ID_POST');
//                         // console.log(parseInt(likes.likes_id_users) == parseInt(user_id_value) && parseInt(likes.likes_id_posts) == parseInt(post.id) );
//                             posts +=
//                                 `<div class="d-flex justify-content-end fw-bold">
//                                     <div class="like ${likedPost.includes(post.id) ? 'is-active' : null}" data-id="${post.id}"></div>
//                                     <div class="d-flex align-self-end">
//                                         <a class="fst-italic small p-2" href="/signaler-actualité?id=${post.id}">Signaler</a>
//                                     </div>
//                                 </div>`;
                            
//                     }
//                     posts +=
//                         `</div>
//                         </div>`;

//                     ajax.innerHTML = posts;
//                 }
//             }
//         })

//             setInterval(reload,120000);

//         }).finally(() => {

//         let like = document.querySelectorAll('.like');
//         like.forEach((item) => {
//             item.addEventListener('click', (e) => {
                
//                 if (e.target.classList.contains('is-active')) {

//                     e.target.classList.remove('is-active');
//                     e.target.classList.add('is-inactive');
    
//                     let myForm = new FormData();
//                     myForm.append('id_post', e.target.dataset.id);
                    
//                     fetch('/controllers/remove-like-ajax-controller.php', {
//                         method: 'POST',
//                         body: myForm
//                     })
    
//                     .then((response) => {
//                         if (response.status == 200) {
//                             console.log('unlike');
//                         } else {
//                             console.log('unlike not work');
//                         }
//                     })
    
//                 } else {
    
//                     e.target.classList.remove('is-inactive');
//                     e.target.classList.add('is-active');
    
//                     let myForm = new FormData();
//                     myForm.append('id_post', e.target.dataset.id);
                    
//                     fetch('/controllers/like-ajax-controller.php', {
//                         method: 'POST',
//                         body: myForm
//                     })
    
//                     .then((response) => {
//                         if (response.status == 200) {
//                             console.log('like');
//                         } else {
//                             console.log('like not work');
//                         }
//                     })
//                 }

            // })})
    });
}

window.addEventListener('load', reload);