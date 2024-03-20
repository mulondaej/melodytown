
    // const searchBtn = document.getElementById('searchBtn');
    // const searched = document.getElementById('searching');

    // searchBtn.addEventListener('click', () => {
    //     if (searched.style.display === 'none' || searched.style.display === '') {
    //         searched.style.display = 'block';
    //     } else {
    //         searched.style.display = 'none';
    //     }
    // });
    // ;

    //Media js
 document.getElementById('uploadMediaBtn').addEventListener('click', function () {
            var fileInput = document.getElementById('fileUploadMedia');
            var fileList = fileInput.files;

            for (var i = 0; i < fileList.length; i++) {
                var file = fileList[i];
                var reader = new FileReader();

                reader.onload = function (event) {
                    var mediaList = document.getElementById('media-list');
                    var listItem = document.createElement('li');
                    var img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.maxWidth = '200px'; // Adjust maximum width as needed
                    listItem.appendChild(img);
                    mediaList.appendChild(listItem);
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            }
        });