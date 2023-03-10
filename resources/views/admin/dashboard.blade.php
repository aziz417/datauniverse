@extends('admin.layouts.app')
@section('title', 'Dashboard')

@push('style')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ @$users ? @$users->count() : 0 }}</h3>

                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ @$sliders ? @$sliders->count() : 0 }}</h3>

                                <p>Sliders</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-image"></i>
                            </div>
                            <a href="{{ route('admin.sliders.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ @$posts->count() }}</h3>
                                <p>Blogs</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-blog"></i>
                            </div>
                            <a href="{{ route('admin.posts.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ @$subscribers->count() }}</h3>
                                <p>Subscribers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-shield"></i>
                            </div>
                            <a href="{{ route('admin.subscribers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ @$categories->count() }}</h3>

                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-ul"></i>
                            </div>
                            <a href="{{ route('admin.categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <h3>{{ @$monthlyVisits }}</h3>

                                <p>Last {{ @count($analyticsData) - 1 }} day's Visits</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            <a href="javascript:void(0)" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ @$todayVisits }}</h3>

                                <p>Today's Visits</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-eye"></i>
                            </div>
                            <a href="javascript:void(0)" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                <!-- /.row -->
                <!-- Main row -->
<!--                <div class="row">
                    &lt;!&ndash; Left col &ndash;&gt;
                    <section class="col-lg-7 connectedSortable">
                        &lt;!&ndash; Custom tabs (Charts with tabs)&ndash;&gt;
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Sales
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>&lt;!&ndash; /.card-header &ndash;&gt;
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    &lt;!&ndash; Morris chart - Sales &ndash;&gt;
                                    <div class="chart tab-pane active" id="revenue-chart"
                                         style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart"
                                         style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>&lt;!&ndash; /.card-body &ndash;&gt;
                        </div>
                        &lt;!&ndash; /.card &ndash;&gt;

                        &lt;!&ndash; DIRECT CHAT &ndash;&gt;
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Direct Chat</h3>

                                <div class="card-tools">
                                    <span title="3 New Messages" class="badge badge-primary">3</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" title="Contacts"
                                            data-widget="chat-pane-toggle">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            &lt;!&ndash; /.card-header &ndash;&gt;
                            <div class="card-body">
                                &lt;!&ndash; Conversations are loaded here &ndash;&gt;
                                <div class="direct-chat-messages">
                                    &lt;!&ndash; Message. Default to the left &ndash;&gt;
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        &lt;!&ndash; /.direct-chat-infos &ndash;&gt;
                                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg"
                                             alt="message user image">
                                        &lt;!&ndash; /.direct-chat-img &ndash;&gt;
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                        &lt;!&ndash; /.direct-chat-text &ndash;&gt;
                                    </div>
                                    &lt;!&ndash; /.direct-chat-msg &ndash;&gt;

                                    &lt;!&ndash; Message to the right &ndash;&gt;
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        &lt;!&ndash; /.direct-chat-infos &ndash;&gt;
                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg"
                                             alt="message user image">
                                        &lt;!&ndash; /.direct-chat-img &ndash;&gt;
                                        <div class="direct-chat-text">
                                            You better believe it!
                                        </div>
                                        &lt;!&ndash; /.direct-chat-text &ndash;&gt;
                                    </div>
                                    &lt;!&ndash; /.direct-chat-msg &ndash;&gt;

                                    &lt;!&ndash; Message. Default to the left &ndash;&gt;
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                        </div>
                                        &lt;!&ndash; /.direct-chat-infos &ndash;&gt;
                                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg"
                                             alt="message user image">
                                        &lt;!&ndash; /.direct-chat-img &ndash;&gt;
                                        <div class="direct-chat-text">
                                            Working with AdminLTE on a great new app! Wanna join?
                                        </div>
                                        &lt;!&ndash; /.direct-chat-text &ndash;&gt;
                                    </div>
                                    &lt;!&ndash; /.direct-chat-msg &ndash;&gt;

                                    &lt;!&ndash; Message to the right &ndash;&gt;
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                        </div>
                                        &lt;!&ndash; /.direct-chat-infos &ndash;&gt;
                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg"
                                             alt="message user image">
                                        &lt;!&ndash; /.direct-chat-img &ndash;&gt;
                                        <div class="direct-chat-text">
                                            I would love to.
                                        </div>
                                        &lt;!&ndash; /.direct-chat-text &ndash;&gt;
                                    </div>
                                    &lt;!&ndash; /.direct-chat-msg &ndash;&gt;

                                </div>
                                &lt;!&ndash;/.direct-chat-messages&ndash;&gt;

                                &lt;!&ndash; Contacts are loaded here &ndash;&gt;
                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg"
                                                     alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                                </div>
                                                &lt;!&ndash; /.contacts-list-info &ndash;&gt;
                                            </a>
                                        </li>
                                        &lt;!&ndash; End Contact Item &ndash;&gt;
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user7-128x128.jpg"
                                                     alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">I will be waiting for...</span>
                                                </div>
                                                &lt;!&ndash; /.contacts-list-info &ndash;&gt;
                                            </a>
                                        </li>
                                        &lt;!&ndash; End Contact Item &ndash;&gt;
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user3-128x128.jpg"
                                                     alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">I'll call you back at...</span>
                                                </div>
                                                &lt;!&ndash; /.contacts-list-info &ndash;&gt;
                                            </a>
                                        </li>
                                        &lt;!&ndash; End Contact Item &ndash;&gt;
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user5-128x128.jpg"
                                                     alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">Where is your new...</span>
                                                </div>
                                                &lt;!&ndash; /.contacts-list-info &ndash;&gt;
                                            </a>
                                        </li>
                                        &lt;!&ndash; End Contact Item &ndash;&gt;
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user6-128x128.jpg"
                                                     alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">Can I take a look at...</span>
                                                </div>
                                                &lt;!&ndash; /.contacts-list-info &ndash;&gt;
                                            </a>
                                        </li>
                                        &lt;!&ndash; End Contact Item &ndash;&gt;
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user8-128x128.jpg"
                                                     alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">Never mind I found...</span>
                                                </div>
                                                &lt;!&ndash; /.contacts-list-info &ndash;&gt;
                                            </a>
                                        </li>
                                        &lt;!&ndash; End Contact Item &ndash;&gt;
                                    </ul>
                                    &lt;!&ndash; /.contacts-list &ndash;&gt;
                                </div>
                                &lt;!&ndash; /.direct-chat-pane &ndash;&gt;
                            </div>
                            &lt;!&ndash; /.card-body &ndash;&gt;
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..."
                                               class="form-control">
                                        <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                                    </div>
                                </form>
                            </div>
                            &lt;!&ndash; /.card-footer&ndash;&gt;
                        </div>
                        &lt;!&ndash;/.direct-chat &ndash;&gt;

                        &lt;!&ndash; TO DO List &ndash;&gt;
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    To Do List
                                </h3>

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            &lt;!&ndash; /.card-header &ndash;&gt;
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <li>
                                        &lt;!&ndash; drag handle &ndash;&gt;
                                        <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        &lt;!&ndash; checkbox &ndash;&gt;
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                            <label for="todoCheck1"></label>
                                        </div>
                                        &lt;!&ndash; todo text &ndash;&gt;
                                        <span class="text">Design a nice theme</span>
                                        &lt;!&ndash; Emphasis label &ndash;&gt;
                                        <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                        &lt;!&ndash; General tools such as edit or delete&ndash;&gt;
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                            <label for="todoCheck2"></label>
                                        </div>
                                        <span class="text">Make the theme responsive</span>
                                        <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                            <label for="todoCheck3"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                            <label for="todoCheck4"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                            <label for="todoCheck5"></label>
                                        </div>
                                        <span class="text">Check your messages and notifications</span>
                                        <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                    <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                                        <div class="icheck-primary d-inline ml-2">
                                            <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                            <label for="todoCheck6"></label>
                                        </div>
                                        <span class="text">Let theme shine like a star</span>
                                        <small class="badge badge-secondary"><i class="far fa-clock"></i> 1
                                            month</small>
                                        <div class="tools">
                                            <i class="fas fa-edit"></i>
                                            <i class="fas fa-trash-o"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            &lt;!&ndash; /.card-body &ndash;&gt;
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add
                                    item
                                </button>
                            </div>
                        </div>
                        &lt;!&ndash; /.card &ndash;&gt;
                    </section>
                    &lt;!&ndash; /.Left col &ndash;&gt;
                    &lt;!&ndash; right col (We are only adding the ID to make the widgets sortable)&ndash;&gt;
                    <section class="col-lg-5 connectedSortable">

                        &lt;!&ndash; Map card &ndash;&gt;
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Visitors
                                </h3>
                                &lt;!&ndash; card tools &ndash;&gt;
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                            title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                &lt;!&ndash; /.card-tools &ndash;&gt;
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>
                            &lt;!&ndash; /.card-body&ndash;&gt;
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>
                                    &lt;!&ndash; ./col &ndash;&gt;
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Online</div>
                                    </div>
                                    &lt;!&ndash; ./col &ndash;&gt;
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Sales</div>
                                    </div>
                                    &lt;!&ndash; ./col &ndash;&gt;
                                </div>
                                &lt;!&ndash; /.row &ndash;&gt;
                            </div>
                        </div>
                        &lt;!&ndash; /.card &ndash;&gt;

                        &lt;!&ndash; solid sales graph &ndash;&gt;
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Sales Graph
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas class="chart" id="line-chart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            &lt;!&ndash; /.card-body &ndash;&gt;
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60"
                                               data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">Mail-Orders</div>
                                    </div>
                                    &lt;!&ndash; ./col &ndash;&gt;
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60"
                                               data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">Online</div>
                                    </div>
                                    &lt;!&ndash; ./col &ndash;&gt;
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60"
                                               data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="text-white">In-Store</div>
                                    </div>
                                    &lt;!&ndash; ./col &ndash;&gt;
                                </div>
                                &lt;!&ndash; /.row &ndash;&gt;
                            </div>
                            &lt;!&ndash; /.card-footer &ndash;&gt;
                        </div>
                        &lt;!&ndash; /.card &ndash;&gt;

                        &lt;!&ndash; Calendar &ndash;&gt;
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                &lt;!&ndash; tools card &ndash;&gt;
                                <div class="card-tools">
                                    &lt;!&ndash; button with a dropdown &ndash;&gt;
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                                data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                &lt;!&ndash; /. tools &ndash;&gt;
                            </div>
                            &lt;!&ndash; /.card-header &ndash;&gt;
                            <div class="card-body pt-0">
                                &lt;!&ndash;The calendar &ndash;&gt;
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            &lt;!&ndash; /.card-body &ndash;&gt;
                        </div>
                        &lt;!&ndash; /.card &ndash;&gt;
                    </section>
                    &lt;!&ndash; right col &ndash;&gt;
                </div>-->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

