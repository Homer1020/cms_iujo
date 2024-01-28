import './bootstrap';
// import $ from 'jquery'

const $info = document.getElementById('info')

if($info) {
  setTimeout(() => {
    $info.remove()
  }, 3e3);
}

$(document).ready(function() {
  $('#content').summernote({
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['insert', ['link']],
      ['view', ['codeview', 'help']]
    ],
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor`
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote`
  });
});