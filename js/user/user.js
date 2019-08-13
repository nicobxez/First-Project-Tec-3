$(document).ready(function(){
  var path = $(location).attr('pathname')
  var pathfile = path.split('/')

  if (pathfile[3] === 'user.php'){
    imprimir_tabla()
  }

  if (pathfile[3] === 'updateuser.php'){
    mostrar_valores_inputs($(location).attr('search'))
  }
})

function imprimir_tabla(){
  $.ajax({
    url: '../functions/userc/select.php'
  })
  .done(function(result){
    $('#userslist').html(result)
    listen_delete()
  })
  .fail(function(){
    alert('Error');
  })
}

function mostrar_valores_inputs(search) {
  var search_array = search.split('=')
  var id_user = search_array[1]

  $.ajax({
    type: 'POST',
    url: '../functions/userc/select_by_id.php',
    data: {'id': id_user}
  })
  .done(function(result){
    if (!result) return alert('Hubo un error al cargar la información.')
    var obj = $.parseJSON(result)
    $('#user').val(obj.user)
    $('#id_user').val(obj.id_user)
  })
  .fail(function(){
    alert('Error');
  })
}

function listen_delete(){
  $('.delete').on('click', function(){
  return confirm('¿Seguro que desea eliminar este usuario?')
  })
}
