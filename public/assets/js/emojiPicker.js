// emoji
function addEmoji(emoji) {
  let inputEle = document.getElementById('post');
  input.value += emoji;
}

function toggleEmojiDrawer() {
  let drawer = document.getElementById('drawer');
  
  if (drawer.classList.contains('d-none')) {
    drawer.classList.remove('d-none');
  } else {
    drawer.classList.add('d-none');
  }
}