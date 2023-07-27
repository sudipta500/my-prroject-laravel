@extends('admin.layout')
@section('contain')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
        .btnstyle {
            display: inline-flex;
        }
    </style>
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="card-header">Java Program</h5>
                    <button class="mx-3 btn btn-primary"><a href={{ url('/admin/blog/create/' . $id) }} class="text-white">Post
                            Blog</a></button>
                </div>

                <div class="table-responsive text-nowrap mx-4 mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Program Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0 mb-3">
                            @foreach ($blogContent as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->Program_name }}</td>
                                    <td>
                                        <div class="btnstyle gap-2">
                                            <button class="btn btn-info"><a
                                                    href="{{ route('admin.blog.view',['program_id'=>$id,'blog_id'=>$item->id]) }}"
                                                    class="text-white">View</a></button>
                                            <button class="btn btn-success"><a
                                                    href="{{ url('/admin/program-name/' . $item->id) }}"
                                                    class="text-white">Edit</a></button>
                                                <button type="submit" class="btn btn-danger"><a href="{{route('admin.blog.delete',['program_id'=>$id,'blog_id'=>$item->id]) }}"
                                                        class="text-white">Delete</a></button>
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
