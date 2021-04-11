<?php 
    require_once("PayPal-PHP-SDK/autoload.php");
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AedZCjYyGATV3oKrT_1PFrGXTM4supfQrfVnc0wVVvDNBAqdlNg-H6DxNHkEYmunoITupeNYmm5ZlL8s',     // ClientID
            'ENT0oyLsBddjTHE1XLiJ5Rv_TgdU0w4PtovB9FcfKo4vRDZ054zDVKBPnqskiSBCRy2W2aKuZquEUr6Y'      // ClientSecret
        )
    );
?>