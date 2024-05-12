@extends('admin.master')

@section('module', 'Service')
@section('action', 'List')

@section('content')

    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6">

            </div>
            <div class="col-sm-12 col-md-6">
                <form class="input-group" method="get" action="{{ route('admin.service.search') }}">
                    <input type="text" class="form-control rounded" placeholder="Search" name="search" />
                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                </form>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                    aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">Service Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Service Price</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Service Description</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Service image</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $key => $service)
                            <tr class="odd">
                                <td>{{ $service->name }}</td>
                                <td>${{ number_format($service->price, 2, ',', '.') }}</td>
                                <td>{{ $service->description }}</td>
                                <td>
                                    <img src="{{ asset('uploads/service/' . $service->image) }}" alt="{{ $service->name }}"
                                        width="50" height="50">
                                </td>
                                <td style="width:100px;">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.service.edit', $service->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a>
                                    <br>
                                    <br>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('admin.service.destroy', $service->id) }}"
                                        onclick='return confirm("Are you sure ?")'>
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Service Name</th>
                            <th rowspan="1" colspan="1">Service Price</th>
                            <th rowspan="1" colspan="1">Service Description</th>
                            <th rowspan="1" colspan="1">Service Image</th>
                            <th rowspan="1" colspan="1">Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
        {{ $services->links() }}
    </nav>
@endsection
