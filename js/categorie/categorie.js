$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: '../functions/categorie/selectcategorie.php'
  })
  .done(function(result){
    $('#categorie').html(result)
  })
  .fail(function(){
    alert('Error');
  })
});
