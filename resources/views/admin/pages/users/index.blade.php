@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')

    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                                <div class="col-sm-10">
                                    <form action="{{ route('admin.users.index')}}" method="get" role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <label for="perPage" class="control-label">Records Per
                                                            Page</label>
                                                    </div>
                                                    <div class="col-md-4 col-sm-3 col-3">
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
                                                    <div class="col-md-7 col-sm-7 col-7">
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
                                                    <div class="col-md-1 col-sm-2 col-2 text-right">
                                                        <span>
                                                            <a href="{{ route('admin.users.index') }}"
                                                               class="btn btn-default btn-sm custom_field_height">Reset
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-sm-2 d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('admin.users.create') }}"
                                           class="btn btn-sm btn-primary float-right">
                                            <i class="fa fa-plus"></i> <strong>Create</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body p-0 table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-left">Name</th>
                                        <th>Image</th>
                                        <th class="text-left">Email</th>
                                        <th class="text-left">Roles</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tbody>
                                        <tr>
                                            <td class="text-left">{{ ucfirst(Str::limit(@$user->name, 50)) }}</td>
                                            <td>
                                                <img width="100" height="50"
                                                     src="{{ isset($user) ? @$user->image->url : '' }}" alt="Image">
                                            </td>
                                            <td class="text-left">{{ @$user->email }}</td>
                                            <td class="text-left">
                                                @foreach(@$user->roles as $role)
                                                    <span class="badge badge-primary">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="table-action d-flex">
                                                    <a href="{{ route('admin.users.edit', @$user->id) }}" title="Edit"
                                                       class="btn btn-info btn-sm cus_btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <button onclick="deleteRow({{ @$user->id }})"
                                                            href="JavaScript:void(0)"
                                                            title="Delete" class="btn btn-danger btn-sm cus_btn ml-1">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                    <form id="row-delete-form{{ @$user->id }}" method="POST"
                                                          class="d-none"
                                                          action="{{ route('admin.users.destroy', @$user->id) }}">
                                                        @method('DELETE')
                                                        @csrf()
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                        </tbody>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                @if (count(@$users))
                                    {{ @$users->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                                @else
                                    <div class="text-center"> user not found</div>
                                @endif
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

