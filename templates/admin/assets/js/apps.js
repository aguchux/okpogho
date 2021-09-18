
(function ($) {

    "use strict"

    $("a[href='#']").click((e)=>{
        e.preventDefault();
    })
    $('.tinymce-classic').summernote();

})(jQuery);