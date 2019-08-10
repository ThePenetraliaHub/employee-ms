<?php


function difference_in_time($start_time, $end_time)
{
	$end_time = new Carbon\Carbon($end_time);
    $start_time = new Carbon\Carbon($start_time);

    $hours = $end_time->diffInHours($start_time);
    $minutes = $end_time->diff($start_time)->format('%I');

    if($hours > 0 && $minutes > 0){
        return "$hours hrs and $minutes mins";
    }elseif($hours > 0){
        return  "$hours hrs";
    }elseif($minutes > 0){
        return "$minutes mins";
    }
}