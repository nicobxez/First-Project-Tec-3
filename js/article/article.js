$(document).ready(function(){
  var path = $(location).attr('pathname')
  var pathfile = path.split('/')

  if (pathfile[3] === 'dashboard.php'){
    imprimir_tabla()
  }

  if (pathfile[3] === 'edit.php'){
    mostrar_valores_inputs($(location).attr('search'))
  }
})

function imprimir_tabla(){
  $.ajax({
    url: '../functions/article/select.php'
  })
  .done(function(result){
    $('#articles').html(result)
    listen_delete();
  })
  .fail(function(){
    alert('Error');
  })
}

function mostrar_valores_inputs(search) {
  var search_array = search.split('=')
  var id_article = search_array[1]

  $.ajax({
    type: 'POST',
    url: '../functions/article/select_by_id.php',
    data: {'id': id_article}
  })
  .done(function(result){
    if (!result) return alert('Hubo un error al cargar la información.')
    var obj = $.parseJSON(result)
    $('#title').val(obj.title)
    $('#content').val(obj.content)
    $('#id_article').val(obj.article_id)
  })
  .fail(function(){
    alert('Error');
  })
}

function listen_delete(){
  $('.delete').on('click', function(){
  return confirm('¿Seguro que desea eliminar este articulo?')
  })
}
