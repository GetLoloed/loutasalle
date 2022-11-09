<?php
$title = "Accueil";
session_start();
require_once 'connect.php';
require_once 'layouts/header.php';
require_once 'layouts/navbar.php';
require_once 'function/functions.php';

$req = $pdo->query("select *, slot.id as sid from slot left join room r on r.id = slot.room_id where status = 'libre' and slot.arrival_date > NOW()");
$res = $req->fetchAll();


?>

<div class="py-5">
    <div class="container">
        <div class="row hidden-md-up">
            <?php foreach ($res as $slot) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="<?= $slot['picture_url'] ?>" alt="">
                        <div class="card-block">
                            <h4 class="card-title"><?= $slot['name'] ?></h4>
                            <h6 class="card-subtitle text-muted"><?= $slot['price'] . " " . ' €' ?></h6>
                            <p class="card-text p-y-1"><?= $slot['description'] ?></p>
                            <h6><?php dateConv($slot['arrival_date']) ?>
                                au <?php dateConv($slot['departure_date']); ?> </h6>
                            <a class="btn btn-primary"
                               href="room.php?id=<?= $slot['sid'] . '&city=' . $slot['city'] . '&room_id=' . $slot['room_id'] ?>">Voir</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

