$(document).on("submit", "form.js-login", "form.js-register", e => {
  e.preventDefault();
  var _form = $(this);
  var _error = $(".js-error");

  var dataObj = {
    email: $("input[type='email']").val(),
    password: $("input[type='password']").val()
  };

  if (dataObj.password.length < 8) {
    _error.text("Your password should be atleast 8 characters").show();
    return false;
  }

  _error.hide();

  $.ajax({
    type: "POST",
    url: _form.hasClass("js-register") ? "ajax/register.php" : "ajax/login.php",
    data: dataObj,
    dataType: "json",
    async: true
  })
    .done(function ajaxDone(data) {
      // Whatever data is
      console.log(data);
      if (data.redirect !== undefined) {
        window.location = data.redirect;
      } else if (data.error !== undefined) {
        _error.text(data.error).show();
      }
    })
    .fail(function ajaxFailed(e) {})
    .always(function ajaxAlwaysDoThis(data) {});

  return false;
});
