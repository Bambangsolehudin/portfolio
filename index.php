<?php 
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result=curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC5KywPK7i0_4fLoKPbXRBWQ&key=AIzaSyBL4RTHD6AhHRiOvt5_jONwxB3s6GXLU_I ');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];





//latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBL4RTHD6AhHRiOvt5_jONwxB3s6GXLU_I&channelid=UC5KywPK7i0_4fLoKPbXRBWQ&maxResult=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];


//Instagram API
$clientId = 'c27c6658b3444b0f8c207f6ab2fd595c';
$accessToken = '3978343770.c27c665.51825dd75fd04d12a8f0cb5fb28b42ce';

$result =get_CURL('https://api.instagram.com/v1/users/self/?access_token=3978343770.c27c665.51825dd75fd04d12a8f0cb5fb28b42ce');
$usernameIG = $result['data']['username'];
$profilePictureIG = $result['data']['profile_picture'];
$followersIG = $result['data']['counts']['followed_by'];

//latest ig post
$result = get_CURL('https://api.instagram.com/v1/users/self/media/recent/?access_token=3978343770.c27c665.51825dd75fd04d12a8f0cb5fb28b42ce&count=8');

$photos = [];
foreach ($result['data'] as $photo) {
  $photos[] = $photo['images']['thumbnail']['url'];
}
 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Bambang Solehudin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/bams1.jpg" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Bambang Solehudin</h1>
          <h3 class="lead"> | Programmer | Youtuber |</h3>
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Halo Nama saya Bambang Solehudin, saya adalah seorang mahasiswa lulusan Universitas Gunadarma, saya juga merupakan youtuber dan programmer, hal-hal yang saya sedikit kuasai kurang lebih seperti html,css,php, javascript,  framework CodeIghniter, Bootstrap ,materialize,jquery,dll. </p>
          </div>
          <div class="col-md-5">
            <p> 
            Hello My name is Bambang Solehudin, I am a student graduating from Gunadarma University, I am also a youtuber and programmer, things that I have mastered a little more like html,css,php, javascript, framework CodeIghniter, Bootstrap, materialize, jquery, etc.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube dan Instagram -->
    <section class="social bg-light" id="social">
      <div class="container">
        
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Social Media</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $youtubeProfilePic ;?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?=$channelName; ?></h5>
                <p><?=$subscriber; ?> subscribers.</p>
                  <div class="g-ytsubscribe" data-channelid="UC5KywPK7i0_4fLoKPbXRBWQ" data-layout="default" data-count="default"></div>
              </div>
            </div>  
            <div class="row mt-3 pt-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/nAkWloHPIns?rel=0" allowfullscreen></iframe>
                </div>
              </div>
            </div>  
          </div>
          
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $profilePictureIG; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $usernameIG; ?></h5>
                <p><?= $followersIG; ?> Followers.</p>
              </div>
            </div>
            <div class="row mt-3 pt-3">
              <div class="col">
                <?php foreach ($photos as $photo) : ?>
                <div class="ig-thumbnaill" style="width: 100px; height: 100px; float: left; overflow: hidden;">
                  <img src="<?= $photo; ?>" alt="" style="width: 100px;">
               
                </div>
             <?php endforeach; ?>
              </div>
              
            </div>
          
          </div>
          </div>  
       
        
        </div>
      </div>



    </section>


    <!-- Portfolio -->
    <section class="portfolio " id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/a.jpg" alt="Card image cap" >
              <div class="card-body">
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/b.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/c.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/d.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/e.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/f.jpg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 ">
              <div class="card-body">
                <h5 class="card-title text-center">Contact Me</h5>
                <p class="card-text">telp : - <br>hp :081284418504 <br> 
                  email : bamsolotaku@gmail.com
                </p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Bogor</li>
              <li class="list-group-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2019.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>


<script src="https://apis.google.com/js/platform.js"></script>
