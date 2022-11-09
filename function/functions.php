<?php

// Format date
function dateConv($d)
{
    $date = new DateTime($d);
    echo $date->format('d/m/Y');
}

// Fetch all images with city & id
function fetchAllImages($pdo, $city, $id)
{
    $req = $pdo->query("select * from slot left join room r on r.id = slot.room_id where slot.id = $id");
    $res = $req->fetchAll();
    return $res;
}

// Fetch feedbacks with id
function fetchFeedback($pdo, $room_id)
{
    $req = $pdo->query("select user.username as username, feedback.comment as comment, feedback.created_at as created_at, feedback.score as score from user left join feedback on feedback.room_id = $room_id order by feedback.created_at");
    $res = $req->fetchAll();
    return $res;
}

