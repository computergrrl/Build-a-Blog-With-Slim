<?php

$nouns = array('sailor', 'small boy' , 'young woman' , 'little girl' ,
            'young man', 'old man' , 'beautiful woman' , 'tiger' , 'purse-snatcher',
              'fish' , 'single mom' , 'bookstore clerk' , 'doctor' , 'lawyer' ,
              'teacher', 'babysitter' , 'hunter' , 'private investigator' ,
             'baby shark' , 'teenage pop star', 'kung-fu master' , 'sumo wrestler');

$descriptives = array('harrowing', 'riveting', 'mysterious' , 'heartbreaking' ,
              'hilarious', 'spectacular' , 'romantic' , 'fast-paced' ,
              'classic');

$story = array('story' , 'tale' , 'journey' , 'adventure', 'saga' , 'comedy',
                'drama' , 'fable' , 'fantasy' , 'legend' , 'anectdote' ,
              'biography', );


$adj = array('adaptable' , 'alert' , 'high-pitched' , 'uptight' ,
            'talented' , 'spiritual' , 'hard-nosed' , 'hairy' , 'long-suffering' ,
            'talented' , 'sneaky' , 'shy' , 'evil' , 'happy-go-lucky', 'self-conscious',
            'understanding' , 'shrewd' , 'clairvoyant' , 'ridiculously clumsy',
            'irresponsible' , 'stuck-up' , 'paranoid');

$with = array('one hand' , 'a winning smile' , 'chickenpox' , 'a dangerous attitude' ,
                'two heads' , 'a pet toaster' , 'an addiction to Mah-Jong' ,
              'a nervous twitch' , 'a secret' , '32 children', 'dreadlocks' ,
              'a million dollars' , 'a TV talk show' , 'a lot of enemies' , '2 pregnant cats' ,
               'a top secret mission' );


    $n1 = array_rand($nouns);
    $n2 = array_rand($nouns);
    if($n1 == $n2) {
      $n2 = ($n1 + 1);
    }

    $w1 = array_rand($with);
    $w2 = array_rand($with);
    if($w1 == $w2) {
      $w2 = ($w1 + 1);
    }

    $noun1 = $nouns[$n1];
    $noun2 = $nouns[$n2];

    $with1 = $with[$w1];
    $with2 = $with[$w2];
    $d = array_rand($descriptives);
    $s = array_rand($story);
    $a = array_rand($adj);

    $title = "The " . $noun1 . " and the " . $noun2;
    $description = "A " . $descriptives[$d] . " " . $story[$s] .
    " about a " . $adj[$a] . " " . $noun1 .
    " with " . $with1 .
    " and a " . $noun2 .
    " with " . $with2 . ".";



    echo $title;
    echo "<br>";
    echo $description;
    echo "<br>";
    echo "<br>";
    for($i=0; $i<10; $i++) {
      echo $description;
    }
