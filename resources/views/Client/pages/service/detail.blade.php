@extends('client.master')

@section('title', $services->name)

@section('content')
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-text">
                        <div class="bd-title">
                            <p>{{ $services->description }}</p>

                        </div>
                        <div class="bd-pic">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{ asset('uploads/service/' . $services->image) }}"
                                        alt="{{ $services->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="bd-more-text">
                            <div class="bm-item">
                                <h4>1. You May Have to Redo All Your Content</h4>
                                <p>{{ $services->benefit }}</p>
                            </div>
                            <div class="bm-item">
                                <h4>2. You May Have Technical Mistakes</h4>
                            </div>
                        </div>


                        <div class="bd-quote">

                            <div class="quote-author">
                                <table style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1" class="sorting sorting_asc">
                                                <h5>Gym Name</h5>
                                            </th>
                                            <th rowspan="1" colspan="1" class="sorting sorting_asc">
                                                <h5>Gym Phone</h5>
                                            </th>
                                            <th rowspan="2" colspan="2" class="sorting sorting_asc">
                                                <h5>Gym Address</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subs as $sub)
                                            <tr class="mt-5 mb-5">
                                                <td><a style="color: white" href="">{{ $sub->name }}</a></td>
                                                <td><span>{{ $sub->phone }}</span></td>
                                                <td><span>Address: {{ $sub->address }}</span></td>
                                                <td>
                                                    <a style="color: white; font-size:22px;" class="mr-2"><i
                                                            class="fa fa-comment"></i></a>
                                                    <a style="color: white; font-size:22px;" class="ml-2"><i
                                                            class="fa fa-envelope"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
