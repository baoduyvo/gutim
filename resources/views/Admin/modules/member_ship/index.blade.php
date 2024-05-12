@extends('admin.master')

@section('module', 'Members Ship')
@section('action', 'List')

@section('content')

    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row mt-2">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                    aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">Members Ship Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Members Ship Price</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Members Ship Description</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($memberShips as $key => $memberShip)
                            <tr>
                                <td>{{ $memberShip->name }}</td>
                                <td>${{ number_format($memberShip->price, 2, ',', '.') }}</td>
                                <td>{{ $memberShip->description }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.memberShip.edit', $memberShip->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit&nbsp;&nbsp;&nbsp;&nbsp;
                                    </a>
                                    <a class="btn btn-danger"
                                        href="{{ route('admin.memberShip.destroy', $memberShip->id) }}"
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
                            <th rowspan="1" colspan="1">Members Ship Name</th>
                            <th rowspan="1" colspan="1">Members Ship Price</th>
                            <th rowspan="1" colspan="1">Members Ship Description</th>
                            <th rowspan="1" colspan="1">Action</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection
