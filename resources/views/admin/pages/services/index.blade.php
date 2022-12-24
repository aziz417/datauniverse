@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Service</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Services</li>
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
                                    <form action="{{ route('admin.services.index')}}" method="get" role="form">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="perPage" class="control-label">Records Per Page</label>
                                                    </div>
                                                    <div class="col-md-4 pr-0 responsive_p_r_15">
                                                        <select name="perPage" id="perPage" onchange="submit()"
                                                                class="input-sm form-control custom_field_height">
                                                            <option value="10"{{ request('perPage') == 10 ? ' selected' : '' }}>
                                                                10
                                                            </option>
                                                            <option value="25"{{ request('perPage') == 25 ? ' selected' : '' }}>
                                                                25
                                                            </option>
                                                            <option value="50"{{ request('perPage') == 50 ? ' selected' : '' }}>
                                                                50
                                                            </option>
                                                            <option value="100"{{ request('perPage') == 100 ? ' selected' : '' }}>
                                                                100
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 pl-sm-1 pr-sm-1 responsive_p_t_f_5">
                                                        <div class="float-left input-group">
                                                            <input name="keyword" type="text" value="{{ request('keyword') }}"
                                                                   class="input-sm form-control custom_field_height" placeholder="Search Here">
                                                            <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-sm btn-primary custom_field_height"> Go!</button>
                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 p-0 responsive_p_l_15">
                                            <span>
                                                <a href="{{ route('admin.services.index') }}"
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
                                        @can(['service create'])
                                            <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-primary float-right">
                                                <i class="fa fa-plus"></i> <strong>Create</strong>
                                            </a>
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
                                            <th class="text-left">Serial</th>
                                            <th class="text-left">Image</th>
                                            <th class="text-left">U C Image</th>
                                            <th class="text-left">Title</th>
                                            <th class="text-left">Description</th>
                                            @can('service status')
                                                <th>Status</th>
                                            @endcan
                                            @canany(['service edit', 'service delete'])
                                            <th width="10%" class="text-center">Actions</th>
                                            @endcanany

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($services as $service)
                                                <tr>
                                                    <td class="text-left">{{ @$service->serial }}</td>
                                                    <td>
                                                        <img width="100" height="50" src="{{ @$service->images()->where('type', 'lg')->first()->url }}" alt="Image">
                                                    </td>
                                                    <td>
                                                        <img width="100" height="50" src="{{ @$service->images()->where('type', 'construction')->first()->url }}" alt="Image">
                                                    </td>
                                                    <td class="text-left">{{ ucfirst(Str::limit(@$service->title, 50)) }}</td>
                                                    <td class="text-left">{!! @$service->description !!}</td>
                                                    @can('service status')
                                                    <td>
                                                        <a onclick="changeStatus(this)" id="{{ $service->id }}"
                                                           data-route="{{ route('admin.services.status.change', '') }}"
                                                           href="javascript:void(0)"
                                                           title="Change publication status">
                                                            @if($service->status)
                                                                <span class="badge badge-primary">Active</span>
                                                            @else
                                                                <span class="badge badge-danger">Disable</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    @endcan
                                                    @canany(['service edit', 'service delete'])
                                                    <td class="text-center">
                                                        @can('service edit')
                                                        <a href="{{ route('admin.services.edit', $service->id)  }}" title="Edit"
                                                           class="btn btn-info btn-sm cus_btn">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @endcan
                                                        @can(['service delete'])
                                                        <button onclick="deleteRow({{ $service->id }})" href="JavaScript:void(0)"
                                                                title="Delete" class="btn btn-danger btn-sm cus_btn">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                        <form id="row-delete-form{{ $service->id }}" method="POST" class="d-none"
                                                              action="{{ route('admin.services.destroy', $service->id) }}">
                                                            @method('DELETE')
                                                            @csrf()
                                                        </form>
                                                        @endcan
                                                    </td>
                                                    @endcanany
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    @if (count(@$services))
                                        {{ @$services->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                                    @else
                                        <div class="text-center"> Service not found</div>
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


