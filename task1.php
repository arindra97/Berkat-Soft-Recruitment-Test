<?php

function containLetters(string $firstWord, string $secondWord)
{
    // split the words into arrays
    $arr1 = str_split($firstWord);
    $arr2 = str_split($secondWord);

    // create a new array to store the letters
    $penampung = [];

    // loop through the first array
    for ($i = 0; $i < count($arr1); $i++) {
        // loop through the second array
        for ($j = 0; $j < count($arr2); $j++) {
            // create regex to check if the letter is in the second array
            $pattern = "/$arr1[$i]/i";

            // if the letters are the same, add them to the penampung array
            if (preg_match($pattern, $arr2[$j])) {
                $penampung . array_push($penampung, $arr2[$j]);
            }
        }
    }
    // create a new string from the penampung array
    $newWord = implode($penampung);

    // create regex to check if the new string contains letters
    $new_pattern = "/$firstWord/i";
    echo (preg_match($new_pattern, $newWord)) ? "true \n" : "false \n";
}

containLetters("brs", "berkatsoft");
containLetters("brs", "berkatco");
containLetters("brs", "BERKATsoft");
containLetters("brt", "BERKATsoft");
