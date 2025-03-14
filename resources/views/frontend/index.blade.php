@extends('layouts.frontend.master')
@section('title') Home @endsection
@section('content')
<div>
    <div class="face face-home" role="banner">
        <div class="slider-item">
            <div class="bg-image">
                <video autoplay muted loop class="lazyload">
                    <source src="{{url('storage/videos/video-1.mp4')}}" type="video/mp4">
                </video>
            </div>
            <div class="slider-text">
                <div class="logo"><img src="{{url('storage/images/orange-hill-logo.webp')}}" alt="Orange Hill Restaurant"></div>
                <h1 class="title">American & Asian Fusion food in Newburgh, NY</h1>
                <div class="btn btn-outline-default">Reserve a Table</div>
            </div>
        </div>
    </div>   
    <!-- END: FACE -->
    
    @include('frontend.featured-links.links-widget')

    <section class="section-about">
        <div class="container">
            <div class="content-col">
                <div class="col-text">
                    <div class="section-title">
                        <div class="tag">ABOUT US</div>
                        <h1 class="title">OrangeHill Restaurant</h1>
                        <p class="info">Architecturally thoughtful and warm, Orange Hill Restaurant will comfort and intrigue your senses.</p>
                    </div>
                    <div class="section-body">
                        <p class="text">Offering Lunch, Dinner, and an expansive coffee bar Orange Hill represents modern food that everyone can enjoy. Enjoy the first tier offerings of steaks, seafood, sandwiches and entrée salads as well as handcrafted dishes everyday.</p>
                        <p class="text">Check our Takeaway Menu. From appetizing Starters to delicious Desserts, we have something for everyone's taste.</p>
                        <p class="text">We have a fabulous Sunday Brunch Buffet for you to enjoy. Serving every Sunday starts at 11:00am to 2.00pm.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-column">
        <div class="container">
            <div class="section-row">
                <div class="image">
                    <img src="{{url('storage/images/oh-13.jpg')}}" alt="">
                </div>
                <div class="content">
                    <div class="title"><strong>Celebrate</strong> a Special Event with us</div>
                    <p class="text">Yes, We're all ready to get out and socialize with friends and family. OrangeHill Restaurant is the prerfect venue to host your next event.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="section-row">
                <div class="image">
                    <img src="{{url('storage/images/oh-14.jpg')}}" alt="">
                </div>
                <div class="content">
                    <div class="title"><strong>Catering</strong>On-Premise and Off-Premise</div>
                    <p class="text">Yes, We're all ready to get out and socialize with friends and family. OrangeHill Restaurant is the prerfect venue to host your next event.</p>
                    <a href="#" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
    </section>
</div>    
@endsection