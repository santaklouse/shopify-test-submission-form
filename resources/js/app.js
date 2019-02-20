import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle.js';
import 'jquery-typeahead/src/jquery.typeahead';

export default (function () {

    var guestRow = $('li.guest-data');
    var newGuestRow = guestRow.clone().appendTo('ul.parent-container');
    guestRow.hide();

    $(document).on('click', '#add-row', function() {
        var cloned = guestRow.clone();
        initAutosugest(cloned);
        cloned.appendTo( "ul.parent-container" );
        cloned.show();
    });

    $(document).on('click', '.remove-row', function(event) {
        event.preventDefault();
        $(this).closest('li').remove();
    });

    var initAutosugest = function(elem) {
        if (!elem) {
            elem = $(document);
        }
        if (!elem.hasClass('js-typeahead-user')) {
            elem = $('.js-typeahead-user', elem);
        }
        elem.typeahead({
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
                }
            },
            selector: {
                list: 'typeahead__list mt-0'
            },
            debug: false
        });

    };
    initAutosugest($('#leader-name'));
    initAutosugest(newGuestRow);
})();
