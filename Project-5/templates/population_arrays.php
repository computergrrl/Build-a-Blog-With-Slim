<?php

$nouns = array('coffee cup' , 'small boy' , 'young woman' , 'little girl' ,
            'young man', 'old man' , 'beautiful woman' , 'tiger' , 'lampost',
              'fish' , 'candle' , 'bookstore clerk' , 'doctor' , 'lawyer' ,
              'teacher', 'babysitter' , 'hunter' , 'bowl of potpourri' ,
             'baby shark' , 'thumb drive');

$descriptives = array('harrowing', 'riveting', 'mysterious' , 'heartbreaking' ,
              'hilarious', 'spectacular' , 'romantic' , 'fast-paced' ,
              'classic');

$story = array('story' , 'tale' , 'journey' , 'adventure', 'saga' , 'comedy',
                'drama' , 'fable' , 'fantasy' , 'legend' , 'anectdote' ,
              'biography', );

$adj = array('adaptable' , 'alert' , 'high-pitched' , 'uptight' ,
            'talented' , 'spiritual' , 'hard-nosed' , 'hairy' , 'long-suffering' ,
            'talented' , 'sneaky' , 'shy' , 'evil' , 'happy-go-lucky');


$n1 = array_rand($nouns);
$n2 = array_rand($nouns);
if($n1 == $n2) {
  $n2 = ($n1 + 1);
}
$noun1 = $nouns[$n1];
$noun2 = $nouns[$n2];
$d = array_rand($descriptives);
$s = array_rand($story);
$a = array_rand($adj);

$title = "The " . $noun1 . " and the " . $noun2;
$description = "A " . $descriptives[$d] . " " . $story[$s] .
" about a " . $adj[$a] . " " . $noun1 . " and a " . $noun2 . ".";
echo $title;
echo "<br>";
echo $description;
