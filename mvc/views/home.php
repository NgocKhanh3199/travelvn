<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "100435832105990");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v14.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelVN</title>
    <!-- link bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- end_link bootstrap 5 -->
    <!-- link icon -->
    <script src="https://kit.fontawesome.com/5f22631803.js" crossorigin="anonymous"></script>
    <!-- end-link icon -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <!-- <link rel="stylesheet" href="./public/css/trangchu/trangchu.css"> -->
    <link rel="stylesheet" href="./public/css/trangchu/fooder.css">
    <link rel="stylesheet" href="./public/css/trangchu/menu1.css">
    <link rel="stylesheet" href="./public/css/trangchu/media.css">

</head>

<body>

    
    <?php
    $this->view('trangchu', 'menu');
    ?>
    <ul class="breadcrumb" id="breadcrumb" style="margin-top: 130px;">
        <li class="breadcrumb-item"><a href="index.php?controller=chome&action=home">PNTravel
            </a></li>
        <li class="breadcrumb-item active">
            <?php
            if (isset($_GET['page'])) {
                echo $_GET['page'];
            } else {
                echo "";
            }
            ?>
        </li>
    </ul>
    <?php

    if (isset($_GET['path'])) {
        $controller = $_GET['path'];
        if (isset($_GET['page'])) {
            $action = ($_GET['page']);
            $this->viewhome($controller, $action);
        } else {
            $this->viewhome($controller, 'list');
        }
    } else {
        if (isset($_GET['page'])) {
            $action = ($_GET['page']);
            $this->viewhome('', $action);
        } else {
            $this->view('trangchu', 'content_home');
        }
    }

    ?>
    <?php
    $this->view('trangchu', 'homefooter');
    ?>
</body>

</html>

<!-- <span>
    <div class="translate" id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</span> -->