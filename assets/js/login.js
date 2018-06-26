function login(){
  data = $('#loginForm').serializeArray()

  $.ajax({
    url: base_url+"login/log_user",
    type: 'POST',
    dataType: 'json',
    data: data
  })
  .done(function(data) {
    window.location.href = base_url+'dashboard'
  })
  .fail(function(data) {
    errorHandler(data.responseJSON)
  })

}
