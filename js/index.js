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

  
