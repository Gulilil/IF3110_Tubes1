<?php 

require_once(dirname(__DIR__,2).'/define.php');
require_once(BASE_DIR.'/views/includes/header.php');
require_once(BASE_DIR.'/models/Anime.php');
require_once(BASE_DIR.'/models/Studio.php');
require_once(BASE_DIR.'/models/Client.php');
require_once(BASE_DIR.'/models/Anime_List.php');
require_once(BASE_DIR.'/models/Genre.php');

$a = new Anime();
$s = new Studio();
$c = new Client();
$al = new Anime_List();
$g = new Genre();


$id = $data['id'];
$anime = $a->getAnimeById($id);
$studio = $s->getStudioByAnimeID($id);
$reviews = $a->getReviewsByAnimeID($id);
$genres = $g->getAllGenreIDByAnimeID($id);

$client_id = $c->getClientByUsername($_SESSION['username'])['client_id'];
$list = $al->getAnimeListByAnimeClientID($id, $client_id);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Page</title>
    <link rel="stylesheet" href="../../public/style/global.css">
    <link rel="stylesheet" href="../../public/style/anime.css">
    <script src='/public/handler/navbar.js'></script>
    <script src='/public/handler/animeList.js'></script>
</head>


<body>
    <div class="anime-container">
        <div class="anime-header">
          <?php   
              echo "
              <div> $anime[title] </div> 
              ";
          ?>
        </div>

        <div class="anime-content">
            <div class="anime-image-box">
              <?php
                $image = $anime['image'] ?? "../../public/img/placeholder.jpg";
                echo "
                <img class='anime-image' src='$image' alt='Anime Cover Image'>
                ";
              ?>
            </div>

            <div class="anime-details">
              <h2 style='margin-bottom:20px;'>Details</h2>
              <?php
                $date = $anime['release_date'] ?? "No information";
                $episodes = $anime['episodes'] ?? "No information";
                $score = ((float) $anime['score']) != 0.0 ? $anime['score'].' ★' : "Has not been scored";
                if ($genres) {
                  $genreData = $genres[0]['name'];
                  for ($i = 1; $i < count($genres); $i++){
                    $genreData = $genreData.', '.$genres[$i]['name'];
                  }
                } else {
                  $genreData = "No information";
                }
                echo "
                  <div class='grid-container'>
                    <div class='anime-details-aspect'> Score </div>
                    <div> $score </div>
                    <div class='anime-details-aspect'> Type </div>
                    <div> $anime[type] </div>
                    <div class='anime-details-aspect'> Genre </div>
                    <div> $genreData </div>
                    <div class='anime-details-aspect'> Studio </div>
                    <div> $studio[name] </div>
                    <div class='anime-details-aspect'> Release Date </div>
                    <div> $date </div>
                    <div class='anime-details-aspect'> Episodes </div>
                    <div> $episodes </div>
                  </div>
                
                ";
              ?>

              <center>
                <?php
                  if (!$al->getAnimeListByAnimeClientID($id, $client_id)){
                    echo"
                    <form action='/api/anime_list/add.php' method='post'>
                      <input type='hidden' id='anime_id' name='anime_id' value='$id'>
                      <input type='hidden' id='client_id' name='client_id' value='$client_id'>
                      <button type='submit' class='add-list-btn' > Add to My List </button>
                    </form>
                    ";
                  } else {
                    echo"
                    <form action='/api/anime_list/delete.php' method='post'>
                      <input type='hidden' id='anime_id' name='anime_id' value='$id'>
                      <input type='hidden' id='client_id' name='client_id' value='$client_id'>
                      <input type='hidden' id='source_page' name='source_page' value='anime'>
                      <button type='submit' class='remove-list-btn'> Remove from My List </button>
                    </form>
                    ";
                  }
                ?>
              </center>

              

            </div>
            
            <div class="anime-trailer">
                <h2 style='margin-bottom:20px;'>Trailer</h2>
                <?php
                  if ($anime['trailer']){
                    echo "
                    <video class='anime-trailer-iframe' controls>
                      <source src='$anime[trailer]' >
                    </video>";
                  } else {
                    echo " <div class='anime-trailer-box'> No trailer yet </div> ";
                  }
                ?>
            </div>
        </div>
        
        <?php 
          echo "
          <div class='synopsis'>
            <h2>Sinopsis:</h2>
            <p> $anime[synopsis] </p> <!-- Add the synopsis content here -->
          </div>
          ";
        ?>

        
        <h2>Anime Review</h2>
        <!-- anime-review Item Loop -->
        <div class="anime-review-list">
            <?php
              if (count($reviews) != 0){
                foreach($reviews as $review){
                  
                  echo "
                    <div class='anime-review-item'>
                      <div class='user-info'>
                          <a href='/?client/detail/$review[client_id]'>
                            <span class='username'> $review[username] </span>
                          </a>
                          <small>Watch Status: $review[watch_status]</small>
                          <div class='rating'>Rating: $review[user_score]/10 ★</div>
                      </div>
                      <p> $review[review] </p>
                    </div>
                  ";
                };
              } else {
                echo 
                "
                  <div class='anime-review-item'> 
                    No reviews found.
                  </div>
                ";
              }

            ?>
        </div>
    </div>
</body>

<?php
require_once(BASE_DIR.'/views/includes/footer.php');
?>