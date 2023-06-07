<?php

//this function will escape the unescaped_string
function escap($esc)
{
    global $con;
    $results = mysqli_real_escape_string($con, $esc);

    return $results;
}
