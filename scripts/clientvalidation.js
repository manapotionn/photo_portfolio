
$(document).ready(function () {

// whenever the user tries to submit the form
 $("#mainForm").on("submit", function() {
   // assume the form is valid, unless we find an invalid field
  formValid = true;
// check if the first name is empty
  nameIsValid = $("#name").prop("validity").valid;
// if the first name field is valid (has text in it),
  if(nameIsValid) {
  // hide the error
    $("#nameError").hide();
  } else { // (otherwise, if the first name field is empty)
  // show the error
    $("#nameError").show();
  // and don’t let the user submit the form
    formValid = false;
  }

  emailIsValid = $("#email").prop("validity").valid;
  if(emailIsValid) {
    $("#emailError").hide();
  } else {
    $("#emailError").show();
    formValid = false;
  }

  var phone = document.getElementById("phone_number").value;
  phoneIsValid = $("#phone_number").prop("validity").valid;
  var numbers = /^[0-9]+$/;

  if(((phoneIsValid && phone.length == 10 && phone.value.match(numbers)) || phone.length == 0) {
    $("#phoneNumberError").hide();
  } else {
    $("#phoneNumberError").show();
    formValid = false;
  }

  subjectIsValid = $("#subject").prop("validity").valid;
  if(subjectIsValid) {
    $("#subjectError").hide();
  } else {
    $("#subjectError").show();
    formValid = false;
  }

  intentIsValid = $("#message_type").prop("validity").valid;
  if(intentIsValid) {
    $("#intentError").hide();
  } else {
    $("#intentError").show();
    formValid = false;
  }

  messageIsValid = $("#message").prop("validity").valid;
  if(messageIsValid) {
    $("#messageError").hide();
  } else {
    $("#messageError").show();
    formValid = false;
  }

  return formValid;
});

});
