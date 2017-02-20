jQuery(document).ready(function() {
    var $ = jQuery;
    if ($('#insert-gallery').length > 0) {
        if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
            $(document).on('click', '#insert-gallery', function(e) {
                e.preventDefault();
                var button = $(this);
                var images = $('#images_div');

                wp.media.editor.send.attachment = function(props, attachment) {
                    if(attachment.type == "image"){
                        var html = "<figure style='margin-left: 0; margin-right: 10px; height: 120px; display: inline-block; position: relative'>" +
                                        "<span class='delete' style='position: absolute; right: 0; background: gainsboro; display: inline-block; padding: 5px 10px; font-weight: 500; cursor: pointer; font-size: 1rem;'>X</span>" +
                                        "<img src='" + attachment.url +"' style='height: 100%; width: auto;'>" +
                                        "<input type='hidden' name='image" + (images.children().length + 1) + "' value='" + attachment.url +"'>" +
                                    "</figure>";

                        images.append(html);
                    }
                    else {
                        alert('Debe agregar una imagen');
                        wp.media.editor.open(button);
                    }
                };

                wp.media.editor.open(button);
                return false;
            });
        }
    }
    $('#images_div .delete').on('click', function(){
        $(this).parent().remove();
    });

    $('#images_div').sortable();
});
