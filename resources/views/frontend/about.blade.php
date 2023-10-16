 @extends('frontend/header')
 @section('sitedata')

 <!-- About Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <img class="img-fluid" src="https://www.vertextechnosys.com/client/images/about/aboutinner.png">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">About Us</div>
                        <h2 class="mb-4">Innovation to Improve Business</h2>
                        <p class="mb-4">Vertex Technosys is a software based company, our experts serve a wide range of software development like web design, graphic design, web development, software development, mobile development, seo services, digital marketing, e-commerce solutions, custom application development, product development & web promotions services.</p>
                        <p class="mb-4">We develop software that helps businesses. We offer more than just software development, we focus on clients' needs, go deep into requirements to suggest improvements, work according to a structured plan to reduce the budget and we never miss our deadlines.</p>
                        <p class="mb-4">Vertex Technosys has delivered the services of highly skilled professionals to our clients. Our experience, teamwork and processes makes us separate from the crowd and let us deliver success with memorable experience and services. We ask and answer all important questions and provide all services to get jobs done right; right on time, right the first time!</p>
                        <p class="mb-4">We provide a quality driven approach towards software development and deliver services beyond expectations always!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Team Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Our Team</div>
                    <h2 class="mb-5">Meet Our Team Members</h2>
                </div>
                <div class="row g-4">
                    @foreach($team as $t)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item">
                            <h5>{{$t->name}}</h5>
                            <p class="mb-4">{{$t->role}}</p>
                            <img class="img-fluid rounded-circle w-100 mb-4" src="/images/team/{{$t->profile}}" alt="Can't display image">
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square text-primary bg-white m-1" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Team End -->
@endsection
      