function checkPassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpass").value;
    var errorMessage = document.getElementById("error-message");
    var submitBtn = document.getElementById("submitBtn");
    if (password !== confirmPassword) {
        alert("pass does not match ");
      errorMessage.textContent = "Passwords do not match!";
      document.getElementById("password").style.borderColor = "red";
      document.getElementById("confirmpass").style.borderColor = "red";
      submitBtn.disabled = true;
      console.log("error");
      return false;
    }
    else {
      submitBtn.disabled = false;
      console.log("fine");
      return true;
    }
  }


  /////////
function isValidEmail(email, domains) {
  var domainRegex = domains.map(domain => domain.replace(/\./g, "\\.")).join("|");
  var emailRegex = new RegExp("^[a-zA-Z0-9._%+-]+@(" + domainRegex + ")$");
  console.log("Email: ", email);
  console.log("Regex: ", emailRegex);
  return emailRegex.test(email);
}

function validating() {
  var emailInput = document.getElementById('form3Example3');
  var email = emailInput.value;
  var domains = ["gmail.com", "yahoo.com"];
  if (isValidEmail(email, domains)) {
    //console.log("Valid email address.");
    //alert("Valid email address.");
  } else {
    console.log("Invalid email address.");
    alert("Invalid email address.");
  }
}



  
  
