$(document).ready(function(){

  $('#btn_search').click(function(event){
      event.preventDefault();
      $.ajax({
          url: 'search.php',
          method: 'post',
          headers: {
               'Content-Type': 'application/json'
          },
          data: JSON.stringify({
            "keyword" : $('#search').val()
          })
      }).done(function(data){

        data = JSON.parse(data);
        var append_data = '<table class="table table-striped"><thead><tr class="row-name"><th>Id</th><th>Name</th><th>Author</th><th>Category</th><th>Count</th> <th>Available</th></tr></thead><tbody id="tabcontent">';
            for (var i = 0; i <= data.length-1; i++) {
              var append_data = append_data.concat('<tr class="row-content"><td id="id">'+data[i].id+'</td><td id="name">'+data[i].title+'</td><td id="author">'+data[i].author+'</td><td id="category">'+data[i].category+'</td><td id="count">'+data[i].count+'</td><td>'+data[i].available+'</td></tr>');
            }
            append_data+='</tbody></table>';
            $("#result").html(append_data);

      }).fail(function(data){

      })

})
})
