@extends('layout') @section('content')

        <section class="about">
            <div class="container-xl">
                <div class="row">
                    <div class="col-sm-5 col-12" style="position: relative;">
                        <img src="{{asset('public/logo.png')}}" alt="about_logo" class="shadow-lg">
                    </div>

                    <div class="col-sm-7 col-12 about_content">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Introduction to the portal</h5>
                                <hr>
                                <p class="card-text">
                                    A complete solution for managing your classes online and get connected with students more easily.
                                    Here in the solution, there is compatibility for both teacher and student.<span id="dots">...</span>
                                    <span id="more">
                                        As a teacher, when you login in the system, you can directly manage your subjects with just a couple of clicks.
                                        You can create new subjects and get them published for the students. Only published subjects will get visible to the students
                                        and students can only opt for published subjects. For each subject, you can manage i.e create, delete and update classes
                                        , tests and assignments for the students.
                                        As a student, once you opt for any subject, you can directly access all of its content. The content includes tests, classes
                                        and assignments. You can open these content as well as mark them as done/taken in the portal only for your convinence.
                                    </span>
                                    <br>
                                    <button type="button" onclick="myFunction()" id="myBtn" class="btn btn-link">Read more</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="achievement">
            <div class="container-xl">
                <div class="row">
                    <div class="col-sm-5 disappear_till_break">
                        <img src="public/images/achievement.jfif" alt="acheivement_image" class="shadow-lg">
                    </div>
                    
                    <div class="col-sm-7 col-12 achievement_content">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">intro about me</h5>
                                <hr>
                                <p class="card-text">
                                Hello Everyone! My name is Shrinit Goyal. I am currently pursuing Bachelor's in Technology from Rajasthan 
                                Technical University, Kota. I am currently in pre-final year of my graduation. My keen interests include 
                                Web-Development, Image-Processing, IOT Applications and Cloud-Technology.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-5 col-12" style="position: relative;">
                        <img src="https://media-exp1.licdn.com/dms/image/C4D03AQFEuvbeSsxGoA/profile-displayphoto-shrink_400_400/0/1629453472479?e=1635984000&v=beta&t=Xx130QVPwu1CEc_h9DaQpyZA-ME_V6aYoy-lpxxfVaQ" alt="my_image" class="shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <script>

            function myFunction() {
                var dots = document.getElementById("dots");
                var moreText = document.getElementById("more");
                var btnText = document.getElementById("myBtn");
            
                if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more"; 
                moreText.style.display = "none";
                } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less"; 
                moreText.style.display = "inline";
                }
            }

            function myFunction2() {
                var dots = document.getElementById("dots2");
                var moreText = document.getElementById("more2");
                var btnText = document.getElementById("myBtn2");
            
                if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more"; 
                moreText.style.display = "none";
                } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less"; 
                moreText.style.display = "inline";
                }
            }

        </script>

@endsection