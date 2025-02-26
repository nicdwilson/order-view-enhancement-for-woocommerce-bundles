jQuery(function($) {
    // Check for saved preference
    const userPref = localStorage.getItem('show_bundled_items');
    const $table = $('.woocommerce_order_items');
    const $link = $('.bundle-toggle-link');

    // Apply saved preference
    if (userPref === 'show') {
        $table.addClass('show-bundled-items');
        $link.text('Hide Bundled Items');
    }

    // Handle toggle click
    $('.bundle-toggle-link').on('click', function(e) {
        e.preventDefault();
        
        $table.toggleClass('show-bundled-items');
        
        if ($table.hasClass('show-bundled-items')) {
            $link.text('Hide Bundled Items');
            localStorage.setItem('show_bundled_items', 'show');
        } else {
            $link.text('Show Bundled Items');
            localStorage.setItem('show_bundled_items', 'hide');
        }
    });
});