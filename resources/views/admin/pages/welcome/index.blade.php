@extends('admin.layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Welcome</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Welcome</li>
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

                                <div class="col-sm-1 d-flex align-items-end">
                                    @if(\App\Models\Welcome::count() === 0)
                                    <div>
                                        @can(['welcome create'])
                                            <a href="{{ route('admin.welcomes.create') }}" class="btn btn-sm btn-primary float-right">
                                                <i class="fa fa-plus"></i> <strong>Create</strong>
                                            </a>
                                        @endcan
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="card">

                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Image</th>
                                            <th class="text-left">Title</th>
                                            <th class="text-left">Link</th>
                                            <th class="text-left">Description</th>
                                            @can('welcome status')
                                                <th>Status</th>
                                            @endcan
                                            @canany(['welcome edit', 'welcome delete'])
                                            <th width="10%" class="text-center">Actions</th>
                                            @endcanany

                                        </tr>
                                        </thead>
                                        @if(@$welcome !== null)
                                            <tbody>

                                            <tr>
                                                <td>
                                                    <img width="100" height="50" src="{{ @$welcome->image->url }}" alt="Image">
                                                </td>
                                                <td class="text-left">{{ ucfirst(Str::limit(@$welcome->title, 50)) }}</td>
                                                <td class="text-left"><a href="{{ @$welcome->link }}" target="_blank">{{ @$welcome->link }}</a></td>
                                                <td class="text-left">{!! @$welcome->description !!}</td>
                                                @can('welcome status')
                                                <td>
                                                    <a onclick="changeStatus(this)" id="{{ @$welcome->id }}"
                                                       data-route="{{ route('admin.welcomes.status.change', '') }}"
                                                       href="javascript:void(0)"
                                                       title="Change publication status">
                                                        @if(@$welcome->status)
                                                            <span class="badge badge-primary">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Disable</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                @endcan
                                                @canany(['welcome edit', 'welcome delete'])
                                                <td class="text-center">
                                                    @can('welcome edit')
                                                    <a href="{{ route('admin.welcomes.edit', @$welcome->id ?? 1)  }}" title="Edit"
                                                       class="btn btn-info btn-sm cus_btn">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @endcan
                                                    @can(['welcome delete'])
                                                    <button onclick="deleteRow({{ @$welcome->id }})" href="JavaScript:void(0)"
                                                            title="Delete" class="btn btn-danger btn-sm cus_btn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                    <form id="row-delete-form{{ @$welcome->id }}" method="POST" class="d-none"
                                                          action="{{ route('admin.welcomes.destroy', @$welcome->id ?? 1) }}">
                                                        @method('DELETE')
                                                        @csrf()
                                                    </form>
                                                    @endcan
                                                </td>
                                                @endcanany
                                            </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    @if (@$welcome !== null)
{{--                                        {{ @$about->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}--}}
                                    @else
                                        <div class="text-center"> welcome not found</div>
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


