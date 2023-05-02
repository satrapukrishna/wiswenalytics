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
    var DshBrdCntnr = bodyHeight - 100;
    document.getElementById('DshBrd').setAttribute("style", "min-height:" + DshBrdCntnr + "px;");
});