/**
 * JavaScript controlling the welcome page
 */


/*
 * Function that hides a cell and loads another
 */
function loadCell(toUnload, toLoad, complete) {
    $(toUnload).fadeOut(
        800,
        function() {
            $(toLoad).fadeIn(800, complete).removeClass('hidden').css("display","table-cell");
        }
    );
}


/*
 * Main function that plays the trick
 */
function playTrick() {
    // TODO: Optimize displaying of instructions to be simpler with an array of strings

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
    setTimeout(function() {
        riffleDeck();
    }, 8000);

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
    $("#card > :nth-child(1)").show();  // Make first card visible
    $("#deck-top").animate({ borderTopLeftRadius: 10, borderTopRightRadius: 10 }, 1300);
    $("#card").animate({ height: 100 }, 1300);

    // Riffle deck
    setTimeout(function() {
        $("#deck-bottom").animate({ height: 75 }, 1000);
        $("#deck-top").animate({ borderTopLeftRadius: 0, borderTopRightRadius: 0, height: 0 }, 1000, function() {
            $("#card").css("height", "0");
        });
        for (i = 1; i < 52; i++) {
            setTimeout(function(i) {
                $("#card > :nth-child("+i+")").hide();
                $("#card > :nth-child("+(i+1)+")").show();
            }, 925/51*i, i);
        }
    }, 4000);

    // Reset deck
    $("#deck-top").css("height", "75px");
    $("#deck-bottom").css("height", "0");
    $("#card > :nth-child(52)").hide();
    $("#card > :nth-child(1)").show();
}


/*
 * Add functions to all the command buttons
 */

// Makes start button load the trick
$('#start-button').click(function() {
    loadCell('#home-cell', '#trick-cell', playTrick());
});

// Makes first trick button riffle cards again
$('#trick-button-1').click(function() {
    // Hide buttons
    $('#trick-buttons').hide();

    setTimeout(function() {
        riffleDeck();
    }, 500);

    $('#trick-buttons').delay(6000).fadeTo(1000, 1);
});

// Makes second trick button load the results
$('#trick-button-2').click(function() {
    // Load results page
    loadCell('#trick-cell', '#results-cell', function() { $('#results-card').delay(1000).fadeTo(1500, 1); });
});

// Makes start button load the trick
$('#results-button').click(function() {
    loadCell('#results-cell', '#bubble-sort-cell', null);
});