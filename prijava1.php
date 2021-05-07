<?php
session_start();
?>
<?php
if(!empty($_SESSION)){
	header("location:početna.php");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prijava</title>
        <link rel="stylesheet" type="text/css"  href="sf_css.css">
        <link rel="stylesheet" type="text/css"  href="prijava.css">
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
                    <img src="" class="logo"> <!--ubacite svoju sliku ili open source-->
                    <span class="text">SRBALJ</span><br>
                    <span class="text2">SPORTSKA<br>FIZIOTERAPIJA</span> <br>
                 </div>
            </header>
        </section>
        <form method="post" name="forma" action="prijava1.php"onsubmit="return validacija();">
        <section class="prijavamoja">
            <div class="kontenjerprijave">
                <br><span class="spanprijava">PRIJAVI SE!</span><br>
                <br>
                <div style="font-size: 80px; color:white; padding-left: 30%;">
                <i class="fas fa-walking"></i>
                </div>
                <br>
                <br><span class="konbr">UNESITE KORISNIČKO IME:</span>
                <br><input type="text" class="korime" name="korime" placeholder="Korisničko ime:"><br>
                <br>
                <br><span class="konbr">UNESITE LOZINKU:</span>
                <br><input type="text" class="lozinka" name="lozinka" placeholder="Unesite lozinku:"><br>
                <br>
                <br><input type="submit" class="prijavise" name="prijavise" onsubmit="validacija()" ></button>
            </div>
        </section>
        </form>
        <script type="text/javascript">
            function validacija() {
              var a = document.forms["forma"]["imeprijava"].value;
              var b = document.forms["forma"]["prezimeprijava"].value;
              var c = document.forms["forma"]["kontakt"].value;
              if(a=="" || a==null ||  b=="" || b==null || c=="" || c==null){
                  alert("Molimo Vas popunite SVA polja prijave.!");
                  return false;
              }
            }
        </script>
        <?php
            $user='root';
            $pass = '';
            $db = 'sportskaterapija';
            
            $db = new mysqli('localhost', $user, $pass, $db) or die ("unable to connect");
            
            echo "<br>";
                
            if(isset($_POST['prijavise'])){
             $korime = $_POST['korime'];
             $lozinka = $_POST['lozinka'];
             $sql = "SELECT * FROM prijavasf WHERE korime = '$korime' AND lozinka = '$lozinka'";
             $result = mysqli_query($db,$sql);
             $row = mysqli_fetch_array($result);
                if($result -> num_rows > 0){
                    $_SESSION ["imekori"] = "$korime";
                    header("location: ponuda.php");
                }else{
                    echo '<script language="javascript">';
                    echo 'alert("Niste unijeli ispravno korisničko ime ili lozinku!")';
                    echo '</script>';
                }
            }
                    
        ?>
</body>
</html>