<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" crossorigin="anonymous" href="{{asset('public/css/login.css')}}">
    <link rel="stylesheet" crossorigin="anonymous" href="{{asset('public/css/student.css')}}">
    <link rel="stylesheet" crossorigin="anonymous" href="{{asset('public/css/teacher.css')}}">
    <link rel="stylesheet" crossorigin="anonymous" href="{{asset('public/css/index.css')}}">

    <!-- font aweosme link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">

    <title>Google Classroom Clone for Flipr hackathon</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Flipr</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/register">Register</a>
                  </li>
                  @if(Auth::user())
                  <li class="nav-item">
                      <a class="nav-link" href="/logout">Logout</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href="/login">Login</a>
                  </li>
                  @endif
              </ul>
            </div>
        </div>
    </nav>

    @yield('content')

        <section class="footer">
            <div class="container-xl">
                <div class="row">
                    <div class="col-lg-4 map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3547.6864489757986!2d77.48326471500482!3d27.22899248299239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3973a39a4e8209f3%3A0x484256599b0e9dfb!2sJain%20Temple%20Ranjeet%20Nagar%20Bharatpur!5e0!3m2!1sen!2sin!4v1630423360189!5m2!1sen!2sin" 
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-lg-8 address">
                        <h5>find me here</h5>
                        <hr>
                        <div class="social-links">
                            <i>&nbsp&nbspAddress: <br> E-1A Ranjeet Nagar, Bharatpur, Rajasthan, India (321001)</i> <br><br>
                            <i>&nbsp&nbspEmail-id: <br> shrinitg@gmail.com</i> <br> <br>
                            <a href="https://github.com/shrinitg" target="_blank"><i class="fa fa-github"></i>&nbspGithub</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <a href="https://www.instagram.com/shr_.init._goyal/" target="_blank"><i class="fa fa-instagram"></i>&nbspInstagram</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <a href="https://www.linkedin.com/in/shrinit-goyal-86222716a/" target="_blank"><i class="fa fa-linkedin-square"></i>&nbspLinkedin</a>
                        </div>
                    </div>
                </div>
                <div class="copyright container-xl">
                    <h6 style="width: 100%;">Copyright 2021 &#169 Shrinit Goyal &nbsp Made with <i class="fa fa-heart" style="color:red;"></i> in Bootstrap &nbsp Logo made with <a href="www.freelogoservices.com">Free logo Services</a></h6>
                    <p>Designed and Developed by: <b><a href="https://www.linkedin.com/in/shrinit-goyal-86222716a" target="_blank">Shrinit Goyal</a></b></p>
                </div>
            </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>