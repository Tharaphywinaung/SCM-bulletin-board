function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
$(function(){
    if($('.type').val() == '0'){
        $('.type').before('<span class="change-txt">Admin</span>');
    }
    else{
        $('.type').before('<span class="change-txt">User</span>');
    }
});