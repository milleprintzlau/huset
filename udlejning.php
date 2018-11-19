<!DOCTYPE html>
<html style="background-image: url(baggrund.jpg)">

<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- FONT -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>HUSET:KBH udlejning</title>

    <meta name="description" content="HUSET:KBH" />


    <!-- Main Style -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/udlejning.css" rel="stylesheet">
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
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
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







    <section class="kontakt" data-container2></section>
    <template data-template2>

    <article class="voluntaryListview">
       <h2 data-title2></h2>
        <p data-text2></p>
     <img class="image" src="" alt="">
    </article>
</template>




    <!-- FLIPCARD-->
    <section id="flipcard">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/46066484_2225756301030314_5209367366621724672_n.png" alt="" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1>Salon K</h1>
                    <p>SalonK er en del af HUSET-KBH placeret centralt i hjertet af det gamle København</p>
                    <a href="https://huset-kbh.dk/udlejning/salon-k/" target="_blank">Læs mere</a>
                </div>
            </div>
        </div>


        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/46084902_192698418282227_8440791354430193664_n.png" alt="" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1>Balsalen </h1>
                    <p>I Balsalen kan der afhængig af bordopstilljng sidde fra 20 til 40 personer. I biografopstilling kan der være op til 60 personer. </p>
                    <a href="https://huset-kbh.dk/udlejning/balsalen/" target="_blank">Læs mere</a>
                </div>
            </div>
        </div>


        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/46084844_2496092330430839_8610991665601052672_n.png" alt="" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1>Stardust </h1>
                    <p>Stardust er et koncertlokale, der hvert år huser et meget stort antal koncerter. </p>
                    <a href="https://huset-kbh.dk/udlejning-venues-indreby-lokaler-kbh-huset/stardust/" target="_blank">Læs mere</a>
                </div>
            </div>
        </div>


        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="img/45981478_343300169766147_5525740850987925504_n.png" alt="" style="width:300px;height:300px;">
                </div>
                <div class="flip-card-back">
                    <h1>Husets Biograf</h1>
                    <p>Husets Biograf drives af Foreningen Husets Biograf (FHB). </p>
                    <a href="https://huset-kbh.dk/udlejning-venues-indreby-lokaler-kbh-huset/husets-biograf/" target="_blank">Læs mere</a>
                </div>
            </div>
        </div>









    </section>


    <script>


        //    FUNKTION FOR "UDLEJNING"

        document.addEventListener("DOMContentLoaded", getJSON);

        let voluntary;
        let voluntaryTemplate = document.querySelector("[data-template2]");
        let voluntaryContainer = document.querySelector("[data-container2]");



        async function getJSON() {

            let jsonData2 = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/udlejning");
            voluntary = await jsonData2.json();
            visVoluntary();
            console.log(voluntary);





        }





        //    FUNKTION FOR "FRIVILLIG"

        function visVoluntary() {
            console.log(voluntary);
            voluntary.forEach(voluntary => {
                let klon = voluntaryTemplate.cloneNode(true).content;
                klon.querySelector("[data-title2]").textContent = voluntary.title.rendered;
                klon.querySelector("[data-text2]").innerHTML = voluntary.content.rendered;
                klon.querySelector(".image").src = voluntary.acf.image;
                voluntaryContainer.appendChild(klon);
            })
        }
    </script>




<?php include("footer.html"); ?>
</body>





</html>
