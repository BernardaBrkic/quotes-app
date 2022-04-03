<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet"/>
    <script src="script.js"></script>
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link rel="icon" href="Images/favicon.png" type="image/png"/>
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
    <main style="padding-bottom: 50px; margin: 0;">
        <div class="wrapper">
            <br><br>
            <form method="POST" action="login.php" name="login">
                <i class="fas fa-users"></i>
                <h1>PRIJAVA KORISNIKA</h1>  
                <label for="firstname">Unesite svoje ime: <br>
                    <input type="text" id="firstname" name="firstname" placeholder="Ime">
                </label><br><br>
                <span id="feedbackFirstname"></span>
                <label for="lastname">Unesite svoje prezime: <br>
                    <input type="text" id="lastname" name="lastname" placeholder="Prezime">
                </label><br><br>
                <span id="feedback"></span>
                <label for="mail">Unesite svoju e-mail adresu: <br>
                    <input type="mail" id="mail" name="mail" placeholder="E-mail adresa">
                </label><br><br>
                <span id="feedback"></span>
                <label for="password">Unesite svoju lozinku: <br>
                    <input type="password" id="password" name="password" placeholder="Lozinka">
                </label><br><br>
                <span id="feedback"></span>
                <label for="password">Ponovite svoju lozinku: <br>
                    <input type="password" id="password2" name="password2" placeholder="Ponovljena lozinka">
                </label><br><br>
                <span id="feedback"></span>
                <input type="submit"id="submit" name="submit" value="Prijavi se" onclick="on_submit()">
                <span id="feedback"></span>
            </form>
        </div>
    </main>
    
    <!-- Upis u JSON datoteku -->
    <div class="info">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                function get_data() {
                    $file ='login' . '.json';

                    if (file_exists("$file")) { 
                        $current_data = file_get_contents("$file");
                        $input_data = json_decode($current_data, true);
                                        
                        $input = array(
                            'Firstname' => $_POST['firstname'],
                            'Lastname' => $_POST['lastname'],
                            'EmailAdresa' => $_POST['mail'],
                            'Lozinka' => $_POST['password'],
                            'PonovljenaLozinka' => $_POST['password2'],
                        );
                        $input_data[] = $input; 
                        echo "<p>Datoteka \"login.php\" već postoji na ovom računalu!</p>";
                        return json_encode($input_data);
                    }
                    else {
                        $input = array();
                        $input[] = array(
                            'Firstname' => $_POST['firstname'],
                            'Lastname' => $_POST['lastname'],
                            'EmailAdresa' => $_POST['mail'],
                            'Lozinka' => $_POST['password'],
                            'PonovljenaLozinka' => $_POST['password2'],
                        );

                        echo "<p>Stvorena je nova datoteka \"login.json\"!</p>";
                        return json_encode($input);   
                    }
                }
            
                $file='login'. '.json';
                if(file_put_contents("$file", get_data())) {
                    echo "<p>Vaši podaci su uspješno upisani u datoteku \"login.json\"!</p>";
                }                
                else {
                    echo "<p>Došlo je do pogreške pri unosu u JSON bazu!</p>";                
                }
            }
        ?>
    </div>
    <footer style="margin: 0;">
        <center>
            <p>Bernarda Brkić, bbrkic@tvz.hr</p>
        </center>
    </footer>

    <!-- Validacija forme korištenjem jQuery -->
    <script>
        $(function() {
            $("form[name='login']").validate({
                rules: {
                    firstname: {
                        required: true,
                    },
                    lastname: {
                        required: true,
                    },
                    mail: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                    },
                    password2:{
                        required: true,
                        equalTo: "#password",
                    },
                },
                messages: {
                    firstname: {
                        required: "Obavezno je unijeti prezime korisnika!",
                    },
                    lastname: {
                        required: "Obavezno je unijeti prezime korisnika!",
                    },
                    mail: {
                        required: "Obavezno je unijeti email adresu korisnika!",
                    },
                    password: {
                        required: "Obavezno je unijeti lozinku!",
                    },
                    password2: {
                        required: "Obavezno je ponovo unijeti lozinku!",
                        equalTo: "Lozinke moraju biti iste.",
                    },
                },

                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>