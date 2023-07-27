@extends('admin.layout')
@section('contain')
    <style>
        /* .imageData {
            display: none;
            margin-bottom: 30px;
        } */
        /* .form-control:focus,
        .form-select:focus {
            border-color: #f90a2e;
        } */
        .error{
            color: red;
            padding-top: 2px;
            font-size: 107% !important;
        }
    </style>



    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add new program name</h5>
                </div>
                <div class="card-body">
                    <form action={{ url('/admin/program-name/'.$program->id) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Program Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="program_name" value="{{$program->program_name}}" id="basic-default-name"
                                    placeholder="Program Name" />
                                    @error('program_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Program Slug Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='slug_name' value="{{$program->slug_name}}"  id="basic-default-company"
                                    placeholder="Program Slug Name" />
                                @error('slug_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Programming Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name='image' id="basic-default-company"
                                    placeholder="Programming Image" onchange="loadFile(event)" />
                                    @error('image')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Image preview --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label img" for="basic-default-company"></label>
                            <div class="col-sm-10">
                                <img id="output" class="imageData" src="{{asset('images/'.$program->image)}}" alt="pic" height="90px"
                                    width="90px" />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
                // var preview = document.getElementById("output");
                // preview.style.display = "block";
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            };
        </script>
    @endsection
