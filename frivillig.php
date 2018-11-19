<!DOCTYPE html>
<html style="background-image: url(baggrund.jpg)">
<head>

    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- FONT -->
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>HUSET:KBH Frivillig</title>

    <meta name="description" content="HUSET:KBH" />


    <!-- Main Style -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/frivillig.css" rel="stylesheet">
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



    <!-- FRIVLLIG -->
    <section class="frivillig" data-container2></section>
    <template data-template2>
    <article class="voluntaryListview">
       <h2 data-title2></h2>
        <p data-text2></p>
     <img class="image" src="" alt="">
    </article>
</template>



    <!-- FRIVLLIG -->
    <div id="contact" class="page">

        <h1>Send os en ansøgning</h1>
        <div class="container">


            <div class="row">
                <div class="span9">

                    <form id="contact-form" class="contact-form" action="#">
                        <p class="contact-name">
                            <input id="contact_name" type="text" placeholder="Fulde Navn" value="" name="name" />
                        </p>

                        <p class="contact-subject">
                            <input id="contact_name" type="text" placeholder="Afdeling" value="" name="name" />
                            <select id="Afdeling" name="Afdeling">
      <option value="Bip Bip Bar">Bip Bip Bar</option>
      <option value="Biograf">Husets Biograf</option>
      <option value="TeaterHUSET">TeaterHUSET</option>
      <option value="Bastard Café">Bastard Café</option>
    </select>
                        </p>




                        <p class="contact-email">
                            <input id="contact_email" type="text" placeholder="Email Address" value="" name="email" />
                        </p>
                        <p class="contact-message">
                            <textarea id="contact_message" placeholder="Your Message" name="message" rows="15" cols="40"></textarea>
                        </p>
                        <p class="contact-submit">
                            <br>
                            <a id="contact-submit" class="submit" href="#">Send Your Email</a>
                        </p>

                        <div id="response">

                        </div>
                    </form>

                </div>


            </div>

        </div>
    </div>




    <script>

        //    FUNKTION FOR "OM HUSET" & "STEDER"

        document.addEventListener("DOMContentLoaded", getJSON);

        let voluntary;
        let voluntaryTemplate = document.querySelector("[data-template2]");
        let voluntaryContainer = document.querySelector("[data-container2]");



        async function getJSON() {

            let jsonData2 = await fetch("http://milleprintzlau.dk/huset/wordpress/wp-json/wp/v2/frivillige?slug=husets-frivilligteam%22");
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
