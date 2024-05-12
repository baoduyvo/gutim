@extends('admin.master')

@section('module', 'Gym')
@section('action', 'List')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6">

        </div>
        <div class="col-sm-12 col-md-6 mb-2">
            <form class="input-group" method="get" action="{{ route('admin.gym.search') }}">
                <input type="text" class="form-control rounded" placeholder="Search" name="search" />
                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
            </form>
        </div>
    </div>
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                    aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">Gym Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Gym Phone</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Gym Address</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Gym Service</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gyms as $key => $gym)
                            <tr class="odd">
                                <td>{{ strtoupper($gym->name) }}</td>
                                <td>{{ $gym->phone }}</td>
                                <td>{{ $gym->address }}</td>
                                <td>
                                    <ul>
                                        @foreach ($subs as $sub)
                                            @if ($sub->gym_id == $gym->id)
                                                <li>{{ $sub->name }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.gym.edit', $gym->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    &nbsp;
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.gym.destroy', $gym->id) }}"
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
                            <th rowspan="1" colspan="1">Gym Name</th>
                            <th rowspan="1" colspan="1">Gym Phone</th>
                            <th rowspan="1" colspan="1">Gym Address</th>
                            <th rowspan="1" colspan="1">Gym Service</th>
                            <th rowspan="1" colspan="1">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
        {{ $gyms->links() }}
    </nav>
@endsection
