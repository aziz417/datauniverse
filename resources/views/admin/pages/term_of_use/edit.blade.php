@extends('admin.layouts.app')

@section('title', 'Terms Of Use')

@section('content')
    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Terms Of Use</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Terms Of Use</li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <hr style="margin: 0 0 10px 0!important;">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Terms of use edit for your company</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.terms-of-use.update', $terms_of_use->id) }}" method="post" >
                                @csrf
                                @method("PATCH")
                                <div class="card-body">

                                    <div class="form-group">
                                    <textarea class="form-control TextEditor" name="terms_of_use" id="terms_of_use">
                                        {{ isset($terms_of_use->terms_of_use) && $terms_of_use->terms_of_use ? $terms_of_use->terms_of_use : old('terms_of_use') }}
                                    </textarea>
                                        @error('terms_of_use')
                                        <span class="help-block m-b-none text-danger">
                                        {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    @push('script')
                                        <script src="{{ asset('backend/js/plugins/summernote/summernote-bs4.js')}}"></script>
                                        <script>
                                            $(document).ready(function () {
                                                $('.settingTextEditor').summernote();
                                            });
                                        </script>
                                @endpush

                                <!-- /.card-body -->
                                    <div class="card-footer bg-white">
                                        <div class="form-group">
                                            <a href="{{ route('admin.terms-of-use.index') }}" class="btn btn-danger"
                                               type="submit">Cancel</a>
                                            <button class="btn btn-primary" type="submit">Save Change</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
