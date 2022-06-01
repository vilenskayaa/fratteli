function download(filename, textInput) {

    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8, ' + encodeURIComponent(textInput));
    element.setAttribute('download', filename);
    document.body.appendChild(element);
    element.click();
    //document.body.removeChild(element);
}
document.getElementById("btn")
    .addEventListener("click", function() {
        var text = document.getElementById("text").value;
        var filename = "cera_and_volte_adesso.pdf";
        download(filename, text);
    }, false);