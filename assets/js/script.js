function volumeToggle(button) {
    var muted = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !muted);

    $(button).find("i").toggleClass("fa-volume-off");
    $(button).find("i").toggleClass("fa-volume-up");

}


function previewEnded(){
    //invert hidden or not
    $(".previewVideo").toggle();
    $(".previewImage").toggle();

}