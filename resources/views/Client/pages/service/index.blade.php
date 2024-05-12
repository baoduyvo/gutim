@extends('client.master')

@section('title', 'Service')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush



@section('content')
    <section class="classes-section classes-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SERVICE CLASSES</h2>
                    </div>
                </div>
            </div>
            <div class="row">


                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-class-item set-bg" data-setbg="{{ asset('uploads/service/' . $service->image) }}"
                            style="background-image: url(&quot;{{ asset('uploads/service/' . $service->image) }}&quot;);">
                            <div class="si-text">
                                <a href="{{ route('client.service.service_detail', $service->id) }}" style="color: white">
                                    <h4> {{ ucwords($service->name) }}</h4>
                                </a>
                                <span>
                                    <i class="fa fa-user">
                                    </i>${{ number_format($service->price, 2, ',', '.') }} / 1 Month
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="membership-section spad mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>MEMBERSHIP PLANS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($memberShips as $memberShip)
                    <div class="col-lg-4">
                        <div class="membership-item">
                            <div class="mi-title">
                                <h4>{{ $memberShip->name }}</h4>
                                <div class="triangle"></div>
                            </div>
                            <h2 class="mi-price">${{ number_format($memberShip->price, 2, ',', '.') }}<span>/01 mo</span>
                            </h2>
                            <p class="edit">
                                {{ Str::take($memberShip->description, 320) }}
                            </p>
                            <a href="#"
                                class="primary-btn membership-btn">Start Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @if (Session::has('id'))
        <section class="classes-section classes-page spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="register-pic">
                            <img src="{{ asset('client/img/register-pic.jpg') }}" alt="anh" width="100%"
                                style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-lg-6 pl-3">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Booking</h2>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('client.service.booking') }}">
                            @csrf
                            <div class="form-row ">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="{{ Session::get('email') }}" readonly>
                                </div>
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Full Name</label>
                                    @error('full_name')
                                        <span class="error">&nbsp;&nbsp; {{ $message }}</span>
                                    @enderror
                                    <input type="text" class="form-control" name="full_name" placeholder="Email"
                                        value="{{ old('full_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                @error('address')
                                    <span class="error">&nbsp;&nbsp; {{ $message }}</span>
                                @enderror
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St"
                                    value="{{ old('address') }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="from">Time</label>
                                    @error('appointment_date')
                                        <span class="error">&nbsp;&nbsp; {{ $message }}</span>
                                    @enderror
                                    <input class="flatpickr flatpickr-input" id="id" type="text"
                                        name="appointment_date" placeholder="Select Date.." data-id="inline"
                                        readonly="readonly" fdprocessedid="er7y0m" value="{{ old('appointment_date') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="from">Phone</label>
                                    @error('phone')
                                        <span class="error">&nbsp;&nbsp; {{ $message }}</span>
                                    @enderror
                                    <input type="text" name="phone" class="form-control datepicker"
                                        value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState">Service</label>
                                    <select id="inputState" class="form-control" name="service_name">
                                        <option value="-1" selected>Choose...</option>
                                        @foreach ($services as $service)
                                            <option data-service-id="{{ $service->id }}" value="{{ $service->name }}">
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('service_name', '<p class="error">:message</p>') !!}
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">Gym</label>

                                    <select id="add" class="form-control" name="gym_id">
                                        <option value="-1" selected>Choose...</option>

                                    </select>
                                    {!! $errors->first('gym_id', '<p class="error">:message</p>') !!}

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputState">MemberShip</label>
                                    <select class="form-control" name="membership_name">
                                        <option value="-1" selected>Choose...</option>
                                        @foreach ($memberShipsNames as $memberShipsName)
                                            <option value="{{ $memberShipsName->name }}">{{ $memberShipsName->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('membership_name', '<p class="error">:message</p>') !!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">Booking Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $("#id").flatpickr({
            minDate: "today",
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
    <script>
        $(document).ready(function() {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#inputState').on('change', function() {
                var serviceID = $(this).find(':selected').data('service-id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('client.service.chooseService') }}",
                    data: {
                        serviceID: serviceID,
                        _token: csrfToken
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        var xtml = '';
                        for (var i = 0; i < response.data.length; i++) {
                            xtml +=
                                `<option id="add" value="${response.data[i].id}" selected>${response.data[i].name}</option>`;
                        }
                        $('#add').html(xtml);
                    }
                });
            })
        });
    </script>
@endpush
