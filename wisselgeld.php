<?php


$monnies = [
    50,
    20,
    10,
    5,
    2,
    1,
    0.5,
    0.2,
    0.1,
    0.05
];

try {
    if (is_numeric($argv[1]) && $argv[1] > 0) {
        $input = round($argv[1] / 0.05) * 0.05 + 0.00000001;

        calculate($monnies, $input);
    }

    elseif ($argv[1] == ' ' || $argv[1] == '') {
        throw new exception('Je hebt geen bedrag meegegeven dat omgewisseld dient te worden');
    }

    elseif (!is_numeric($argv[1])) {
        throw new exception('Je hebt geen geldig bedrag meegegeven');
    }

    elseif ($argv[1] == 0) {
        throw new exception('Je hebt geen wisselgeld');
    }
    
    elseif ($argv[1] <= -1) {
        throw new exception('Ik kan geen negatief bedrag wisselen');
    }

} catch (exception $ex) {
    echo $ex -> getMessage();
}


function calculate($monnies, $input) {

    foreach($monnies as $coin) {
        if (floor($input / $coin) > 0) {
            $times = floor($input / $coin);
            echo "$times x €$coin".PHP_EOL;
            $input -= $times * $coin;
        }
    }


}