@extends('client.master')

@section('title', 'Gym')

@push('css')
    <link rel="stylesheet" href="{{ asset('administrator/dist/css/style.css') }}">
@endpush

@section('content')
    <div class="col-lg-10 offset-lg-1">
        <div class="bd-text">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <ul class="gallery-controls">
                            @foreach ($nameAlbums as $album)
                                <li>
                                    <h3 data-album-id="{{ $album->id }}">{{ $album->name }}</h3>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row" id="albumImages">
                    @foreach ($images_gym_ids as $image)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <figure>
                                <img src="{{ asset('uploads/album/' . $image['image']) }}" class="img-thumbnail grayscale"
                                    style="height: 200px; width:250px;" data-image="{{ $image['image'] }}">
                            </figure>
                        </div>
                    @endforeach
                </div>

                <section class="classes-section classes-page spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h2>UNLIMITED CLASSES</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-class-item set-bg"
                                        data-setbg="{{ asset('uploads/service/' . $service->image) }}"
                                        style="background-image: url(&quot;{{ asset('uploads/service/' . $service->image) }}&quot;);">
                                        <div class="si-text">
                                            <a href="{{ route('client.service.service_detail', $service->id) }}"
                                                style="color: white">
                                                <h4> {{ ucwords($service->name) }}</h4>
                                            </a>
                                            <span>
                                                <i class="fa fa-user">
                                                </i> {{ number_format($service->price, 0, '', '.') }} VND / 1 Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            <div class="tag-share">
                <div class="tags">
                    <a href="#">Camera</a>
                    <a href="#">Photography</a>
                    <a href="#">Tips</a>
                </div>
                <div class="social-share">
                    <span>Share:</span>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="blog-author">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ba-pic">
                            <img src="{{ asset('client/img/blog/blog-posted.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="ba-text">
                            <h5>Shane Lynch</h5>
                            <p>Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum bore et dolore magna aliqua.</p>
                            <div class="bt-social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-google-plus"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9" id="oldComments">
                        @foreach ($comments as $comment)
                            <div class="ba-text">
                                <h5>{{ $comment->full_name }}</h5>
                                <p>{{ $comment->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @if (Session::has('id'))
                <div class="leave-comment mb-5">
                    <h3>Comment</h3>
                    <form id="commentForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="{{ Session::get('username') }}" readonly>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="{{ Session::get('email') }}" readonly>
                            </div>
                            <input type="hidden" name="gym_id" id="gymId" value="{{ $id }}">
                            <div class="col-lg-12" id="commentError"></div>
                            <div class="col-lg-12">
                                <textarea placeholder="Messages" id="commentDescription" name="description"></textarea>
                                <button type="submit" id="submitComment">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#submitComment').click(function(event) {
                event.preventDefault();

                const description = $('#commentDescription').val();
                const gymId = $('#gymId').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('client.gym.comment') }}",
                    data: {
                        description: description,
                        gym_id: gymId,
                        _token: csrfToken
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.error) {
                            $('#commentError').html(response.error);
                        } else {
                            $('#commentError').html('');
                            $('#commentDescription').val('');
                            $('#oldComments').empty();
                            response.data.forEach(comment => {
                                $('#oldComments').append(`
                                    <div class="ba-text">
                                        <h5>${comment.full_name}</h5>
                                        <p>${comment.description}</p>
                                    </div>
                                `);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.gallery-controls').on('click', 'h3', function() {
                const albumId = $(this).data('album-id');
                NameAlbum(albumId);
            });

            function NameAlbum(albumId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('client.gym.change') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        albumId: albumId
                    },
                    success: function(data) {
                        let imagesHtml = '';
                        $('#albumImages').empty();
                        data.images_gym_ids.forEach(image => {
                            imagesHtml += `
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <figure>
                                        <img src="{{ asset('uploads/album/') }}/${image.image}"
                                            class="img-thumbnail grayscale"
                                            style="height: 200px; width:250px;"
                                            data-image="${image.image}">
                                    </figure>
                                </div>
                            `;
                        });
                        $('#albumImages').html(imagesHtml);
                    }
                });
            }

            $('#albumImages').on('click', 'img', function() {
                const dataImage = $(this).data('image');

                $('<div>').css({
                    background: 'RGBA(0,0,0,.5) url({{ asset('uploads/album/') }}/' + dataImage +
                        ') no-repeat center',
                    backgroundSize: 'contain',
                    width: '100%',
                    width: '100%',
                    height: '100%',
                    position: 'fixed',
                    zIndex: '10000',
                    top: '50%',
                    left: '50%',
                    transform: 'translate(-50%, -50%)',
                    cursor: 'zoom-out'
                }).click(function() {
                    $(this).remove();
                }).appendTo('body');
            });

        });
    </script>
@endpush
