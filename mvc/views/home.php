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
    <link rel="stylesheet" href="./public/css/trangchu/trangchu.css">
    <link rel="stylesheet" href="./public/css/trangchu/fooder.css">
    <link rel="stylesheet" href="./public/css/trangchu/menu1.css">
    <link rel="stylesheet" href="./public/css/trangchu/media.css">
</head>

<body>
    
    <?php
    $this->view('trangchu', 'menu');
    ?>
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

