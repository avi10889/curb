$(function() {

    // preventing page from redirecting
    $(".img_container").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(".img_container h5").text("Drag here");
    });

    $(".img_container").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

    // Drag enter
    $('.img_upload-area').on('dragenter', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".img_container h5").text("Drop");
    });

    // Drag over
    $('.img_upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(".img_container h5").text("Drop");
    });

    // Drop
    $('.img_upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();

        $(".img_container h5").text("Upload");

        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();

        fd.append('file', file[0]);

        uploadData(fd);
    });

    // Open file selector on div click
    $("#uploadfile").click(function(){
        $("#img_file").click();
    });

    // file selected
    $("#img_file").change(function(){
        var fd = new FormData();

        var files = $('#img_file')[0].files[0];

        fd.append('file',files);

        uploadData(fd);
    });
});

// Sending AJAX request and upload file
function uploadData(formdata){

    $.ajax({
        url: 'http://localhost/curbsidefilms/content_admin/pages/upload_img_files',
        type: 'post',
        data: formdata,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response){
            addThumbnail(response);
        }
    });
}

// Added thumbnail
function addThumbnail(data){
    $("#uploadfile h5").remove();
    var len = $("#uploadfile div.img_thumbnail").length;

    var num = Number(len);
    num = num + 1;

    var name = data.name;
    var size = convertSize(data.size);
    var src = data.src;

    // Creating an thumbnail
    $("#uploadfile").append('<div id="img_thumbnail_'+num+'" class="img_thumbnail"></div>');
    $("#img_thumbnail_"+num).append('<img src="http://localhost/curbsidefilms/admin_assets/page_images/'+name+'" width="100%" height="78%">');
    $("#img_thumbnail_"+num).append('<span class="img_size">'+size+'<span>');

}

// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}