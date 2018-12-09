$(document).on("submit", "form.js-register, form.js-login", e => {
  e.preventDefault();
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

  // if ($(form).hasClass(".js-login")) {
  //   var ajaxredirect = "ajax/login.php";
  // } else {
  //   var ajaxredirect = "ajax/register.php";
  // }

  $.ajax({
    type: "POST",
    url: $("form").hasClass("js-login")
      ? "ajax/login.php"
      : "ajax/register.php",
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
        _error.html(data.error).show();
      }
    })
    .fail(function ajaxFailed(e) {})
    .always(function ajaxAlwaysDoThis(data) {});

  return false;
});

// $(document).on("submit", "form.js-login", e => {
//   e.preventDefault();
//   var _form = $(this);
//   var _error = $(".js-error");

//   var dataObj = {
//     email: $("input[type='email']").val(),
//     password: $("input[type='password']").val()
//   };

//   // if (dataObj.password.length < 8) {
//   //   _error.text("Your password should be atleast 8 characters").show();
//   //   return false;
//   // }

//   _error.hide();

//   $.ajax({
//     type: "POST",
//     url: "ajax/login.php",
//     data: dataObj,
//     dataType: "json",
//     async: true
//   })
//     .done(function ajaxDone(data) {
//       // Whatever data is
//       console.log(data);
//       if (data.redirect !== undefined) {
//         window.location = data.redirect;
//       } else if (data.error !== undefined) {
//         _error.html(data.error).show();
//       }
//     })
//     .fail(function ajaxFailed(e) {})
//     .always(function ajaxAlwaysDoThis(data) {});

//   return false;
// });
