$(document).ready(function() {
    $('#searchInput').on('input', function() {
        var query = $(this).val();
        if (query.trim() !== '') {
            $.ajax({
                url: '../backend/search_products.php',
                type: 'POST',
                data: { query: query },
                success: function(response) {
                    $('#searchResults').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error: ' + error);
                }
            });
        } else {
            // Clear search results if input is empty
            $('#searchResults').empty();
        }
    });
});