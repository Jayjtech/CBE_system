$(document).ready(function() {
    var users = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('users'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: 'users.php?query=%QUERY'
    });
    users.initialize();
    $('#users').typeahead(
            {
                hint: true,
                highlight: true,
                minLength: 2
            }, {
        name: 'users',
        displayKey: 'username',
        source: users.ttAdapter()
    });
});


$('#users').on('typeahead:selected', function(event, selection) {
    $.ajax({
        type: "POST",
        url: "data.php",
        data: {
            username: selection.username
        },
        success: function(data) {
            window.location.href = data;
        }
    });
    return false;
});
