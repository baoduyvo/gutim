@extends('admin.master')

@section('module', 'Album')
@section('action', 'Create')

@push('css')
    <link rel="stylesheet" href="{{ asset('administrator/dist/css/style.css') }}">
@endpush

@push('js')
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const html = `<div class='upload__img-box'>
                                                    <img src="${e.target.result}" width='120' height='120'/>
                                                    <div class='upload__img-close'></div>
                                                </div>`;
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endpush

@section('content')
    <form method="post" action="{{ route('admin.album.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Album Gym</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label>Gym Name</label>
                    <select class="form-control" name="gym_id">
                        <option value="-1">----- Root -----</option>
                        @foreach ($gyms as $gym)
                            <option value="{{ $gym->id }}">{{ $gym->name }} - Address:
                                {{ $gym->address }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Album Name</label>
                    <input type="text" class="form-control" placeholder="Enter category name" name="name"
                        value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hidden</option>
                    </select>
                </div>

                <div class="upload__box">
                    <div class="upload__btn-box">
                        <label class="upload__btn">
                            <p>Upload Images</p>
                            <input type="file" name="images[]" multiple data-max_length="20" class="upload__inputfile"
                                multiple>
                        </label>
                        <div class="upload__img-wrap"></div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>
@endsection
