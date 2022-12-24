@extends('admin.layouts.app')

@section('title', 'Contacts')

@section('content')

    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Contacts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
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
                        <div class="ibox-content mb-2">
                            <div class="row">
                                <div class="col-sm-11">
                                    <form action="{{ route('admin.contacts.index')}}" method="get" role="form">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="perPage" class="control-label">Records Per
                                                            Page</label>
                                                    </div>
                                                    <div class="col-md-4 pr-0 responsive_p_r_15">
                                                        <select name="perPage" id="perPage" onchange="submit()"
                                                                class="input-sm form-control custom_field_height">
                                                            <option
                                                                value="10"{{ request('perPage') == 10 ? ' selected' : '' }}>
                                                                10
                                                            </option>
                                                            <option
                                                                value="25"{{ request('perPage') == 25 ? ' selected' : '' }}>
                                                                25
                                                            </option>
                                                            <option
                                                                value="50"{{ request('perPage') == 50 ? ' selected' : '' }}>
                                                                50
                                                            </option>
                                                            <option
                                                                value="100"{{ request('perPage') == 100 ? ' selected' : '' }}>
                                                                100
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 pl-sm-1 pr-sm-1 responsive_p_t_f_5">
                                                        <div class="float-left input-group">
                                                            <input name="keyword" type="text"
                                                                   value="{{ request('keyword') }}"
                                                                   class="input-sm form-control custom_field_height"
                                                                   placeholder="Search Here">
                                                            <span class="input-group-btn">
                                                    <button type="submit"
                                                            class="btn btn-sm btn-primary custom_field_height"> Go!</button>
                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 p-0 responsive_p_l_15">
                                            <span>
                                                <a href="{{ route('admin.contacts.index') }}"
                                                   class="btn btn-default btn-sm custom_field_height">Reset
                                                </a>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-sm-1 d-flex align-items-end">
                                    <div>
                                        @can('contact create')
                                            @if(\App\Models\Contact::count() < 1)
                                                <a href="{{ route('admin.contacts.create') }}"
                                                   class="btn btn-sm btn-primary float-right">
                                                    <i class="fa fa-plus"></i> <strong>Create</strong>
                                                </a>
                                            @endif
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th width="10%" class="text-left">Address</th>
                                        <th class="text-left">Phone Number 1</th>
                                        <th class="text-left">Phone Number 2</th>
                                        <th class="text-left">Email</th>
                                        <th class="text-left">Telephone</th>
                                        <th class="text-left">Updated By</th>
                                        @can('contact edit')
                                            <th>Action</th>
                                        @endcan

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($contact)
                                        <tr>
                                            <td class="text-left">{{ ucfirst(Str::limit(@$contact->address, 50)) }}</td>
                                            <td class="text-left">{{ @$contact->phone_1 }}</td>
                                            <td class="text-left">{{ @$contact->phone_2 }}</td>
                                            <td class="text-left">{{ @$contact->telephone }}</td>
                                            <td class="text-left">{{ @$contact->email }}</td>
                                            <td class="text-left">{{ @$contact->updatedUser->name }}</td>
                                            @can('contact edit')
                                                <td>
                                                    <a href="{{ route('admin.contacts.edit', @$contact->id ?? '') }}"
                                                       title="Edit"
                                                       class="btn btn-info btn-sm cus_btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <p class="text-center">Contact not found</p>

                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection

