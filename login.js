// rendered js
$('.message a').click(function () {
    $('form').animate({ height: "toggle", opacity: "toggle" }, "slow");
  });

// login script
function auth(event) {
    event.preventDefault();

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email == "admin@gmail.com" && password == "admin") {
      window.location.assign("index.php");
    }
    else if(email.length == 0 || password.length == 0) {
        alert("Empty Fields.");
        window.location.reload();
        // return true;
      }
    else {
      alert("Invalid Information.");
      window.location.reload();
      // return;
    }
  }