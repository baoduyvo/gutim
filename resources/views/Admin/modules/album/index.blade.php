@extends('admin.master')

@section('module', 'Album')
@section('action', 'List')

@section('content')
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                    aria-describedby="example2_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Rendering engine: activate to sort column descending">Album Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending">Album Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Gym Name And Address</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $key => $album)
                            <tr class="odd">
                                <td>{{ strtoupper($album->name_album) }}</td>
                                <td>
                                    <span
                                        class="right badge badge-{{ $album->status == 1 ? 'success' : 'dark' }}">{{ $album->status == 1 ? 'Show' : 'Hidden' }}
                                    </span>
                                </td>
                                <td>{{ strtoupper($album->name) }} - Address: {{ $album->address }}</td>
                                <td style="width:100px;">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.album.show', $album->id_album) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Detail
                                    </a>
                                    <br>
                                    <br>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.album.destroy', $album->id_album) }}"
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
                            <th rowspan="1" colspan="1">Album Name</th>
                            <th rowspan="1" colspan="1">Album Status</th>
                            <th rowspan="1" colspan="1">Gym Name And Address</th>
                            <th rowspan="1" colspan="1">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
