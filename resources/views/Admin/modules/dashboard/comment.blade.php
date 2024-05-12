@extends('admin.master')

@section('module', 'Comment')
@section('action', 'Index')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline-footer">
                        <a href="{{ route('admin.dashboard.handleAcceptAllComment') }}"
                            class="btn btn-primary btn-sm">Accept All</a>
                        <a href="{{ route('admin.dashboard.handleRefuseAllComment') }}"
                            class="btn btn-danger btn-sm">Refuse All</a>
                    </div>
                    @foreach ($comments as $comment)
                        <div class="timeline">
                            <div>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i>
                                        {{ date('d-m-Y', strtotime($comment->created_at)) }}</span>
                                    <h3 class="timeline-header"><a href="#">Email: </a>{{ $comment->email }}</h3>

                                    <div class="timeline-body">
                                        <p>Full Name: {{ $comment->full_name }}</p>
                                        <p>Content: {{ $comment->description }}</p>
                                        <p>Gym: {{ $comment->name }} Address: {{ $comment->address }}</p>
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="{{ route('admin.dashboard.handleAcceptComment', $comment->id_comment) }}"
                                            class="btn btn-primary btn-sm">Accept</a>
                                        <a href="{{ route('admin.dashboard.handleRefuseComment', $comment->id_comment) }}"
                                            class="btn btn-danger btn-sm">Refuse</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
