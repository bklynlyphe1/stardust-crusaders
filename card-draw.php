<?php

/*
 * 00-12: Spades
 * 12-25: Hearts
 * 26-38: Clubs
 * 39-51: Diamonds
 */

 $card_draw = rand(0,51);  // [0-51] (Simulates Card Draw)

 if($card_draw < 13){
     $suit = "Spades";
     if($card_draw === 0){
         $rank = 'A';
    
     }else if($card_draw === 10){
         $rank = 'J';

     }else if($card_draw === 11){
         $rank = 'Q';
     }else if($card_draw === 12){
         $rank = "K";
     }else{
         $rank = $card_draw + 1;
     }

 }else if($card_draw < 26){
    $suit = "Hearts";
    $card_draw = $card_draw % 13;
    if($card_draw === 0){
        $rank = 'A';
   
    }else if($card_draw === 10){
        $rank = 'J';

    }else if($card_draw === 11){
        $rank = 'Q';
    }else if($card_draw === 12){
        $rank = "K";
    }else{
        $rank = $card_draw + 1;
    }

}else if($card_draw < 39){
    $suit = "Club";
    $card_draw = $card_draw % 13;
    if($card_draw === 0){
        $rank = 'A';
   
    }else if($card_draw === 10){
        $rank = 'J';

    }else if($card_draw === 11){
        $rank = 'Q';
    }else if($card_draw === 12){
        $rank = "K";
    }else{
        $rank = $card_draw + 1;
    }

}
else{
    $suit = "Diamonds";
    $card_draw = $card_draw % 13;
    if($card_draw === 0){
        $rank = 'A';
   
    }else if($card_draw === 10){
        $rank = 'J';

    }else if($card_draw === 11){
        $rank = 'Q';
    }else if($card_draw === 12){
        $rank = "K";
    }else{
        $rank = $card_draw + 1;
    }
}

echo "You drew the $rank of $suit";