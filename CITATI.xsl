<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
    <html>
        <head>
            <meta charset="UTF-8"/>
            <title>Citati</title>
            <link rel="stylesheet" href="style.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
            <link rel="preconnect" href="https://fonts.gstatic.com"/>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet"/>
            <script src="script.js"/>
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
            <main></main>
            <div class="wrapper" id="overflow">
                <h1>Citati značajnih povjesnih ličnosti</h1>
                <div class="citat">
                    <xsl:for-each select="/Citati/Unos">
                        <i><p><xsl:value-of select="Citat"/></p></i>
                        <p class="author"><xsl:value-of select="ImeAutora"/> <xsl:value-of select="PrezimeAutora"/></p>
                        <p class="last">Citat objavio: <xsl:value-of select="AutorObjave"/></p>
                        <div class="empty"></div>
                    </xsl:for-each>
                </div>
            </div>
            <footer>
                <center>
                    <p>Bernarda Brkić, bbrkic@tvz.hr</p>
                </center>
            </footer>
        </body>
    </html>
    </xsl:template>
</xsl:stylesheet>