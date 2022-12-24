@extends('admin.layouts.app')

@section('title', 'Contact Details')

@section('content')
    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user-contacts.index') }}">Contacts</a></li>
                            <li class="breadcrumb-item active">Details</li>
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
                    <div class="col-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="text-center">Details</h3>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p class="control-label"><strong>User Name
                                                    :</strong> {{ ucfirst(@$userContact->name) }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p class="control-label"><strong>User Email : </strong>{{ @$userContact->email }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p class="control-label"><strong>Subject : </strong>{{ ucfirst(@$userContact->subject) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p class="control-label"><strong>Message Body : </strong>{{ ucfirst(@$userContact->message) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-success">
                            <div class="card-header">
                                <a href="{{ route('admin.user-contacts.index') }}"><h4  class="text-center">Back</h4></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection