<?php

function getMax ($a, $b)
{
    $maxValue = 0;
    if ($a > $b && $a <= 42)
    {
        $maxValue = $a;
    }
    
    elseif ($b > $a && $b <= 42)
    {
        $maxValue = $b;
    }
    
    elseif ($a > $b && $a > 42)
    {
        $maxValue = $b;
    }
    
    elseif ($b > $a && $b > 42)
    {
        $maxValue = $a;
    }
    
    else
    {
        $maxValue = 0;
    }
    
    return $maxValue;
}
function grandTotal ($playerScores, $players)
{
    $winners = array();
    $total = 0;
    
    // Don't want to lose the score/player connection
    // sort($playerScores);
    
    // for ($i = 0; $i < 4; $i++)
    // {
    //     $total += $playerScores[$i];
    //     // $winner = max($playerScores);
    //     if ($playerScores[$i] > 42)
    //     {
    //         $winner = $playerScores[$i - 1];
    //         break;
    //     }
        
    //     if (min($playerScores) > 42)
    //     {
    //         echo "No winner!";
    //         break;
    //     }
    // }
    $max = 0;
    for ($i = 0; $i < 4; $i++) {
        if ($playerScores[$i] == 42) $max = 42;
        else if ($playerScores[$i] > $max && $playerScores[$i] < 42) $max = $playerScores[$i];
    }
    for ($i = 0; $i < 4; $i++) {
        if ($playerScores[$i] == $max) array_push($winners, $i);
        else $total += $playerScores[$i];
    }
    
    for ($i = 0; $i < count($winners); $i++) {
        echo "<h2>Winner is " . $players[$winners[$i]] . " with $total points!</h2>";
    }
}
?>
