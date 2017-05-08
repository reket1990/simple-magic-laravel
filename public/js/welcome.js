/**
 * JavaScript controlling the welcome page
 */

$('#start-button').click(function() {
    // Load magic trick
    $('#home-cell').fadeOut(
        800,
        function() {
            $('#trick-cell').fadeIn(800, playTrick()).removeClass('hidden').css("display","table-cell");
        }
    );
});

function playTrick() {
    // Display instructions
    $("#instructions")
        .delay(2000)
        .fadeOut(function() { $(this).text("I will riffle through the cards") })
        .fadeIn()
        .delay(2000)
        .fadeOut(function() { $(this).text("Try to see one card in the deck") })
        .fadeIn()
        .delay(2000)
        .fadeOut(function() { $(this).text("Not the bottom card...try to focus on one inside") })
        .fadeIn();

    // Reveal buttons
    $('#trick-buttons').delay(10000).fadeTo(1000, 1);
}
