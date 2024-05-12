@extends('admin.master')

@section('module', 'Gym')
@section('action', 'Edit')
@section('content')
    <form method="post" action="{{ route('admin.gym.update', $gym->id) }}">
        @csrf
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gym create</h3>

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
                    <input type="text" class="form-control" placeholder="Enter Gym Name" name="name"
                        value="{{ old('name', $gym->name) }}">
                </div>

                <div class="form-group">
                    <label>Gym Phone</label>
                    <input type="phone" class="form-control" placeholder="Enter Gym Phone" name="phone"
                        value="{{ old('phone', $gym->phone) }}">
                </div>

                <div class="form-group">

                    <label>Gym Address</label>
                    <input type="text" class="form-control" placeholder="Enter Gym Address" name="address"
                        value="{{ old('address', $gym->address) }}">
                </div>

                <label>Services</label>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-4">
                            <div class="form-group text-center">
                                <img src="{{ asset('uploads/service/' . $service->image) }}" alt="anh" width="120"
                                    height="120">
                                <div class="text-center mt-1">
                                    <input type="checkbox" name="services[]" id="{{ $service->id }}"
                                        value="{{ $service->id }}"
                                        @foreach ($subs as $sub)
                                        {{ $service->id == $sub->service_id ? 'checked' : '' }} @endforeach>
                                    <label for="{{ $service->id }}">{{ $service->name }}</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        <!-- /.card -->
    </form>

@endsection
