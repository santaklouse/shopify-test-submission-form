import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle.js';
import 'jquery-typeahead/src/jquery.typeahead';

export default (function () {

    $(document).on('click', '#add-row', function() {

        console.log($('li.guest-data').length);
        console.log($('li.guest-data').is('hidden'));

        if ($('li.guest-data').length === 1 && $('li.guest-data').is('hidden')) {
            return $('li.guest-data').show();
        }
        var cloned = $('li.guest-data:last-child').clone();
        $('input', cloned).val('');
        initAutosugest(cloned);
        cloned.appendTo( "ul" );
        cloned.show();
    });

    $(document).on('click', '.remove-row', function(event) {
        event.preventDefault();
        var parent = $(this).closest('li');
        if ($('li.guest-data').length < 2) {
            return parent.hide();
        }
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
            debug: true
        });

    };
    initAutosugest();


})();
