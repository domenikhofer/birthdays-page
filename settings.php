<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "birthday";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$basePath = 'https://twofold.swiss/wp-content/themes/hello-elementor-child/custom-widgets/team-widget/assets/images/';
$imgs = ['susan_conza.jpg', 'noe_robert.jpg', 'marius_deflorin.jpg', 'tarek_aly.jpg', 'mikedavid_burkhard.png', 'gianni_delle_donne.png', 'lukas_rosenmund.png', 'susanne_menger.png', 'eleanor_close_kraft.png', 'frank_hueber.png', 'raphael_hinder.png', 'charlotte_dupont.png', 'rolf_kuenzi.png', 'pascale_heijdemann.png', 'domenik_hofer.png', 'theo_dege.png', 'michael_maurantonio.png', 'clau_isenring.png', 'barbara_bunger.png', 'dani_keller.png', 'hanspeter_wagner.png', 'milena_strejcek.png', 'terence_gronowski.png', 'peter_vollenweider.png', 'selim_basyouni.png', 'jens_fischer.png', 'andres_henao.png', 'pana_vrontzos.png', 'werner_hutter.png', 'anonym_male.png', 'jeremy_becker.png', 'jendrik_becker.png', 'silvan_pfister.png', 'anonym_female.png', 'elias_schneider.png', 'silvan_varadi.png', 'sina_buchmann.png', 'tenzing_buffoli.png', 'julian_bachmann.png', 'luca_camacho.png', 'nicolas_bretscher.png', 'anonym_male.png', 'ilenia_castano.png', 'josy_fischer.png', 'leonie_mitondo.png', 'alexandra_dobler.png', 'julien_radler.png', 'pascal_schnyder.png', 'mai_vi_tran.png', 'elenia_walser.png', 'valentina_wey.png', 'celine_wenk.png', 'jamil_essifi.png', 'anonym_male.png', 'trinity_findlater.png', 'jennifer_meyer.png', 'dominic_christen.png', 'kiernan_wong.png', 'louis_zouaoui.png', 'damian_smit.png', 'benedict_brueck.png', 'finn_jantschge.png', 'luis_hotz.png', 'anastasia_calia.png', 'leonora_treichler.png', 'nicola_gassmann.png', 'remo_bergamin.png', 'simon_ebinger.png', 'alexander_staudacher.png', 'andri_camenisch.png', 'siiri_hinrikson.png'];

$name = 'Peter';
$currentImg = 'peter_vollenweider.png';
$imgX = 50;
$imgY = 50;

$sql = "SELECT * FROM birthday";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $currentImg = $row['img'];
    $imgX = $row['imgX'];
    $imgY = $row['imgY'];
}

if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("UPDATE birthday set name=?, img=?, imgY=? WHERE id=1");
    $stmt->bind_param("ssi", $_POST['name'], $_POST['img'], $_POST['imgY']);
    $stmt->execute();
    header('Location:/birthday');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Birthday Settings</title>
    <style>
        img {
            display: block;
            width: 100%;
            aspect-ratio: 2/3;
            object-fit: cover;
        }

        .preview {
            display: block;
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <main>


        <div class="b-example-divider"></div>

        <div class=" container-sm my-5">
            <form action="" method="post">
                <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <div class="col p-5 p-lg-5 pt-lg-3">
                        <h1 class="display-4 fw-bold lh-1">Einstellungen Geburtstags-Seite</h1>
                        <div class="form-floating mt-5 mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name" value="<?= $name ?>">
                            <label for="floatingInput">Name</label>
                        </div>
                        <div class="input-group">
                            <div class="form-floating flex-grow-1">
                                <input type="text" class="form-control" name="img" id="img" value="<?= $currentImg ?>">
                                <label for="img">Bild</label>
                            </div>
                            <button type="button" class="input-group-text btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#images">Bild auswählen</button>
                        </div>
                        <!-- <div class="row"> -->
                            <!-- <div class="col">
                                <div class="form-floating mt-3 mb-3 ">
                                    <input type="number" min="0" max="100" class="form-control imgXY" id="imgX" name="imgX" value="<?= $imgX ?>">
                                    <label for="imgX ml-3">Bildposition X (0-100)</label>
                                </div>
                            </div> -->
                            <!-- <div class="col"> -->
                            <div class="form-floating mt-3 mb-3 ">
                                    <input type="number" min="0" max="100" class="form-control imgXY" id="imgY" name="imgY" value="<?= $imgY ?>">
                                    <label for="imgY ml-3">Bildposition Vertikal (0-100)</label>
                                </div>
                            <!-- </div>
                        </div> -->

                        <img class="preview mb-5 mt-3 border border-5" style="object-position: <?= $imgX ?>% <?= $imgY ?>%" src="<?= $basePath . $currentImg ?>">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Speichern</button>
                            <!-- <a href="/birthday" class="btn btn-outline-secondary btn-lg px-4 me-md-2 fw-bold">Vorschau</a> -->
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>

        <div class="modal fade" id="images" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bild auswählen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row row-cols-4 row-cols-lg-5 ">
                            <?php
                            foreach ($imgs as $img) {
                                echo '  <div class="col mb-3 position-relative "><img data-img="' . $img . '" class="border ' . ($img == $currentImg ? 'border-success' : '') . ' border-5" loading="lazy" src="' . $basePath . $img . '"></div>';
                            }
                            ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Auswählen</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="b-example-divider mb-0"></div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let basePath = '<?= $basePath ?>'
        document.querySelectorAll('img.border').forEach(function(el, i) {
            el.addEventListener('click', function(event) {
                document.querySelectorAll('img.border').forEach(function(el2, i2) {
                    el2.classList.remove('border-success');
                })
                event.target.classList.add('border-success');
                document.querySelector('#img').value = event.target.dataset.img
                document.querySelector('.preview').src = basePath + event.target.dataset.img
               
            });

        })
        document.querySelectorAll('.imgXY').forEach(function(el, i) {
            el.addEventListener('input', function(event) {
                imgY = document.querySelector('#imgY').value
                document.querySelector('.preview').style.objectPosition = "50% " + imgY + "%"
            })
        })
    </script>

</body>

</html>