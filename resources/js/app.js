import './bootstrap';

$(document).ready(function() {
    $('#client_name').on('keyup', function() {
        var searchTerm = $(this).val();

        if (searchTerm.length > 2) {
            $.ajax({
                url: "{{ route('clients.search') }}",
                data: { search: searchTerm },
                success: function(data) {
                    $('#client_search_results').empty();
                    $.each(data, function(index, client) {
                        $('#client_search_results').append('<li><a href="#" data-client-id="' + client.id + '">' + client.firstname + ' ' + client.lastname + '</a></li>');
                    });
                }
            });
        }
    });

    $('#client_search_results').on('click', 'a', function() {
        var clientId = $(this).data('client-id');
        $('#client_select').val(clientId);
        $('#client_search_results').empty();
    });
});