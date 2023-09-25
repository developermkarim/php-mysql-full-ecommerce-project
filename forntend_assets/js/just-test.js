            // Check if there is more data available
            if (dataLoaded < 5) {
                // Show the remaining data (less than 5)
                $.ajax({
                    url: "your_php_script.php",
                    method: "POST",
                    data: { offset: offset, limit: 5 - dataLoaded },
                    success: function(response) {
                        $("#data-container").append(response);
                        dataLoaded += 5 - dataLoaded;
                    }
                });
            }

            // Check if no more data is available
            if (dataLoaded >= 10) {
                // Hide the "Load More" button and show a message
                $("#load-more").hide();
                $("#no-more-data").text("No More Data").show();
            }
        }
    });
}
