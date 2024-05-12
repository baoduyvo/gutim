@extends('admin.master')

@section('module', 'Members Ship')
@section('action', 'Create')

@section('content')
    <form method="post" action="{{ route('admin.memberShip.store') }}">
        @csrf
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Member Ship create</h3>
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
                            <label>Members Ship name</label>
                            </span>
                            <input type="text" class="form-control" placeholder="Enter Members Ship Name" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>Members Ship Price</label>
                            <input type="text" class="form-control" placeholder="Enter Members Ship Price" name="price"
                                value="{{ old('price') }}">
                        </div>

                        <div class="form-group">
                            <label>Members Ship Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
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
