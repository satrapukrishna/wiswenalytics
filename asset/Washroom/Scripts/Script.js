function ModalPopup() {
    if (document.getElementById('AppMdlHldr').getAttribute('class') == 'AppModalHldr Hide') {
        document.getElementById('AppMdlHldr').setAttribute('class', 'AppModalHldr');
    }
    else {
        document.getElementById('AppMdlHldr').setAttribute('class', 'AppModalHldr Hide');
    }
    return false;
}


