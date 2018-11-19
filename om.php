<!DOCTYPE html>
<html style="background-image: url(baggrund.jpg)">
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- FONT -->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>HUSET:KBH</title>

<meta name="description" content="HUSET:KBH" />


<!-- Main Style -->
<link href="css/main.css" rel="stylesheet">
    <link href="footer.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet">


<!-- Fav Icon -->

<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">


<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<!--SOME LOGO-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>




<body>
<?php include("header.html"); ?>



<main>

<section class="container1" data-container1></section>
<template data-template1>
    <article class="OmHuset">
    <h1 data-title1></h1>
    <p data-text1></p>
    </article>

</template>

<a class="mere" href="index.html"><button class="laes_mere">TILBAGE</button></a>
</main>

<!-- Footer -->
<?php include "html/footer.html";?>






<script>

     //    FUNKTION FOR "OM HUSET" & "STEDER"

    document.addEventListener("DOMContentLoaded", getJSON);
     let intro;
        let introTemplate = document.querySelector("[data-template1]");
        let introContainer = document.querySelector("[data-container1]");



    //----------------

    async function getJSON (){
        let jsonData1 = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/om?slug=rammen-om-kulturen");
            intro = await jsonData1.json();
            visIntro();
            console.log(intro);





    }



  // FUNKTION FOR "OM"
     function visIntro() {
            console.log(intro);
            intro.forEach(intro => {
                let klon = introTemplate.cloneNode(true).content;
                klon.querySelector("[data-title1]").textContent = intro.title.rendered;
                klon.querySelector("[data-text1]").innerHTML = intro.content.rendered;

                introContainer.appendChild(klon);
            })
        }








</script>










<?php include("footer.html"); ?>
</body>



</html>
