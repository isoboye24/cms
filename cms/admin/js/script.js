//tinymce.init({selector:'textarea'});
 
$(document).ready(function () {
  //Editor CKEditor
  ClassicEditor.create(document.querySelector('#body')).catch(error => {
    console.error(error);
  });
 
  // Rest of the code
 
  $('#selectAllBoxes').click(function (event) {
    if (this.checked) {
      $('.checkBoxes').each(function () {
        this.checked = true;
      });
    } else {
      $('.checkBoxes').each(function () {
        this.checked = false;
      });
    }
  });
 
  var div_box = "<div id='load-screen'><div id='loading'></div></div>";
  $('body').prepend(div_box);
 
  $('#load-screen')
    .delay(700)
    .fadeOut(600, function () {
      this.remove();
    });
});



function LoadUsersOnline()
{
    $.get("functions.php?onlineusers=result", function(data)
    {
          $(".onlineusers").text(data);
    });
}

//Calling the LoadUsersOnline() function in every 0.5s.
setInterval(function(){
    
    LoadUsersOnline();
    
}, 500);

