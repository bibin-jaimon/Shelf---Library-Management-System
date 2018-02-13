

$(document).ready(function(){

  //Extract cookie
  function getCookie(cookie_name) {
      var name = cookie_name + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }



$('#btn_login').click(function(event){
    event.preventDefault();
    $.ajax({
        url: 'login.php',
        method: 'post',
        headers: {
             'Content-Type': 'application/json'
        },
        data: JSON.stringify({
          "username" : $('#username').val(),
          "password" : $('#password').val()
        })
    }).done(function(data){
      console.log("res :"+data);

      //set cookies
           var d = new Date();
           d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
           //time of expire
           var expires = "expire" + d.toUTCString();
           //set cookie
           document.cookie = 'mycookie' + "=" + data + ";" + expires + ";path=/";

      if(data == 'admin'){
        window.location = '/lib/admin.html';
      }
      else if(data=='librarian'){
        window.location = '/lib/librarian.html';
      }
      else{
      $('#flash').hide().html(data).fadeIn("slow");
      }
    //  window.location = '/lib/login.html';
    }).fail(function(data){
      //data= JSON.parse(data);
      console.log(data);
    })
})
})
