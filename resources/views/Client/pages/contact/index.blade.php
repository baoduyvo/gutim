@extends('client.master')

@section('title', 'Contact Us')


@section('content')
    <div class="row mt-5">
        <div class="m-auto">
            <iframe style="width: 1100px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24112.92132811736!2d-74.20651812810036!3d40.93514309648714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fda38587e887%3A0xf03207815e338a0d!2sHaledon%2C%20NJ%2007508%2C%20USA!5e0!3m2!1sen!2sbd!4v1578120776078!5m2!1sen!2sbd"
                height="400" style="border:0;" allowfullscreen=""></iframe>
            <img src="img/icon/location.png" alt="">
        </div>
    </div>
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h4>Contacts Us</h4>
                        <div class="contact-address">
                            <div class="ca-widget">
                                <div class="cw-icon">
                                    <img src="{{ asset('client/img/icon/icon-1.png') }}" alt="">
                                </div>
                                <div class="cw-text">
                                    <h5>Our Location</h5>
                                    <p>60-49 Road 11378 New York</p>
                                </div>
                            </div>
                            <div class="ca-widget">
                                <div class="cw-icon">
                                    <img src="{{ asset('client/img/icon/icon-2.png') }}" alt="">
                                </div>
                                <div class="cw-text">
                                    <h5>Phone:</h5>
                                    <p>+65 11.188.888</p>
                                </div>
                            </div>
                            <div class="ca-widget">
                                <div class="cw-icon">
                                    <img src="{{ asset('client/img/icon/icon-3.png') }}" alt="">
                                </div>
                                <div class="cw-text">
                                    <h5>Mail</h5>
                                    <p>hellocolorlib@ gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h4>Leave A Comment</h4>
                        <form action="{{ route('client.contact.contact') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    @error('full_name')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" placeholder="Your name" name="full_name">
                                </div>
                                <div class="col-lg-6">
                                    @error('email')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <input type="text" placeholder="Your email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    @error('description')
                                        <span class="error"> {{ $message }}</span>
                                    @enderror
                                    <textarea placeholder="Your messages" name="description"></textarea>
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
