document.getElementById("loginForm").addEventListener("submit", function(event) {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let errorMessage = document.getElementById("error-message");

    if (username === "" || password === "") {
        errorMessage.textContent = "All fields are required!";
        event.preventDefault(); // Stop form submission
    } else {
        errorMessage.textContent = "";
    }
});
