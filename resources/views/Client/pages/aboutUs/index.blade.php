@extends('client.master')

@section('title', 'About Us')

@section('content')
    <section class="about-section about-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-video" style="height: 100%">
                        <video controls width="560" style="height: 450px;" autoplay muted>
                            <source src="{{ asset('video/about.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>Story About Us</h2>
                        <p class="first-para">Lorem ipsum proin gravida nibh vel velit auctor aliquet. Aenean pretium
                            sollicitudin, nascetur auci elit consequat ipsutissem niuis sed odio sit amet nibh vulputate
                            cursus a amet.</p>
                        <p class="second-para">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, gravida
                            quam semper libero sit amet.</p>
                        <img src="{{ asset('client/img/about-signature.png') }}" alt="">
                        <div class="at-author">
                            <h4>Lettie Chavez</h4>
                            <span>CEO - Founder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gym-award spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="award-text">
                        <h2>Best gym award</h2>
                        <p>Lorem ipsum proin gravida nibh vel velit auctor aliquet. Aenean pretium sollicitudin,
                            nascetur auci elit consequat ipsutissem niuis sed odio sit amet nibh vulputate cursus a
                            amet.</p>
                        <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, gravida quam semper libero
                            sit amet. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, gravida quam
                            semper libero sit amet.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('client/img/award.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="trainer-section about-trainer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>EXPERT TRAINERS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        <img src="{{ asset('client/img/trainer/about-trainer-1.jpg') }}" alt="">
                        <div class="trainer-text">
                            <h5>Patrick Cortez</h5>
                            <span>Leader</span>
                            <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        <img src="{{ asset('client/img/trainer/about-trainer-2.jpg') }}" alt="">
                        <div class="trainer-text">
                            <h5>Gregory Powers</h5>
                            <span>Gym coach</span>
                            <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        <img src="{{ asset('client/img/trainer/about-trainer-3.jpg') }}" alt="">
                        <div class="trainer-text">
                            <h5>Walter Wagner</h5>
                            <span>Dance trainer</span>
                            <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>
                            <div class="trainer-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>success stories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-slider owl-carousel owl-loaded owl-drag">


                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-1890px, 0px, 0px); transition: all 1.2s ease 0s; width: 5670px;">
                                <div class="owl-item cloned" style="width: 945px;">
                                    <div class="testimonial-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        <div class="ti-pic">
                                            <img src="{{ asset('client/img/testimonial/testimonial-1.jpg') }}"
                                                alt="">
                                            <div class="quote">
                                                <img src="{{ asset('client/img/testimonial/quote-left.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="ti-author">
                                            <h4>Patrick Cortez</h4>
                                            <span>Leader</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 945px;">
                                    <div class="testimonial-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        <div class="ti-pic">
                                            <img src="{{ asset('client/img/testimonial/testimonial-1.jpg') }}"
                                                alt="">
                                            <div class="quote">
                                                <img src="{{ asset('client/img/testimonial/quote-left.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="ti-author">
                                            <h4>Patrick Cortez</h4>
                                            <span>Leader</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 945px;">
                                    <div class="testimonial-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        <div class="ti-pic">
                                            <img src="{{ asset('client/img/testimonial/testimonial-1.jpg') }}"
                                                alt="">
                                            <div class="quote">
                                                <img src="{{ asset('client/img/testimonial/quote-left.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="ti-author">
                                            <h4>Patrick Cortez</h4>
                                            <span>Leader</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 945px;">
                                    <div class="testimonial-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        <div class="ti-pic">
                                            <img src="{{ asset('client/img/testimonial/testimonial-1.jpg') }}"
                                                alt="">
                                            <div class="quote">
                                                <img src="{{ asset('client/img/testimonial/quote-left.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="ti-author">
                                            <h4>Patrick Cortez</h4>
                                            <span>Leader</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 945px;">
                                    <div class="testimonial-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        <div class="ti-pic">
                                            <img src="{{ asset('client/img/testimonial/testimonial-1.jpg') }}"
                                                alt="">
                                            <div class="quote">
                                                <img src="{{ asset('client/img/testimonial/quote-left.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="ti-author">
                                            <h4>Patrick Cortez</h4>
                                            <span>Leader</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 945px;">
                                    <div class="testimonial-item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        <div class="ti-pic">
                                            <img src="{{ asset('client/img/testimonial/testimonial-1.jpg') }}"
                                                alt="">
                                            <div class="quote">
                                                <img src="{{ asset('client/img/testimonial/quote-left.png') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="ti-author">
                                            <h4>Patrick Cortez</h4>
                                            <span>Leader</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="fa fa-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="fa fa-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