{{--{{ dd(json_decode($analyticsReport)->visitors) }}--}}

@push('script')
{{--    <script>--}}
{{--        $(function () {--}}
{{--            let visitors = {!! json_encode($analyticsReport['visitors']) !!};--}}
{{--            let days = {!! json_encode($analyticsReport['days']) !!}--}}

{{--            var options = {--}}
{{--                series: [{--}}
{{--                    name: 'Visitors',--}}
{{--                    data: visitors--}}
{{--                }],--}}
{{--                chart: {--}}
{{--                    height: 350,--}}
{{--                    type: 'line',--}}
{{--                },--}}
{{--                stroke: {--}}
{{--                    width: 7,--}}
{{--                    curve: 'smooth'--}}
{{--                },--}}
{{--                xaxis: {--}}
{{--                    categories: days,--}}
{{--                    title: {--}}
{{--                        text: 'Day',--}}
{{--                    }--}}
{{--                },--}}
{{--                title: {--}}
{{--                    text: 'Page visits',--}}
{{--                    align: 'left',--}}
{{--                    style: {--}}
{{--                        fontSize: "16px",--}}
{{--                        color: '#fff'--}}
{{--                    }--}}
{{--                },--}}
{{--                fill: {--}}
{{--                    type: 'gradient',--}}
{{--                    gradient: {--}}
{{--                        shade: 'dark',--}}
{{--                        gradientToColors: [ '#FDD835'],--}}
{{--                        shadeIntensity: 1,--}}
{{--                        type: 'horizontal',--}}
{{--                        opacityFrom: 1,--}}
{{--                        opacityTo: 1,--}}
{{--                        stops: [0, 100, 100, 100]--}}
{{--                    },--}}
{{--                },--}}
{{--                markers: {--}}
{{--                    size: 4,--}}
{{--                    colors: ["#FFA41B"],--}}
{{--                    strokeColors: "#fff",--}}
{{--                    strokeWidth: 2,--}}
{{--                    hover: {--}}
{{--                        size: 7,--}}
{{--                    }--}}
{{--                },--}}
{{--                yaxis: {--}}
{{--                    title: {--}}
{{--                        text: 'No of visits',--}}
{{--                    },--}}
{{--                }--}}
{{--            };--}}

{{--            var chart = new ApexCharts(document.querySelector("#chart"), options);--}}
{{--            chart.render();--}}
{{--        })--}}
{{--    </script>--}}
@endpush
