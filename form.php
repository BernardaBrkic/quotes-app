<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" ncontent="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet"/>
    <script src="script.js"></script>
    <link rel="icon" href="Images/favicon.png" type="image/png"/>
    <title>Unos</title>
</head>
<body>
    <header>
        <div class="wrapper" id="overflow">
            <nav class="topnav" id="myTopnav">
                <a href="main.xml" class="logo">CITATI</a>
                <a href="login.php">PRIJAVA</a>
                <a href="form.php">UNESI CITAT</a>
                <a href="about.html">O NAMA</a>
                <a href="javascript:void(0);" class="icon" onclick="hamburger()">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
        </div>
    </header>
    <main style="padding-bottom: 100px;">
        <div class="wrapper">
            <form action="" method="POST">
                <i class="fas fa-user-edit"></i>
                <h1>UNOS ŽELJENOG CITATA</h1>
                <label for="firstname">Ime: <br>
                    <input type="text" id="firstname" name="firstname" placeholder="Ime autora citata" required>
                </label><br><br>
                <label for="lastname">Prezime: <br>
                    <input type="text" id="lastname" name="lastname"  placeholder="Prezime autora citata" required>
                </label><br><br>
                <label for="text">Citat: <br>
                    <input type="text" id="text" name="text" placeholder="Unesite citat" required>
                </label><br><br>
                <input type="submit" id="submit" name="submit" value="Unesi">
            </form>
        </div>
    </main>

    <div class="info">
        <?php
            $xml = new DomDocument ("1.0", "UTF-8");
            $xml -> formatOutput = true;
            $xml -> preserveWhiteSpace = false;
            $xml -> load("input.xml");

            if(!$xml){
                $input = $xml -> createElement("Citati");
                $xml -> appendChild($input);
            }
            else{
                $input = $xml -> firstChild;
            }

            if(isset($_POST['submit'])){
                $ime = $_POST['firstname'];
                $prezime = $_POST['lastname'];
                $citat = $_POST['text'];

                echo "<p>Unijeli ste podatke u XML dokument!</p>";
                $new = $xml -> createElement("Unos");
                $input->appendChild($new);
                $fname = $xml->createElement("ImeAutora", $ime);
                $new->appendChild($fname);
                $lname = $xml->createElement("PrezimeAutora", $prezime);
                $new->appendChild($lname);
                $quote = $xml->createElement("Citat", $citat);
                $new->appendChild($quote);

                $check = true;
                $xml -> save("input.xml");
                if ($check == true){
                    echo "<p>Citat je uspješno unesen u bazu input.xml!</p>";
                    header("refresh: 5; url = form.php");
                }
            }
        ?>
    </div>

    <footer style="margin: 0;">
        <center>
            <p>Bernarda Brkić, bbrkic@tvz.hr</p>
        </center>
    </footer>
</body>
</html>
