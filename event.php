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

<link href="css/event.css" rel="stylesheet">
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



</head>




<body>
<?php include("header.html"); ?>







    <main>
        <section id="modal">
            <div id="modal_content">
                <button class="modal_close">X</button>
                <h2 class="modal_navn"></h2>
                <div class="modal_date"></div>
                <div class="modal_place"></div>
                <div class="modal_time"></div>
                <div class="modal_pris"></div>
                <div class="modal_langbeskrivelse"></div>
                <img class="modal_image" src="" alt="">
            </div>
        </section>


        <section id="sorteringsknapper">
            <h1></h1>
            <div class="knapper">
                <button class="menu_item" data_kategori="alle">Alle</button>
                <button class="menu_item" data_kategori="Musik">Musik</button>
                <button class="menu_item" data_kategori="Film">Film</button>
                <button class="menu_item" data_kategori="Ord">Ord</button>
                <button class="menu_item" data_kategori="Scenekunst">Scenekunst</button>
                <button class="menu_item" data_kategori="Andet">Andet</button>
            </div>
        </section>

        <section class="events"></section>

        <template class="event_template">
            <article class="event_container">
                <div class="title"></div>
                <div class="date"></div>
                <div class="pris"></div>
                <a class="kob_billet" href="" target="_blank"><button class="kob_knap">Køb Billet</button></a>
                <div class="genre"></div>
                <img class="image" src="" alt="">
            </article>
        </template>

    </main>


 <script>


        document.addEventListener("DOMContentLoaded", getJson);
        let allEvents;
        let eventTarget = document.querySelector(".event_template");
        let eventOutPut = document.querySelector(".events");
        eventFilter = "alle";
        let modal = document.querySelector("#modal");
        async function getJson() {
            let jsonObject = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/Event/?per_page=100");
            allEvents = await jsonObject.json();
            console.log(allEvents);
            visEvents();
        }
        document.querySelectorAll(".menu_item").forEach(knap => {
            knap.addEventListener("click", filtrering);
        })
        function filtrering() {
            eventOutPut.textContent = "";
            eventFilter = this.getAttribute("data_kategori");
            visEvents();
        }
        function visEvents() {
            console.log("visEvents" + eventFilter);
            allEvents.reverse();
            allEvents.forEach(event => {
                if (eventFilter == event.acf.genre) {
                    udskriv();
                } else if (eventFilter == "alle") {
                    udskriv();
                }
                function udskriv() {
                    let klon = eventTarget.cloneNode(true).content;
                    klon.querySelector(".date").textContent = event.acf.date;
                    klon.querySelector(".pris").textContent = event.acf.pris + " kr";
                    klon.querySelector(".kob_billet").href = event.acf.kob_billet;
                    klon.querySelector(".title").textContent = event.title.rendered;
                    klon.querySelector(".image").src = event.acf.image;
                    klon.querySelector(".title").addEventListener("click", () => {
                        visModal(event);
                    })
                    klon.querySelector(".image").addEventListener("click", () => {
                        visModal(event);
                    })
                    klon.querySelector(".date").addEventListener("click", () => {
                        visModal(event);
                    })

                    klon.querySelector(".pris").addEventListener("click", () => {
                        visModal(event);
                    })

                    eventOutPut.appendChild(klon);
                }
            })
        }
        function visModal(eventene) {
            console.log("visModal");
            modal.classList.add("vis");
            modal.querySelector(".modal_navn").textContent = eventene.title.rendered;
            modal.querySelector(".modal_image").src = eventene.acf.image
            modal.querySelector(".modal_date").textContent = eventene.acf.date;
            modal.querySelector(".modal_time").textContent = "Kl." + eventene.acf.time;
            modal.querySelector(".modal_place").textContent = eventene.acf.place;
            modal.querySelector(".modal_pris").textContent = eventene.acf.pris + " Kr.";
            modal.querySelector(".modal_langbeskrivelse").innerHTML = eventene.content.rendered;

            modal.querySelector(".modal_close").addEventListener("click", skjulModal);
        }
        function skjulModal() {
            console.log("skjulModal");
            modal.classList.remove("vis");
        }
    </script>




<?php include("footer.html"); ?>
</body>


</html>

