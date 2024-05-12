@extends('admin.master')

@section('module', 'Booking')
@section('action', 'Index')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="timeline-footer">
                        <a href="{{ route('admin.dashboard.showAcceptBooking') }}" class="btn btn-success btn-sm p-2">Show Accept
                            Booking Details
                        </a>
                        <a href="{{ route('admin.dashboard.showRefuseBooking') }}" class="btn btn-danger btn-sm p-2">Show Refuse
                            Booking Details
                        </a>
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
                                    <th>Action</th>
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
                                        <td>
                                            <a href="{{ route('admin.dashboard.handleAcceptBooking', $booking->id) }}"
                                                class="btn btn-success btn-sm">Accept</a>
                                            <br>
                                            <br>
                                            <a href="{{ route('admin.dashboard.handleRefuseBooking', $booking->id) }}"
                                                class="btn btn-danger btn-sm">Refuse</a>
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
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
