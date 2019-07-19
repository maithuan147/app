jQuery(function($) {
    $('.js-cb-toggle-all').click(function() {
        var newVal = $(this).prop('checked');
        var selector = ':checkbox[id^="' + $(this).data('targets') + '"]';
        
        if ( $('body').has(selector) )
        {
        $(selector).each(function() {
            this.checked = newVal;
            $(this).trigger('change');
            $('.js-cb-post-toggle-all').change(function() {
                var newVal1 = $(this).prop('checked');
                var selector1 = ':checkbox[id^="' + $(this).data('targets') + '"]';
                
                if ( $('body').has(selector1) )
                {
                $(selector1).each(function() {
                    this.checked = newVal1;
                    $(this).trigger('change');
                });
                }
            });
            
            $('.js-cb-catagory-toggle-all').change(function() {
                var newVal2 = $(this).prop('checked');
                var selector2 = ':checkbox[id^="' + $(this).data('targets') + '"]';
                
                if ( $('body').has(selector2) )
                {
                $(selector2).each(function() {
                    this.checked = newVal2;
                    $(this).trigger('change');
                });
                }
            });

            $('.js-cb-tag-toggle-all').change(function() {
                var newVal3 = $(this).prop('checked');
                var selector3 = ':checkbox[id^="' + $(this).data('targets') + '"]';
                
                if ( $('body').has(selector3) )
                {
                $(selector3).each(function() {
                    this.checked = newVal3;
                    $(this).trigger('change');
                });
                }
            });
        });
        }
    });
});  

