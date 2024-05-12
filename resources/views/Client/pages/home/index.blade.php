@extends('client.master')

@section('content')
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-video" style="height: 100%">
                        <video controls width="560" style="height: 400px;" autoplay muted>
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
                            quam semper libero sit amet. Etiam rhoncus. Maecenas tempus, tellus eget condimentum
                            rhoncus, gravida quam semper libero sit amet.</p>
                        <a href="{{ route('client.aboutus.index') }}" class="primary-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="services-pic">
                        <img src="{{ asset('client/img/services/service-pic.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-items">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="services-item bg-gray">
                                    <img src="{{ asset('client/img/services/service-icon-1.png') }}" alt="">
                                    <h4>Strategies</h4>
                                    <p>Aenean massa. Cum sociis Theme et natoque penatibus et magnis dis part urient
                                        montes.</p>
                                </div>
                                <div class="services-item bg-gray pd-b">
                                    <img src="{{ asset('client/img/services/service-icon-3.png') }}" alt="">
                                    <h4>Workout</h4>
                                    <p>Aenean massa. Cum sociis Theme et natoque penatibus et magnis dis part urient
                                        montes.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="services-item">
                                    <img src="{{ asset('client/img/services/service-icon-2.png') }}" alt="">
                                    <h4>Yoga</h4>
                                    <p>Aenean massa. Cum sociis Theme et natoque penatibus et magnis dis part urient
                                        montes.</p>
                                </div>
                                <div class="services-item pd-b">
                                    <img src="{{ asset('client/img/services/service-icon-4.png') }}" alt="">
                                    <h4>Weight Loss</h4>
                                    <p>Aenean massa. Cum sociis Theme et natoque penatibus et magnis dis part urient
                                        montes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SERVICE CLASSES</h2>
                    </div>
                </div>
            </div>
            <div class="row classes-slider owl-carousel">
                @foreach ($services as $service)
                    <div class="col-lg-4">
                        <div class="single-class-item set-bg"
                            data-setbg="{{ asset('uploads/service/' . $service->image) }}">
                            <div class="si-text">
                                <h4>
                                    <a href="{{ route('client.service.service_detail', $service->id) }}"
                                        style="color:white;">
                                        {{ ucwords($service->name) }}
                                    </a>
                                </h4>
                                <span>
                                    <i class="fa fa-user"></i>
                                    ${{ number_format($service->price, 2, ',', '.') }} / 1 Month
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="banner-section set-bg" data-setbg="{{ asset('client/img/banner-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-text">
                        <h2>Get training today</h2>
                        <p>Gimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry’s standard.</p>
                        <a href="{{ route('client.contact.index') }}" class="primary-btn banner-btn">Contact Now</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('client/img/banner-person.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>


    <section class="register-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="register-text">
                        <div class="section-title">
                            <h2>Feel back Now</h2>
                        </div>
                        <form action="{{ route('client.home.feedback') }}" class="register-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name">First Name</label>
                                    @error('first_name')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" name="first_name">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Your email address</label>
                                    @error('email')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" name="email">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last-name">Last Name</label>
                                    @error('last_name')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" name="last_name">
                                </div>
                                <div class="col-lg-6">
                                    <label for="mobile">Mobile No</label>
                                    @error('phone')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" name="phone">
                                </div>
                                <div class="col-lg-12">
                                    <label for="mobile">Content</label>
                                    @error('description')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" name="description">
                                </div>
                            </div>
                            <button type="submit" class="register-btn">Feedback</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="register-pic">
                        <img src="{{ asset('client/img/register-pic.jpg') }}" alt="anh" height="110px">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
