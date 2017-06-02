<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>

</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>



<div class="jumbotron">
    <div class="container text-center">
        <h1>My Portfolio</h1>
        <p>Some text that represents "Me"...</p>
        <h2>Plaats een bericht!</h2>
        <form class="form-style-7" method="POST" action="guestbook.php">
            <ul>
                <li>
                    <label for="email">Email</label>
                    <input type="email" name="email" maxlength="100">
                    <span>Vul een geldig e-mailadres in</span>
                </li>
                <li>
                    <label for="voornaam">Voornaam</label>
                    <input type="voornaam" name="voornaam" maxlength="100">
                    <span></span>
                </li>

                <li>
                    <label for="achternaam">Achternaam</label>
                    <input type="achternaam" name="achternaam" maxlength="100">
                    <span></span>
                </li>
                <li>
                    <label for="bericht">Bericht</label>
                    <textarea name="bericht" ></textarea>
                    <span>Vertel het eens!</span>
                </li>
                <li>
                    <input name="submit" type="submit">
                    <input type="reset" value="Reset">
                </li>
            </ul>
        </form>
</body>
        <?php
        $host = "localhost"; //host, meestal localhost
        $user = "root"; //user die op DB connecteert
        $pass = ""; //Password van de user die op DB connecteert
        $dbname = "gastenboek"; //Naam Database
        $con = mysqli_connect($host, $user, $pass, $dbname);

        if (mysqli_connect_errno($con))
        {
            echo "Connectie Database mislukt: " . mysqli_connect_error();
        }
        $result = mysqli_query($con, "SELECT * FROM portfolio");

        if (mysqli_num_rows($result) == 0)
        { // gastenboek is nog leeg
            echo 'Schrijf als eerste in het gastenboek!';
        } else
        {

            while ($row = mysqli_fetch_array($result))
            {
                ?>

                <div class="velden"> <!-- voor styling van alle echo's; zie CSS -->
                    <div class="header">
                        <div class="voornaam"><?php echo ($row['voornaam']); ?></div><!-- echo voornaam-->
                        <div class="achternaam"><?php echo ($row['achternaam']); ?></div><!-- echo achternaam-->
                        <!--     <div class="email"><//?php echo ($row['email']); ?></div> <!-- echo email-->
                        <div class="datetime">
                            <div class="date"><?php echo $row['date']; ?></div>  <!-- echo datum-->
                            <div class="tijd"><?php echo $row['time']; ?></div> <!-- echo tijd-->
                        </div>
                    </div>

                    <div class="bericht"><?php echo ($row['bericht']); ?></div> <!-- echo bericht-->

                </div>
            <?php } ?>


            <?php
        }
        mysqli_close($con); // sluit connectie
        ?>
        <div class="nieuw-bericht">
            <a class="button" href="guestbook.html">Plaats Nieuw Bericht</a> <!-- Nieuw bericht plaatsen -->
        </div>
    </div>
</div>

<div class="container-fluid bg-3 text-center">
    <h3>Some of my Work</h3><br>
    <div class="row">
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div><br>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>
<style>
.form-style-7{
max-width:400px;
margin:50px auto;
padding:20px;
font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-7 ul{
list-style:none;
padding:0;
margin:0;
}
.form-style-7 li{
padding: 9px;
border:1px solid #DDDDDD;
margin-bottom: 30px;
}
.form-style-7 li:last-child{
border:none;
}
.form-style-7 li > label{
margin-top: -19px;
padding: 2px 5px 2px 5px;
color: #B9B9B9;
font-size: 14px;
font-family: Arial, Helvetica, sans-serif;
}
.form-style-7 input[type="voornaam"],
.form-style-7 input[type="achternaam"],
.form-style-7 input[type="email"],
.form-style-7 input[type="bericht"],
.form-style-7 textarea,
.form-style-7 select
{
width: 100%;
display: block;
border: none;
line-height: 25px;
font-size: 16px;
font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-7 li > span{
background: #F3F3F3;
display: block;
padding: 3px;
margin: 0 -9px -9px -9px;
text-align: center;
color: #C0C0C0;
font-family: Arial, Helvetica, sans-serif;
font-size: 11px;
}
.form-style-7 textarea{
resize:none;
}
.form-style-7 input[type="submit"],
.form-style-7 input[type="reset"]{
background: #2471FF;
border: none;
padding: 10px 20px 10px 20px;
border-bottom: 3px solid #5994FF;
border-radius: 3px;
color: #D2E2FF;
}

</style>
</html>
