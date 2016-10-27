/**
 * Created by Admin on 25-10-16.
 */
function showUpload(){

    $("#upload").show();
}

function hideInsert() {

    /*document.getElementById("popoutInsert").style.display = "none"
     document.getElementById("InsertExpense").style.display = "none"
     document.getElementById("InsertIncome").style.display = "none"*/
    $("#upload").fadeOut(500);





}function preview_image()
{
    $('div#image_preview > img').remove();

    var total_file=document.getElementById("file1").files.length;
    for(var i=0;i<total_file;i++)
    {
        $('#image_preview').append("<img id='image' src='"+URL.createObjectURL(event.target.files[i])+"'>");
    }
    document.getElementById("upload-button").removeAttribute("disabled");

}



