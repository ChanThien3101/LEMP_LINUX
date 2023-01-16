
<meta charset="UTF-8">	
<link rel="shortcut icon" type="image/x-icon"
	href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<title>Tech store</title>

        	<?php
        spl_autoload_register(function ($class) {
            include_once ('system/libs/' . $class . '.php');
        });
        include_once 'app/config/config.php';
        $main = new Main();
        ?>
