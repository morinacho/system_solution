$(document).ready(function() {
    //Function which allows only the entry numbers
    $('.justNumbers').keypress(function(e) {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 48) || (keynum == 56))
            return true;
        return /\d/.test(String.fromCharCode(keynum));
    });
});