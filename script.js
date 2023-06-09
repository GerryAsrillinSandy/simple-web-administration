document
  .getElementById("userForm")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Send login credentials to the server for verification
    fetch("login.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ username: username, password: password }),
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (data) {
        if (data.success) {
          document.getElementById("result").innerHTML = "Login successful!";
          // Redirect to the admin panel or perform other actions
        } else {
          document.getElementById("result").innerHTML = "Login failed!";
        }
      })
      .catch(function (error) {
        console.log(error);
      });
  });
