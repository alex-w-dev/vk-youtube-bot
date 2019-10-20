$(document).ready(function(){
  function readFileAsText(){
    return new Promise(function (res) {
      const fileToLoad = document.getElementById("fileToLoad").files[0];

      const fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent){
        res(fileLoadedEvent.target.result);
      };

      fileReader.readAsText(fileToLoad, "UTF-8");
    });
  }
  function download(filename, text) {
    const element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
  }

  function saveInLocalStorage() {
    localStorage.setItem('text-field-value', $('#text-field').val());
  }
  function getFromLocalStorage() {
    return localStorage.getItem('text-field-value') || '';
  }

  $(`#remove-timestamps-btn`).click(function() {
    const lines = $('#text-field')
      .val()
      .replace(/\r\n|\n\r|\n|\r/g, "\n")
      .split("\n")
      .filter((line) => {
        return line.length && !/^(\d[\s\.\,\:\d]*\d)$/.test(line);
      });

    $(`#text-field`).val(lines.join('\r\n'));
  });

  $(`#text-field`).get(0).onkeydown = function() {
    saveInLocalStorage();
  };

  $(`#export-btn`).click(function() {
    download('captions.sbv', $('#text-field').val());
  });

  $(`#import-btn`).click(function() {
    readFileAsText().then((text) => {
      if ($(`#text-field`).val() && !confirm('Старые данные удалятся, продолжить?')) return;

      $(`#text-field`).val(text);
    })
  });

  (function init() {
    $(`#text-field`).val(getFromLocalStorage());
  })();
});