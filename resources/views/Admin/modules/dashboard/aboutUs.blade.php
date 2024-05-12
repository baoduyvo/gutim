@extends('admin.master')

@section('module', 'About Us')
@section('action', 'Index')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline">
                        @foreach ($abouts as $about)
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ DateTime::createFromFormat('Y-m-d H:m:s', $about->created_at)->format('H:m:s d-m-Y') }}</span>
                                    <h3 class="timeline-header"><a href="#">Email: </a>{{ $about->email }}</h3>

                                    <div class="timeline-body">
                                        <p>Full Name: {{ $about->full_name }}</p>
                                        <p>Content: {{ $about->description }}</p>
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="{{ route('admin.dashboard.handleAccept', $about->id) }}"
                                            class="btn btn-primary btn-sm">Accept</a>
                                        <a href="{{ route('admin.dashboard.handleRefuse', $about->id) }}"
                                            class="btn btn-danger btn-sm">Refuse</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
