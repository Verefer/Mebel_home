<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">  
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="MEBEL HOME">
    <meta property="og:description" content="Распил и окантовка деталей кромкой из ПВХ">
    <meta property="og:image" content="http://n93344bl.beget.tech/assets/images/logo.png">
    <meta property="og:url" content="http://n93344bl.beget.tech/index.php">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="MEBEL HOME">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEBEL HOME</title>
    <link rel="icon" href="../assets/images/logo.png">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="../asets/js/script.js" defer></script>
  
    
</head>
<body>

<script>
        // Function to delete all cookies
        function deleteAllCookies() {
            const cookies = document.cookie.split("; ");
            for (let c of cookies) {
                const d = window.location.hostname.split(".");
                while (d.length > 0) {
                    const cookieBase = encodeURIComponent(c.split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:00 GMT; domain=' + d.join('.') + ' ;path=';
                    const p = location.pathname.split('/');
                    document.cookie = cookieBase + '/';
                    while (p.length > 0) {
                        document.cookie = cookieBase + p.join('/');
                        p.pop();
                    };
                    d.shift();
                }
            }
        }

        // Function to clear local storage and session storage
        function clearStorage() {
            localStorage.clear();
            sessionStorage.clear();
        }

        // Call the functions on page load
        window.onload = function() {
            deleteAllCookies();
            clearStorage();
        };
    </script>

<?php include 'includes/header.php'; ?>

<content>
<div id="zakaz" class="hidden"><?php include 'includes/zakaz.php'; ?></div>    
<div id="visible"><?php include 'includes/about.php'; ?></div>
<div id="visible"><?php include 'includes/price.php'; ?></div>
<div id="visible"><?php include 'includes/sending.php'; ?></div>
<div id="visible"><?php include 'includes/contact.php'; ?></div>
<div id="formzak" class="hidden"><?php include 'includes/formzak.php'; ?></div>

</content>

<?php include 'includes/footer.php'; ?>

</body>
</html>
