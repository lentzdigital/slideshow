var media_uploader = null;
var media          = [];

function open_media_uploader_image(e)
{
    e.preventDefault();

    media_uploader = wp.media({
        frame:    "post", 
        state:    "insert", 
        multiple: false
    });

    media_uploader.on("insert", function(){
        var json = media_uploader.state().get("selection").first().toJSON();
        var image = '<img width="150" src="' + json.url + '"><input type="hidden" name="image_url[]" value="' + json.url + '"';
        var input = '<input type="text" name="image_text[]" value=""';
        var toAppend = '<tr><td class="row-title">' + image + '</td><td>' + input + '</td></tr>';

        jQuery('.images').append(toAppend);
    });

    media_uploader.open();
}

jQuery(document).ready(function($){
    $('#uploadnewslide').click(open_media_uploader_image);
});