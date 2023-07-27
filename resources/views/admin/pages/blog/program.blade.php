@extends('admin.layout')
@section('contain')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
        .btnstyle{
            display:inline-flex;
        }
    </style>
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-header">Program Name</h5>
                    <button class="mx-3 btn btn-primary"><a href={{ url('/admin/program-name/create') }}
                            class="text-white">Join New Program</a></button>
                </div>

                <div class="table-responsive text-nowrap mx-4 mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Program Name</th>
                                <th>Slug Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 mb-3">
                            @foreach ($programName as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->program_name }}</td>
                                    <td>{{ $item->slug_name }}</td>
                                    <td><img src="{{ asset('images/' . $item->image) }}" alt="pic" width="50px"
                                            height="50px"></td>
                                    <td >
                                        <div class="btnstyle gap-2">
                                            <button class="btn btn-success"><a
                                                href="{{ url('/admin/program-name/' . $item->id) }}"
                                                class="text-white">Edit</a></button>
                                        <form action="{{ url('/admin/program-name/' . $item->id) }}" method="POST" >
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><span
                                                    class="text-white">Delete</span></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
            <script>
                window.$('.table').DataTable();
                // $(document).ready(function() {
                //     $('..table').DataTable();
                // });
            </script>
        @endsection
