$(document).ready(function(){
//FOR BOOK
  $('#btn_add_book').click(function(event){
    event.preventDefault();
    if($('#title').val() && $('#author').val() && $('#category').val() && $('#count').val()){
    $.ajax({
        url: 'newbook.php',
        method: 'post',
        headers: {
             'Content-Type': 'application/json'
        },
        data: JSON.stringify({
          "title" : $('#title').val(),
          "author" : $('#author').val(),
          "category" : $('#category').val(),
          "count" : $('#count').val()
        })
    }).done(function(data){
      $('#flash').hide().html(data).fadeIn("slow");
      console.log('added successfully');

    }).fail(function(data){
      console.log('failed to update book');
    })
  }else{
    $('#flash').hide().html('<span class="text-danger"> Please fill all the fields </span>').fadeIn("slow");
  }
  })
//for student updation
  $('#btn_add_student').click(function(event){
    event.preventDefault();
    var e = document.getElementById("branch");
    var branch = e.options[e.selectedIndex].text;
      if($('#fullname').val() && $('#regno').val() && $('#rollno').val()){
    $.ajax({
        url: 'newuser.php',
        method: 'post',
        headers: {
             'Content-Type': 'application/json'
        },
        data: JSON.stringify({
          "fullname" : $('#fullname').val(),
          "regno" : $('#regno').val(),
          "rollno" : $('#rollno').val(),
          "branch" : branch,
          "role" : "student"
        })
    }).done(function(data){
      $('#flash').hide().html(data).fadeIn("slow");
    }).fail(function(data){
      console.log('failed to update user');
    })
  }else{
    $('#flash').hide().html('<span class="text-danger"> Please fill all the fields</span>').fadeIn("slow");
  }
  })
//for staff updation
  $('#btn_add_staff').click(function(event){
    event.preventDefault();
    var e = document.getElementById("department");
    var department = e.options[e.selectedIndex].text;
      if($('#fullname1').val() && $('#department').val() && $('#designation').val()){
    $.ajax({
        url: 'newuser.php',
        method: 'post',
        headers: {
             'Content-Type': 'application/json'
        },
        data: JSON.stringify({
          "fullname" : $('#fullname1').val(),
          "department" : department,
          "designation" : $('#designation').val(),
          "staff_id" : $('#staff_id').val(),
          "role" : "staff"
        })
    }).done(function(data){
      $('#flash1').hide().html(data).fadeIn("slow");
    }).fail(function(data){
      console.log('failed to update user');
    })
  }else{
    $('#flash1').hide().html('<span class="text-danger"> Please fill all the fields</span>').fadeIn("slow");
  }
  })
})
