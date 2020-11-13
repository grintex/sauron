/**
 * TODO
 */

$(function() {
    $('.basicAutoComplete')
        .autoComplete({
            formatResult: function(item) {
                console.log('ttttt', item);
                var format = { id: 0, text: item.name, html: item.name };

                if(item.complement != '') {
                    format.html += ', <small>' + item.complement + '</small>';
                }

                return format;
            }
        })
        .on('autocomplete.select', function(event, item) {
            console.log('Item selected:', window.location.href + item.url, item);
            window.location.href = item.url;
        });
});