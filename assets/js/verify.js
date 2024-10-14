

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('verifyModal');
    modal.style.display = 'flex'; // Show the modal
});

// Handle the form submission
document.getElementById('submitCode').addEventListener('click', function() {
    const code = document.getElementById('verifyCode').value;

    if (code === '') {
        alert('Please enter the verification code.');
    } else {
        // Perform an AJAX request to send the verification code to the backend
        verifyCode(code);
    }
});

// Function to send the verification code to the backend
function verifyCode(code) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'confirmationMail.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Send the verification code to the server
    xhr.send('code=' + encodeURIComponent(code));

    // Handle the server response
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle success
            alert('Your account has been verified successfully!');
            window.location.href = 'login.php'; // Redirect to login or another page
        } else {
            // Handle error
            alert('Invalid verification code. Please try again.');
        }
    };
}