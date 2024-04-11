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
$imgY = 50;

$sql = "SELECT * FROM birthday";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $currentImg = $row['img'];
    $imgY = $row['imgY'];
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday <?= $name ?>🎂🎂🎂</title>
    <link rel="stylesheet" href="https://use.typekit.net/mtw8akb.css">
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <div class="content">
            <h2 class="text_shadows">Happy Birthday</h2>
        </div>
        <div class="btn-contain">
            <button class="btn"><img class="box_shadows" style="object-position: 50% <?= $imgY ?>%" src=" <?= $basePath.$currentImg ?>"></button>
            <div class="btn-particles"></div>
        </div>

        <div class="content">
            <h2 class="text_shadows2"> <?= $name ?>!</h2>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>