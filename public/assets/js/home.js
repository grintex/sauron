/**
 * TODO
 */

$(function() {
    console.log($('.basicAutoComplete'));
    $('.basicAutoComplete')
        .autoComplete({
            formatResult: function(item) {
                console.log('ttttt', item);
                var format = { id: 0, text: '', html: '' };
                var name = item.identificacao_corpo_hidrico || item.bacia;

                if(name == '') {
                    format.html = item.municipio;
                } else {
                    format.html = name + ', <small>' + item.municipio + '</small>';
                }

                if(item.ponto_referencia != '') {
                    format.html +=  ' <small>(' + item.ponto_referencia + ')</small>';
                }

                return format;
            }
        })
        .on('autocomplete.select', function(event, item) {
            console.log('Item selected:', item);
        });
});