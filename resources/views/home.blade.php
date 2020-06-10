@extends('layouts.app')


@section('content')

    <section id="hero" class="light-typo ">
        <div class="container welcome-content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center wow fadeInUp">
                    <img id="logo" src="/img/logo.png" class="img-responsive text-center" alt="shop logo" width="300">
                    <h2> - Software Developer | Database Administrator - </h2>
                    <ul class="social-links text-center">
                        <li><a href="https://twitter.com/adebayopekunmi" target="_blank"><i class="icon-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/adebayo.p.olaonipekun" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://plus.google.com/+AdebayoOlaonipekun/" target="_blank"><i class="icon-googleplus"></i></a></li>		
                    </ul>
                    <a class="btn btn-store smooth-scroll" href="/projects">browse my work</a>
                </div>
            </div>
        </div>
        <div class="overlay-bg"></div>
        <div id="hero-slides">
            <div class="slides-container">
                <img src="/img/img2.jpg" alt="Adebayo Peter Olaonipekun">
                <img src="/img/adebayopeterola.jpg" alt="Adebayo Peter Olaonipekun">
                <img src="/img/server_romm.jpg" alt="Adebayo Peter Olaonipekun">
                <img src="/img/c2.jpg" alt="Adebayo Peter Olaonipekun">
            </div>
        </div>
    </section>

@endsection