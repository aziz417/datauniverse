@extends('admin.layouts.app')

@section('title', 'Work Road Maps')

@section('content')
    <div class="content-wrapper">

        <section class="content-header pb-1">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All work road maps</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">work road maps</li>
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
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <form action="{{ route('admin.work-road-maps.index')}}" method="get" role="form">
                                        <div class="row mb-3" >
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="perPage" class="control-label">Records Per Page</label>
                                                    </div>
                                                    <div class="col-md-4 col-sm-3 col-3">
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
                                                    <div class="col-md-7 col-sm-7 col-7">
                                                        <div class="float-left input-group">
                                                            <input name="keyword" type="text" value="{{ request('keyword') }}"
                                                                   class="input-sm form-control custom_field_height" placeholder="Search Here">
                                                            <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-sm btn-primary custom_field_height"> Go!</button>
                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-sm-2 col-2 text-right">
                                                        <span>
                                                            <a href="{{ route('admin.work-road-maps.index') }}"
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
                                        @can(['work road map create'])
                                            <a href="{{ route('admin.work-road-maps.create') }}" class="btn btn-sm btn-primary float-right">
                                                <i class="fa fa-plus"></i> <strong>Create</strong>
                                            </a>
                                        @endcan
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
                                            <th class="text-left">Image</th>
                                            <th class="text-left">Title</th>
                                            <th class="text-left">Description</th>
                                            <th class="text-left">Color</th>
                                            <th class="text-left">Serial</th>

                                        @can('work road map status')
                                                <th>Status</th>
                                            @endcan
                                            @canany(['work road map edit', 'work road map delete'])
                                            <th width="10%" class="text-center">Actions</th>
                                            @endcanany

                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($workRoadMaps as $workRoadMap)
                                                <tr>
                                                    <td>
                                                        <img width="100" height="50" src="{{ $workRoadMap->image->url }}" alt="Slide Image">
                                                    </td>
                                                    <td class="text-left">{{ ucfirst(Str::limit(@$workRoadMap->title, 50)) }}</td>
                                                    <td class="text-left">{!! @$workRoadMap->description !!}</td>
                                                    <td class="text-left">{{ @$workRoadMap->color }}</td>
                                                    <td class="text-left">{{ @$workRoadMap->serial }}</td>

                                                @can('work road map status')
                                                    <td>
                                                        <a onclick="changeStatus(this)" id="{{ $workRoadMap->id }}"
                                                           data-route="{{ route('admin.work-road-maps.status.change', '') }}"
                                                           href="javascript:void(0)"
                                                           title="Change publication status">
                                                            @if($workRoadMap->status)
                                                                <span class="badge badge-primary">Active</span>
                                                            @else
                                                                <span class="badge badge-danger">Disable</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    @endcan
                                                    @canany(['work road map edit', 'work road map delete'])
                                                    <td class="text-center">
                                                        <div class="table-action d-flex">
                                                            @can('work road map edit')
                                                                <a href="{{ route('admin.work-road-maps.edit', $workRoadMap->id)  }}" title="Edit"
                                                                   class="btn btn-info btn-sm cus_btn">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endcan
                                                            @can(['work road map delete'])
                                                                <button onclick="deleteRow({{ $workRoadMap->id }})" href="JavaScript:void(0)"
                                                                        title="Delete" class="btn btn-danger btn-sm cus_btn ml-1">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>

                                                                <form id="row-delete-form{{ $workRoadMap->id }}" method="POST" class="d-none"
                                                                      action="{{ route('admin.work-road-maps.destroy', $workRoadMap->id) }}">
                                                                    @method('DELETE')
                                                                    @csrf()
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                    @endcanany
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    @if (count(@$workRoadMaps))
                                        {{ @$workRoadMaps->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                                    @else
                                        <div class="text-center"> Work road map not found</div>
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


