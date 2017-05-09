<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling the welcome page.
    | The controller shuffles cards, chooses cards and sorts cards.
    |
    */

    var $cards = [
        '2c', '3c', '4c', '5c', '6c', '7c', '8c', '9c', 'Tc', 'Jc', 'Qc', 'Kc', 'Ac',
        '2d', '3d', '4d', '5d', '6d', '7d', '8d', '9d', 'Td', 'Jd', 'Qd', 'Kd', 'Ad',
        '2h', '3h', '4h', '5h', '6h', '7h', '8h', '9h', 'Th', 'Jh', 'Qh', 'Kh', 'Ah',
        '2s', '3s', '4s', '5s', '6s', '7s', '8s', '9s', 'Ts', 'Js', 'Qs', 'Ks', 'As'
    ];

    // Sorts a deck of cards by the ordering above (using bubble sort)
    function bubble_sort($deck) {
        $size = count($deck);
        for ($i=0; $i<$size; $i++) {
            for ($j=0; $j<$size-1-$i; $j++) {
                if ($this->card_value($deck[$j+1]) < $this->card_value($deck[$j])) {
                    $this->swap($deck, $j, $j+1);
                }
            }
        }
        return $deck;
    }

    // Start: Bubble sort helpers
    function card_value($card) {
        $numerals = [
            '2' => 2, '3' => 3, '4' => 4, '5' => '5', '6' => 6,
            '7' => 7, '8' => 8, '9' => 9, 'T' => 10, 'J' => 11,
            'Q' => 12, 'K' => 13, 'A' => 14
        ];
        $suits = ['c' => 0, 'd' => 100, 'h' => 200, 's' => 300];

        return $numerals[$card[0]] + $suits[$card[1]];
    }
    function swap(&$deck, $index1, $index2) {
        $tmp = $deck[$index1];
        $deck[$index1] = $deck[$index2];
        $deck[$index2] = $tmp;
    }
    // End: Bubble sort helpers


    // Function that handles the welcome page
    public function index()
    {
        // Get and shuffle a deck of cards
        $cards = $this->cards;
        shuffle($cards);

        // Choose 10 and bubble sort
        $ten_cards = array_slice($cards, 0, 10);
        $ten_cards_sorted = $this->bubble_sort($ten_cards);

        return view('welcome')
            ->with('cards', $cards)
            ->with('ten_cards', $ten_cards)
            ->with('ten_cards_sorted', $ten_cards_sorted);
    }
}
