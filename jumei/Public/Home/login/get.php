
(function () {
var load = function() {
    var node, scripts = document.body.getElementsByTagName("script"),
    src = "https://api.geetest.com/get.php?gt=064db254049f316e75b404fd9bb4f54e&product=float";
    for (var i = 0; i < scripts.length; i++) {
        if (scripts[i].src == src) {
            node = scripts[i];
            if(window.Geetest) {
                new Geetest({"gt": "064db254049f316e75b404fd9bb4f54e", "product": "float", "height": 116, "logo": true, "theme_version": "3.0.15", "id": "a4e8a07ef7bffaa01809e4f9beca1db7c", "slice": "pictures/gt/77a5d4270/slice/28e78de0.png", "theme": "golden", "version": "3.0.34", "imgserver": "https://static.geetest.com/", "https": true, "type": "slide", "xpos": 0, "bg": "pictures/gt/77a5d4270/bg/28e78de0.jpg", "fullbg": "pictures/gt/77a5d4270/77a5d4270.jpg", "staticserver": "https://static.geetest.com/", "ypos": 28, "link": "", "mobile": false, "challenge": "4e8a07ef7bffaa01809e4f9beca1db7c79", "apiserver": "https://api.geetest.com/", "clean": false}, true).appendTo(node, true);
            }
            else {
                setTimeout(load, 100);
            }
            break;
        }
    }
};
if(!document.getElementById('gt_lib')) {
    var s = document.createElement('script');
    s.id = 'gt_lib';
    s.src = 'https://static.geetest.com/static/js/geetest.3.0.34.js';
    s.charset = 'UTF-8';
    s.type = 'text/javascript';
    document.getElementsByTagName('head')[0].appendChild(s);
    var loaded = false;
    s.onload = s.onreadystatechange = function () {
        if (!loaded && (!this.readyState || this.readyState === 'loaded' || this.readyState === 'complete')) {
            loaded = true;
            if (typeof window.gt_onload == 'function'){
                window.gt_onload(false);
            }
        }
    };
}
load()
}());
