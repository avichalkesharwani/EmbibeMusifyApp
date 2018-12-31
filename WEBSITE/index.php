<!DOCTYPE html>
<html>
 <head>
  <title> Musify| Search Music Table Data by using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
 </head>
 <body>
  <br /><br />
  <div class="container" >
   <h2 align="center">Live Music Search</h2>
   <h3 align="center">Musify</h3>   
   <br /><br />
   <div align="center">
    <input type="text" name="search" id="search" placeholder="Artist Mood Activity" class="form-control" />
   </div>
   <ul class="list-group" id="result"></ul>
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $.ajaxSetup({ cache: false });
 $('#search').keyup(function(){
  $('#result').html('');
  $('#state').val('');
  var searchField = $('#search').val();
  var expression = new RegExp(searchField, "i");
  $.getJSON('data.json', function(data) {
   $.each(data, function(key, value){
    if (value.key.search(expression) != -1 || value.count.search(expression) != -1)
    {
        $('#result').append('<li class="list-group-item link-class">'+value.key+' | <span class="text-muted">'+value.count+'</span></li>');
    }
   });   
  });
 });
 
 $('#result').on('click', 'li', function() {
  var click_text = $(this).text().split('|');
  $('#search').val($.trim(click_text[0]));
  $("#result").html('');
 });
});
</script>
