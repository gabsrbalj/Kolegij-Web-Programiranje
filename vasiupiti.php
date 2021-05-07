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
        <link rel="stylesheet" type="text/css" href="vasiupiti.css">
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
                    <img src="" class="logo"> <!--ubacite željenu sliku-->
                    <span class="text">SRBALJ</span><br>
                    <span class="text2">SPORTSKA<br>FIZIOTERAPIJA</span> <br>
                 </div>
            </header>
        </section>
        <br><br><br><br><br><br><br>
        <br><br><br>
        <div class="zauredene">
	  <section>
        <form action="vasiupiti.php" method="POST" name="formica">
            <?php
            echo "<p>DOBRODOŠAO/LA" ."<br>".$_SESSION["imekori"] ."</p>";
            ?>
            <input type="text" name="korime" class="korime" placeholder="Unesite svoje ime:">
            <textarea name="comment" cols="50" rows="1" placeholder="Unesite komentar:" class="comment"></textarea><br>;
            <input type="submit"  name="komentar" class="komentar" value="Komentiraj">
        </form>
      </section>
      </div>
        <?php
            $user='root';
            $pass = '';
            $db = 'sportskaterapija';
            
            $db = new mysqli('localhost', $user, $pass, $db) or die ("unable to connect");
            
            echo "<br>";
                
            if(isset($_POST['komentar']) ){
                $korime = $_POST['korime'];
                $comment=$_POST['comment'];
                $sql ="SELECT * FROM upiti";
                $insertion ="INSERT INTO upiti (korime,comment) values ('$korime','$comment')";
                if(mysqli_query($db,$insertion)){
                    header("location: vasiupiti.php");
                }
                
            }
        ?>

        <div class="cc">
            <p>Svi komentari i naši odgovori </p>
            <h5>_____________________</h5>
	
            <?php

	            $conn = mysqli_connect("localhost","root","","sportskaterapija");
	            if($conn -> connect_error){
		            die("Failed:" . $conn->connect_error);
	            }
	
	            $sql = "SELECT korime,comment,odgovor FROM upiti";
	            $result = $conn->query($sql);
	
	            if($result->num_rows>0){
		            while($row = $result->fetch_assoc()){
                        echo "<br><br><h5>Ime korisnika:</h5>";
                        echo "<p><span class='imeupita'>" . $row["korime"] . "<br>" ."</span></p>";
                        echo "<br><br><h5>Komentar:</h5>";
                        echo "<p><span class='imeupita'>" . $row["comment"] . "<br>" ."</span></p>";
                        echo "<br><br><h5>Odgovor:</h5>";
                        echo "<p><span class='imeupita'>" . $row["odgovor"] . "<br>" ."</span></p>";
                        echo "<br><br><h5>_________________</h5>";
                        
		            }
	            }
	
		
            ?>
	            
        </div>
        

        
    </body>
</html>