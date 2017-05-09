/**
 * JavaScript controlling the welcome page
 */


/*
 * Makes start button load the trick
 */
$('#start-button').click(function() {
    $('#home-cell').fadeOut(
        800,
        function() {
            $('#trick-cell').fadeIn(800, playTrick()).removeClass('hidden').css("display","table-cell");
        }
    );
});


/*
 * Main function that plays the trick
 */
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
        .fadeOut(function() { $(this).text("Not the bottom card... try to focus on one inside") })
        .fadeIn();

    // Raises and riffles the deck
    setTimeout((function() {
        riffleDeck();
    }), 8000);

    // Add functions to buttons
    $('#trick-button-1').click(function() {
        console.log("trick complete");
    });
    $('#trick-button-2').click(function() {
        // Hide buttons
        $('#trick-buttons').hide();

        setTimeout((function() {
            riffleDeck();
        }), 500);

        $('#trick-buttons').delay(6000).fadeTo(1000, 1);
    });

    // Reveal buttons
    $('#trick-buttons').delay(14000).fadeTo(1000, 1);
}


/*
 * Raises and riffles the deck. Then resets the deck to be riffle-able again.
 *
 * Total animation:  5000 ms
 *
 * Raise deck:       1300 ms
 * Pause:            2700 ms
 * Riffle:           1000 ms
 */
function riffleDeck() {
    // Raise deck
    $("#deck-top").animate({ borderTopLeftRadius: 10, borderTopRightRadius: 10 }, 1300);
    $("#card").animate({ height: 100 }, 1300);

    // Riffle deck
    setTimeout((function() {
        $("#deck-bottom").animate({ height: 75 }, 1000);
        $("#deck-top").animate({ borderTopLeftRadius: 0, borderTopRightRadius: 0, height: 0 }, 1000, function() {
            $("#card").css("height", "0");
        });
    }), 4000);

    // Reset deck
    $("#deck-top").css("height", "75px");
    $("#deck-bottom").css("height", "0");
}
