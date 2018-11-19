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





    <main>

        <!-- HVAD ER HUSET? -->

        <section class="container1" data-container1></section>
        <template data-template1>
    <article class="OmHuset">
    <h1 data-title1></h1>
    <p data-text1></p>
    <a class="mere" href="om.html"><button class="laes_mere">Læs mere</button></a>
    </article>
</template>




        <!-- NYHEDSBREV-->

        <section id="container">

            <div class=nyhedsbrev>
                <form>
                    <h4>NYHEDSBREV</h4>
                    <p>Tilmeld dig vores nyhedsbrev, og vær updaterede på nyeste event og aktiviteter i HUSET:KBH</p>
                    <div class="input-group">
                        <span class="input-group-label">
        <i class="fa fa-envelope"></i>
      </span>
                        <br>
                        <input class="input-group-field" type="name" placeholder="Navn" required> <br>
                        <input class="input-group-field" type="email" placeholder="Email" required> <br> <br>


                        <a href="tilmelding_index.html"><button class="button">Tilmeld</button></a>

                    </div>
                </form>
            </div>

        </section>




        <!-- STEDER -->



        <section class="container3" data-container3>
            <h1>HUSET'S SMÅ HUSE</h1>
        </section>

        <template class="eventtemplate" data_template3>
    <article class="eventsListview">
        <div class="title"></div>
        <p data-text3></p>
        <div class="mere" href="" target="_blank"><button class="laes_mere">Læs mere</button></div>
        <img class="image" src="" alt="">
    </article>

</template>


        <!-- FRIVLLIG -->
        <section class="container2" data-container2></section>
        <template data-template2>
    <article class="voluntaryListview">
        <p data-text2></p>
            <a href="frivillig.html">  <h2 data-title2></h2></a>

    </article>
</template>

    </main>

<footer></footer>





    <script>

        //    FUNKTION FOR "OM HUSET" & "STEDER"

        document.addEventListener("DOMContentLoaded", getJSON);
        let intro;
        let introTemplate = document.querySelector("[data-template1]");
        let introContainer = document.querySelector("[data-container1]");


        let events;
        let eventTemplate = document.querySelector("[data_template3]");
        let eventContainer = document.querySelector("[data-container3]");

        let voluntary;
        let voluntaryTemplate = document.querySelector("[data-template2]");
        let voluntaryContainer = document.querySelector("[data-container2]");


        //----------------

        async function getJSON() {
            let jsonData1 = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/pages?slug=home");
            intro = await jsonData1.json();
            visIntro();
            console.log(intro);

            let jsonData3 = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/places");
            events = await jsonData3.json();
            visEvents();
            console.log(events);

            let jsonData2 = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/frivillige?slug=bliv-frivillig");
            voluntary = await jsonData2.json();
            visVoluntary();
            console.log(voluntary);





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


        //    FUNKTION FOR "STEDER"
        function visEvents() {
            console.log(events);
            events.forEach(events => {
                let klon = eventTemplate.cloneNode(true).content;
                klon.querySelector(".title").textContent = events.title.rendered;

                klon.querySelector("[data-text3]").innerHTML = events.content.rendered;

                klon.querySelector(".mere").href = events.acf.se_mere;
                eventContainer.appendChild(klon);
            })
        }


        //    FUNKTION FOR "FRIVILLIG"

        function visVoluntary() {
            console.log(voluntary);
            voluntary.forEach(voluntary => {
                let klon = voluntaryTemplate.cloneNode(true).content;
                klon.querySelector("[data-text2]").innerHTML = voluntary.content.rendered;
                klon.querySelector("[data-title2]").textContent = voluntary.title.rendered;
                voluntaryContainer.appendChild(klon);
            })
        }
    </script>





<?php include("footer.html"); ?>
</body>


</html>
