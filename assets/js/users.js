function create() {
  data = $('#userForm').serializeArray();

  $.ajax({
    url: base_url+'users/store',
    type: 'POST',
    dataType: 'json',
    data: data
  })
  .done(function() {
    window.location.href = base_url+'users'
  })
  .fail(function(data) {
    errorHandler(data.responseJSON)
  })

}


function update() {
  data = $('#userForm').serializeArray();

  $.ajax({
    url: base_url+'users/update',
    type: 'POST',
    dataType: 'json',
    data: data
  })
  .done(function() {
    window.location.href = base_url+'users'
  })
  .fail(function(data) {
    errorHandler(data.responseJSON)
  })

}

function deleteUser(id) {
  $.ajax({
    url: base_url+'users/delete/'+id,
    type: 'POST',
    dataType: 'json',
  })
  .done(function() {
    window.location.href = base_url+'users'
  })
  .fail(function(data) {
    errorHandler(data.responseJSON)
  })
}
