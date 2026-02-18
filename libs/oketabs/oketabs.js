jQuery(document).ready(function($) {
    // Ensure the first button and panel are active by default
    $(".oketabs-bttn").first().addClass("active");
    $(".oketabs-panel").first().addClass("active");

    // Handle tab button clicks
    $(".oketabs-bttn").on("click", function () {
        var index = $(this).index(); // Get the index of the clicked button

        // Remove active class from all buttons and panels
        $(".oketabs-bttn").removeClass("active");
        $(".oketabs-panel").removeClass("active");

        // Add active class to clicked button and corresponding panel
        $(this).addClass("active");
        $(".oketabs-panel").eq(index).addClass("active");
    });
});
