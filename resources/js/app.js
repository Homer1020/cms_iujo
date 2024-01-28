import './bootstrap';

const $info = document.getElementById('info')

if($info) {
  setTimeout(() => {
    $info.remove()
  }, 3e3);
}