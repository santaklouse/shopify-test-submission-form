import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle.js';
import 'jquery-typeahead/src/jquery.typeahead';

export default (function () {

    $(document).on('click', '#add-row', function() {
        $('li:last-child').clone().appendTo( "ul" );
    });

    $.typeahead({
        input: '.js-typeahead-user_v1',
        minLength: 1,
        order: "asc",
        dynamic: true,
        delay: 500,
        template: function (query, item) {
            return '<span class="name">{{name}}</span>'
        },
        source: {
            user: {
                display: "name",
                ajax: function (query) {
                    return {
                        type: "GET",
                        url: "/api/search/",
                        path: "response",
                        data: {
                            q: "{{query}}"
                        }
                    }
                }

            },
        },
        callback: {
            onClick: function (node, a, item, event) {
                console.log(item)
                $(node).closest('li').find('.phone-input').val(item.phone || '');
            },
            onSendRequest: function (node, query) {
                console.log('request is sent')
            },
            onReceiveRequest: function (node, query) {
                console.log('request is received')
            }
        },
        selector: {
            list: 'typeahead__list mt-0'
        },
        debug: true
    });

})();
