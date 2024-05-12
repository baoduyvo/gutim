@extends('admin.master')

@section('module', 'Refuse Booking')
@section('action', 'Index')

@push('css')
    <link rel="stylesheet" href="{{ asset('administrator/dist/css/style.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="timeline-footer">
                        <a style="background-color: black; color:white;" href="{{ route('admin.dashboard.booking') }}"
                            class="btn btn-silver">Back</a>
                    </div>
                    <div class="card-body">
                        <table border="1" id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>FullName</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>MemberShip</th>
                                    <th>Gym</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->full_name }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ date('d-m-Y', strtotime($booking->appointment_date)) }}</td>
                                        <td>{{ $booking->membership_name }}</td>
                                        <td>
                                            <span><b>Serveice</b>: {{ ucfirst($booking->service_name) }}</span><br>
                                            <span><b>Gym</b>: {{ $booking->gym_name }}</span><br>
                                            <span><b>Address</b>: {{ $booking->gym_address }}</span><br>
                                            <span><b>Phone Gym</b>: {{ $booking->gym_phone }}</span><br>
                                        </td>
                                        <td>
                                            @if ($booking->status == 1)
                                                <span class="right badge badge-info">Peding</span>
                                            @elseif($booking->status == 2)
                                                <span class="right badge badge-success">Accept</span>
                                            @else
                                                <span class="right badge badge-danger">Refuse</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Email</th>
                                    <th>FullName</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>MemberShip</th>
                                    <th>Gym</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
