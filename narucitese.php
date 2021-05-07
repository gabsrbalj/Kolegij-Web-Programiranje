<?php
session_start();
?>
<?php
if(empty($_SESSION)){
	header("location:prijava1.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prijava</title>
        <link rel="stylesheet" type="text/css" href="sf_css.css">
        <link rel="stylesheet" type="text/css" href="prijava.css">
        <link rel="stylesheet" type="text/css" href="narucitese.css">
        <script src="https://kit.fontawesome.com/043b36f9b6.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <section class="sekcijaprijava">
            <header>
                <div class="sekcija">
                    <nav>
                        <ul>
                            <li><a href="http://localhost/sportskafizioterapija/po%c4%8detna.php">NASLOVNICA</a></li><br>
                            <li><a href="http://localhost/sportskafizioterapija/ponuda.php">PONUDA</a></li><br>
                            <li><a href="http://localhost/sportskafizioterapija/vasiupiti.php">VAŠI UPITI</a></li><br>
                            <li><a href="http://localhost/sportskafizioterapija/narucitese.php">NARUČITE SE</a></li><br>
                            <li><a href="http://localhost/sportskafizioterapija/prijava.php">REGISTRACIJA</a></li>
                            <li><a href="http://localhost/sportskafizioterapija/prijava1.php">PRIJAVA</a></li>
                            <li><a href="http://localhost/sportskafizioterapija/odjava.php">ODJAVA</a></li>
                        </ul>
                 </nav>
                    <img src="" class="logo"> <!-- ubacite sliku po želji-->
                    <span class="text">SRBALJ</span><br>
                    <span class="text2">SPORTSKA<br>FIZIOTERAPIJA</span> <br>
                 </div>
            </header>
        </section>
        <form method="post" name="forma1" action="narucitese.php">
         <section class="sekcijanarucite">
            <div class="con">
                <?php
                echo "<p>DOBRODOŠAO/LA<span class='imekorisnika'>" .".<br>". $_SESSION["imekori"] . ".<br>" ."</span></p>";
                ?>
                <br><br>
                <span class="termin">ZAKAŽITE TERMIN</span><br><br>
                <div class="awesome" style="font-size: 80px; color:white; padding-left: 30%;">
                <i class="far fa-calendar-check"></i>
                </div><br>
                <label for="ozljede" class="ozlj">Odaberite vrstu ozljede:</label>
                <br>
                <br>
                <select name="ozz" id="ozz">
                <option value="rame"name="ozz" class="ozz">Ozljeda ramena</option>
                <option value="lakat" name="ozz"class="ozz">Ozljeda lakta</option>
                <option value="koljeno" name="ozz"class="ozz">Ozljeda koljena</option>
                <option value="tetiva" name="ozz"class="ozz">Ozljeda tetiva</option>
                <option value="misici" name="ozz"class="ozz">Mišićne ozljede</option>
                <option value="nista"name="ozz" class="ozz">Ništa od navedenog</option>
                </select>
                <br><br>
                <p>Potrebna Vam je prijeoperativna ili poslijeoperativna rehabilitacija?</p><br>
                <input type="radio" id="operacija" name="operacija" value="da">
                <label for="age1" class="age33" name="age33"> DA</label><br>
                <br>
                <input type="radio" id="operacija1" name="operacija" value="ne">
                <label for="age2" class="age33" name="age33" > NE</label><br>  
                <br><label for="txt" class="txt1">Ako Vam je potrebna rehabilitacija unesite<br> o kojoj je operaciji riječ:</label>
                <br><br><input type="text" name="textt" id="textt" class="textt" placeholder="Unesite vrstu operacije:"><br>
                <br><br>
                <input type="submit"  name="narucise" class="narucise" value="Naruči se!">
               
            </div>
         </section>
        </form>
        <?php
            $user='root';
            $pass = '';
            $db = 'sportskaterapija';
            $db = new mysqli('localhost', $user, $pass, $db) or die ("unable to connect");
            
            echo "<br>";
            $id= $_SESSION["imekori"] ;
            
            if(isset($_POST['narucise'])){
                $operacija = $_POST['operacija'];
                $ozz = $_POST['ozz'];
                $textt = $_POST['textt'];
                $sql ="SELECT * FROM narudzba";
                $insertion ="INSERT INTO narudzba (operacija,ozz,textt,imekk) values ('$operacija','$ozz','$textt','$id')";
            if(mysqli_query($db,$insertion)){
                header("location: narucitese.php");
            }
                
            }

        ?>
    </body>

</html>