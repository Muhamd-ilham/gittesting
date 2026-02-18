jQuery(document).ready(function($) {

    // CSF sortable nonaktif drag
    $(".csf-sortable-content").on("mousedown", function(event) {
        event.stopPropagation();
    });

    // Tambahkan tombol di setiap item
    $('.csf-sortable-item .csf-sortable-helper').each(function(){
        if( $(this).find('.csf-move-btns').length === 0 ){
        $(this).css('position','relative');
        $(this).append(
            '<div class="csf-move-btns">'+
            '<button type="button" class="move-up"><i class="fas fa-chevron-up"></i></button>'+
            '<button type="button" class="move-down"><i class="fas fa-chevron-down"></i></button>'+
            '</div>'
        );
        }
    });

    // Trigger customizer
    function cusTrigger() {
        var $trigger = $('.customizer-trigger input');
        var newVal = Date.now();
        $trigger.val(newVal);
        $trigger.trigger('change');
    }

    // Event tombol naik
    $(document).on('click', '.move-up', function(){
        var $item = $(this).closest('.csf-sortable-item');
        var $prev = $item.prev('.csf-sortable-item');
        if($prev.length){
            $item.insertBefore($prev);
            cusTrigger();
        }
    });

    // Event tombol turun
    $(document).on('click', '.move-down', function(){
        var $item = $(this).closest('.csf-sortable-item');
        var $next = $item.next('.csf-sortable-item');
        if($next.length){
            $item.insertAfter($next);
            cusTrigger();
        }
    });
});
