@extends('admin.master')

@section('module', 'FeedBack')
@section('action', 'Index')

@section('content')
    <section class="content">
        @foreach ($enquirys as $enquiry)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Email: <a href="https://adminlte.io/docs/3.1/" target="_blank"
                            rel="noopener noreferrer"> {{ $enquiry->email }}</a>
                    </h3>
                </div>
                <div class="card-body">
                    Full Name: {{ $enquiry->full_name }}
                    <br>
                    Content: {{ $enquiry->description }}
                </div>
                <div class="card-footer">
                    Phone: {{ $enquiry->phone }}
                </div>
            </div>
        @endforeach
    </section>
@endsection
