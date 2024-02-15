
    

        $(document).ready(function(){
            // Function to load posts initially
            loadPosts();

            // Function to load posts via AJAX
            function loadPosts() {
                $.ajax({
                    url: "load_posts.php", // Replace with your backend script to load posts
                    type: "GET",
                    success: function(response) {
                        $("#posts").html(response);
                    }
                });
            }

            // Function to handle form submission
            $("#postForm").submit(function(event) {
                event.preventDefault();
                var postData = $("#postContent").val();
                $.ajax({
                    url: "submit_post.php", // Replace with your backend script to submit posts
                    type: "POST",
                    data: {content: postData},
                    success: function(response) {
                        // Reload posts after successful submission
                        loadPosts();
                        // Clear textarea
                        $("#postContent").val('');
                    }
                });
            });
        });
    </script>
</body>
</html>
