@extends('admin.layout')
@section('contain')
    <style>
     .note-editor.note-frame .note-editing-area .note-editable {
        height: 150px;
     }


        .error {
            color: red;
            padding-top: 2px;
            font-size: 107% !important;
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4 mx-3">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Post New Blog</h5>
                </div>
                <div class="card-body">
                    <form action='' method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Program Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="program_name" id="basic-default-name"
                                    placeholder="Program Name" />
                                {{-- @error('program_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Program Source Code</label>
                            <div class="col-sm-10">
                                <textarea name="code" id="summernote" ></textarea>
                                {{-- @error('slug_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror --}}
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Output</label>
                            <div class="col-sm-10">
                                <textarea name="output" id="summernote1" ></textarea>
                                {{-- @error('slug_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"   for="basic-default-company">Explanation</label>
                            <div class="col-sm-10">
                                <textarea name="explain" id="summernote2" ></textarea>
                                {{-- @error('slug_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror --}}
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
            window.$('#summernote').summernote();
            window.$('#summernote1').summernote();
            window.$('#summernote2').summernote();
        </script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script type="text/javascript">
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount', 'image'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        </script> --}}
    @endsection
