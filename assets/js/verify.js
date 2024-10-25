

// document.addEventListener('DOMContentLoaded', function() {
//     const modal = document.getElementById('verifyModal');
//     modal.style.display = 'flex'; // Show the modal
// });

// // Handle the form submission
// document.getElementById('submitCode').addEventListener('click', function() {
//     const code = document.getElementById('verifyCode').value;

//     if (code === '') {
//         alert('Please enter the verification code.');
//     } else {
//         // Perform an AJAX request to send the verification code to the backend
//         verifyCode(code);
//     }
// });

// // Function to send the verification code to the backend
// function verifyCode(code) {
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', '/verification', true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//     // Send the verification code to the server
//     xhr.send('code=' + encodeURIComponent(code));

//     // Handle the server response
//     xhr.onload = function() {
//         if (xhr.status === 200) {
//             // Handle success
//             alert('Votre compte est maintenant verifié!');
//             window.location.href = '/connexion'; // Redirect to login or another page
//         } else {
//             // Handle error
//             alert('Mauvais code. Ressayez encore SVP!');
//         }
//     };
// }

document.addEventListener("DOMContentLoaded", function () {
    // Function to get the query parameters from the URL
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Get the verification token from the URL
    const verificationToken = getQueryParam('code');

    // If the token exists, populate the hidden input in the form
    if (verificationToken) {
        document.getElementById('verification_token').value = verificationToken;
    }

    // Handle form submission
    const form = document.getElementById('verificationForm');
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Prepare data to be sent to the server
        const formData = new FormData(form);

        // Send data to the server using fetch()
        fetch('verify.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Your account has been successfully verified!');
                window.location.href = "/accueil"; // Redirect to the home page
            } else {
                alert('Verification failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });
});