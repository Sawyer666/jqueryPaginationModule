;
(function ($) {
    $.fn.extend({
        Pagination: function (options) {
            init = function (options) {
                config = $.extend({
                    pages_wrap: "pages_wrap",
                    container: "main_data",
                    num_pages: 3,
                    par_page: 5,
                    path_data: "",
                    view_params: ''
                }, options);

                $('<div class="btn-toolbar"><div class="btn-group"></div></div>').appendTo('#' + config.pages_wrap);

                for (var i = 1; i <= config.num_pages; i++) {
                    $('<a href="#" class="btn btn-primary page"></a>').appendTo('.btn-group')
                        .text(i).attr("data-page", i).on('click', load);
                }
            };
            load = function (e) {
                e.preventDefault();
                var $this = $(this);
                $('.page.btn-warning').removeClass('btn-warning');
                $this.addClass('btn-warning');
                var page = $this.data('page');
                var url = "/jqueryPaginationModule/ajax.php";
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        page: page,
                        config: config
                    },
                    success: function (data) {
                        $('#' + config.container).hide().html(data).fadeIn('fast');
                    }
                });
            }
            init(options);
        }
    });
})(jQuery);
