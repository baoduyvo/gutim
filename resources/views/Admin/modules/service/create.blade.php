@extends('admin.master')

@section('module', 'Service')
@section('action', 'Create')

@section('content')
    <form method="post" action="{{ route('admin.service.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Service create</h3>

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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Service name</label>
                            </span>
                            <input type="text" class="form-control" placeholder="Enter Service Name" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Service Price</label>
                            <input type="text" class="form-control" placeholder="Enter Service Price" name="price"
                                value="{{ old('price') }}">
                        </div>

                        <div class="form-group">
                            <label>Service Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Service Benefit</label>
                            <textarea class="form-control" id="description" name="benefit">{{ old('benefit') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
