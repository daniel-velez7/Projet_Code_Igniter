document.addEventListener("DOMContentLoaded", function (event) {
    var footer = document.getElementById("footer");
    var element = document.body;
    var height = element.offsetHeight;
    if (height < (screen.height - footer.offsetHeight)) {
        document.getElementById("footer").classList.add('stikybottom');
    }
}, false);

document.addEventListener('readystatechange', (event) => {
    var footer = document.getElementById("footer");
    var element = document.body;
    var height = element.offsetHeight;
    if (height < (screen.height - footer.offsetHeight)) {
        document.getElementById("footer").classList.add('stikybottom');
    }
});