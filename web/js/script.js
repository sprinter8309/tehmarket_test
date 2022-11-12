$("#tree-view-input").on('change', function(event, key, data, textStatus, jqXHR) {
    var redirect_index = $(this).attr('value');
    window.location = '/category/' + redirect_index;
});
