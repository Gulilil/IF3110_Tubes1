<?php 

require_once(dirname(__DIR__,2).'/define.php');
require_once(BASE_DIR.'/views/includes/header.php');
require_once(BASE_DIR.'/models/Anime.php');

$a = new Anime();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer Page</title>
    <link rel="stylesheet" href="../../public/style/global.css">
    <link rel="stylesheet" href="../../public/style/trailer.css">
</head>

<body>
  <div class="flex-wrap">
    <?php
      $animes = $a->getAllAnimeWithTrailer();
      foreach($animes as $anime){
        $year = date('Y', strtotime($anime['release_date'])) ?? '';
        $image = $anime['image'] ?? '../../public/img/placeholder.jpg';
        $arr = explode('/', $anime['trailer']);
        $trailer = $arr[0].'/'.$arr[1].'/www.youtube.com/embed/'.$arr[3];
        echo "
        <div class='container'>
          <div class='box-preview'>
            <img src='$image' class='image-preview'/>
          </div>
          <div class='description'>
            <div> $anime[title] </div>
            <div> ($year) </div>
          </div>
        </div>

        ";
      }
    ?>
  </div>

</body>
</html>

<?php
require_once(BASE_DIR.'/views/includes/footer.php');
?>

      <!-- <div>
        <iframe width='640' height='360' src='$trailer' frameborder='0' allowfullscreen/>
      </div> -->