function errorHandler(errors) {
  //show the hidden alert box
  $('.alert').show()

  //resting if there's any previous errors
  $('.alert ul').html('')

  // looping throght errors
  $.each(errors, function(index, fieldErrors) {

      $.each(fieldErrors, function(index, error) {
          $('.alert ul').append('<li>'+error+'</li>')
      });

  });
}
