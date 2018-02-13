$(document).ready(function(){

  $('#btn_add_book').click(function(event){
      event.preventDefault();
      if($('#users_id').val() && $('#book_id').val()){
					if(document.getElementById("r1").checked)
						insertStudent();
					else if(document.getElementById("r2").checked)
						insertStaff();

      }
      else{
      console.log( $('#users_id').val() );
      console.log( $('#book_id').val() );
          $('#flash').hide().html('<span class="text-danger"> Please fill all the fields ! </span>').fadeIn("slow");
      }
	})

function insertStaff(){
  //console.log('staff');
  $.ajax({
      url: 'issue_book.php',
      method: 'post',
      headers: {
           'Content-Type': 'application/json'
      },
      data: JSON.stringify({
        "user_id" : $('#users_id').val(),
        "book_id" : $('#book_id').val(),
        "role" : "staff"
      })
      }).done(function(data){
        $('#flash').hide().html(data).fadeIn("slow");
      }).fail(function(data){
        console.log(data);
      })

}

function insertStudent(){
  //console.log('student');
  $.ajax({
      url: 'issue_book.php',
      method: 'post',
      headers: {
           'Content-Type': 'application/json'
      },
      data: JSON.stringify({
        "user_id" : $('#users_id').val(),
        "book_id" : $('#book_id').val(),
        "role" : "student"
      })
      }).done(function(data){
        $('#flash').hide().html(data).fadeIn("slow");
      }).fail(function(data){
        console.log(data);
      })

}

})
