function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}


$(document).ready(function () {
    var bodyHeight = getDocHeight();
    var scrollPos = document.documentElement;
    var XscrollPos = (window.pageXOffset || scrollPos.scrollLeft) - (scrollPos.clientLeft || 0);
    var YscrollPos = (window.pageYOffset || scrollPos.scrollTop) - (scrollPos.clientTop || 0);
    var viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)
    document.getElementById('MnCtnr').setAttribute("style", "min-height:" + bodyHeight + "px;");
});

$(function () {
    try {
        $('.bxslider').bxSlider({
            mode: 'horizontal',
            minSlides: 1,
            maxSlides: 5,
            moveSlides: 1,
            slideWidth: 600
        });
    }
    catch (e) {
    }
});

function MblMenu() {
    try {
        if (document.getElementById('DshbrdLft').getAttribute('class') == 'DshBrdLnk') {
            document.getElementById('DshbrdLft').setAttribute('class', 'DshBrdLnk MblActive');
            document.getElementById('DshbrdRgt').setAttribute('class', 'DshBrdHdr MblActive');
            document.getElementById('DshbrdRgtCtnr').setAttribute('class', 'DshBrdCtnr MblActive');
            document.getElementById('MblMenuBtn').setAttribute('class', 'MenuTggle MblActive');
        }
        else {
            document.getElementById('DshbrdLft').setAttribute('class', 'DshBrdLnk');
            document.getElementById('DshbrdRgt').setAttribute('class', 'DshBrdHdr');
            document.getElementById('DshbrdRgtCtnr').setAttribute('class', 'DshBrdCtnr');
            document.getElementById('MblMenuBtn').setAttribute('class', 'MenuTggle');
        }
        return false;
    }
    catch (e) {
    }
}