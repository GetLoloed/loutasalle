<?php
session_start();
require_once 'connect.php';
require_once 'layouts/header.php';
require_once 'layouts/navbar.php';
require_once 'function/functions.php';

$id = $_GET['id'];
$city = $_GET['city'];
$room_id = $_GET['room_id'];

$req = $pdo->query("select * from slot left join room r on r.id = slot.room_id left join feedback f on r.id = f.room_id  where slot.id = $_GET[id]");
$res = $req->fetchAll();

// Img list city
$city = fetchAllImages($pdo, $city, $id);
?>

<?php foreach ($res as $slot) { ?>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center"><?= $slot['name'] ?></h1>
                    <img width="100% " src="<?= $slot['picture_url'] ?>" alt="">
                    <h4 class="text-center"><?= $slot['city'] ?></h4>
                    <h4 class="text-center"><?= $slot['price'] . " " . ' €' ?></h4>
                    <p class="text-center"><?= $slot['description'] ?></p>
                    <h3 class="text-center">Informations complémentaires</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col">Arrivée : <?php dateConv($slot['arrival_date']); ?> </div>
                            <div class="col">Départ : <?php dateConv($slot['departure_date']); ?> </div>
                            <div class="col">Capacité : <?= $slot['capacity'] ?> </div>
                            <div class="col">Catégorie : <?= $slot['category'] ?> </div>
                            <div class="w-100"></div>
                            <div class="col">Adresse : <?= $slot['address'] ?></div>
                            <div class="col">Tarif : <?= $slot['price'] . ' ' . '€' ?></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-primary"
                           href="booking.php?id=<?= $slot['id'] . '&city=' . $slot['city'] . '&room_id=' . $slot['room_id'] ?>">Réserver</a>
                    </div>
                </div>
            </div>

            <h2>Nos autres produits à <?= $slot['city'] ?></h2>
            <?php for ($i = 0; $i < 4; $i++): ?>
                <?php if (isset($city[$i])): ?>
                    <a href="">
                        <img width="200" height="200" src="<?= $city[$i]['picture_url'] ?>" alt="room">
                    </a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
<?php } ?>


<?php require_once 'layouts/footer.php'; ?>
