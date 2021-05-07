
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
        <title>REGISTRACIJA</title>
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
                    <img src="" class="logo"> <!--ubacite sliku po želji-->
                    <span class="text">SRBALJ</span><br>
                    <span class="text2">SPORTSKA<br>FIZIOTERAPIJA</span> <br>
                 </div>
            </header>
        </section>
        <form method="post" name="forma" action="prijava.php" onsubmit="return validacija();">
        <section class="prijavamoja">
            <div class="kontenjerprijave">
                <br><span class="spanprijava">PRIDRUŽI SE!</span><br>
                <br>
                <div style="font-size: 80px; color:white; padding-left: 30%;">
                <i class="fas fa-walking"></i>
                </div>
                <br><span class="ime_pr">UNESITE IME:</span>
                <br><input type="text" class="imeprijava" name="imeprijava" placeholder="Unesite ime:"><br>
                <br>
                <br><span class="prezime_pr">UNESITE PREZIME:</span>
                <br><input type="text" class="prezimeprijava" name="prezimeprijava" placeholder="Unesite prezime:"><br>
                <br>
                <br><span class="konbr">UNESITE KORISNIČKO IME:</span>
                <br><input type="text" class="korime" name="korime" placeholder="Korisničko ime:"><br>
                <br>
                <br><span class="emailsp">UNESITE E-MAIL:</span>
                <br><input type="email" class="email" name="email" placeholder="E-mail"><br>
                <br>
                <br><span class="konbr">UNESITE LOZINKU:</span>
                <br><input type="text" class="lozinka" name="lozinka" placeholder="Unesite lozinku:"><br>
                <br>
                <br><input type="submit" class="prijavise" name="prijavise"  ></button>
               
            </div>
        </section>
        </form>
       <script>
           function validacija(){
            var x = document.forms["forma"]["imeprijava"].value;
            var y = document.forms["forma"]["prezimeprijava"].value;
            var a = document.forms["forma"]["korime"].value;
            var b = document.forms["forma"]["lozinka"].value;
            if (x == "") {
            alert("Polje za ime mora biti popunjeno");
            return false;
            }else if(y == ""){
                alert("Polje za prezime mora biti popunjeno");
                return false;
            }else if(a == ""){
                alert("Polje za korisničko ime mora biti popunjeno");
                return false;
            }else if(b == ""){
                alert("Polje za lozinku mora biti popunjeno");
                return false;
            }else if(email.email.value ==""){
                alert("Polje za lozinku mora biti popunjeno");
                emailc.email.focus();
                return false;
            }else if(email.email.value.indexOf("@") < 1 || (email.email.value.lastIndexOf(".") - email.email.value.indexOf("@") < 2)){
                alert("Unijeli ste pogrešno napisanu e-mail adresu.");
                email.email.focus();
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
            $ime = $_POST['imeprijava'];
            $prezime = $_POST['prezimeprijava'];
            $email = $_POST['email'];
            $korime = $_POST['korime'];
            $lozinka = $_POST['lozinka'];
            $sql ="SELECT * FROM prijavasf WHERE korime = '$korime'";
            $insertion ="insert into prijavasf values ('$ime','$prezime','$email','$korime','$lozinka')";
            $result = mysqli_query($db,$sql);
                    
            if(mysqli_num_rows($result)>=1){
                echo '<script language="javascript">';
                echo 'alert("Korisničko ime je zauzeto.")';
                echo '</script>';
            }else
            if(mysqli_query($db,$insertion)){
                $_SESSION["imekori"]= "$korime";
                header("location: ponuda.php");
            }
            }
	
	
        ?>
        
    </body>

</html>