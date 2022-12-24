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
                                    <form action="{{ route('admin.user-contacts.index')}}" method="get" role="form">
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
                                                <a href="{{ route('admin.user-contacts.index') }}"
                                                   class="btn btn-default btn-sm custom_field_height">Reset
                                                </a>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        @canany(['contact message reply'])
                            <div class="d-flex my-3">
                                <button class="btn btn-sm btn-success mr-2 sendMailSelectedMessageBtn">Send mail to
                                    selected contacts
                                </button>
                                <button class="btn btn-sm btn-info sendMailAllMessagesBtn">Send mail to all contacts
                                </button>
                            </div>
                        @endcanany
                         <div class="card">
                            <div class="card-body p-0">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        @canany(['contact message reply'])
                                            <th class="text-left" width="75">
                                                <input type="checkbox" id="checkAll"> <label class="mb-0" for="checkAll">All</label>
                                            </th>
                                        @endcanany
                                        <th class="text-left">User Name</th>
                                        <th class="text-left">User Email</th>
                                        <th class="text-left">Subject</th>
                                        <th class="text-left">Message</th>
                                        <th width="14%">Replied Count</th>
                                        @canany(['contact message show', 'contact message delete', 'contact message reply', 'contact message reply show', 'contact message reply delete'])
                                            <th width="25%">Action</th>
                                        @endcanany
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach(@$userContacts as $message)
                                        <tr>
                                            @canany(['contact message reply'])
                                                <td class="text-left">
                                                    <input type="checkbox" value="{{ $message->id }}" class="checkedMe">
                                                </td>
                                            @endcanany
                                            <td class="text-left">{{ ucfirst(Str::limit(@$message->name, 50)) }}</td>
                                            <td class="text-left">{{ @$message->email }}</td>
                                            <td class="text-left">{{ ucfirst(Str::limit(@$message->subject, 50)) }}</td>
                                            <td class="text-left">{{ ucfirst(Str::limit(@$message->message, 50)) }}</td>
                                            <td>
                                                <span class="badge badge-primary">{{ @$message->replies()->count() }}</span>
                                            </td>
                                            @include("admin.pages.user_contacts.reply-modal", ['id' => $message->id])
                                            @canany(['contact message show', 'contact message delete', 'contact message reply', 'contact message reply show', 'contact message reply delete'])
                                                <td>
                                                    @canany(['contact message reply'])
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                                data-toggle="modal"
                                                                data-target="#exampleModal-{{$message->id}}"
                                                                data-whatever="@fat"
                                                                title="Reply"
                                                        >
                                                            <i class="fa fa-reply"></i>
                                                        </button>
                                                    @endcanany
                                                    @canany(['contact message reply show', 'contact message reply delete'])
                                                        <a href="{{ route('admin.contact.replies', @$message->id)  }}"
                                                           title="Show Reply Details"
                                                           class="btn btn-success btn-sm cus_btn">
                                                            <i class="fa fa-comment"></i>
                                                        </a>
                                                    @endcanany
                                                    @canany(['contact message show'])
                                                        <a href="{{ route('admin.user-contacts.show', @$message->id)  }}"
                                                           title="Show Message Details"
                                                           class="btn btn-warning btn-sm cus_btn">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endcanany
                                                    @canany(['contact message delete'])
                                                        <button onclick="deleteRow({{ @$message->id }})"
                                                                href="JavaScript:void(0)"
                                                                title="Delete the message"
                                                                class="btn btn-danger btn-sm cus_btn">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                        <form id="row-delete-form{{ @$message->id }}" method="POST"
                                                              class="d-none"
                                                              action="{{ route('admin.user-contacts.destroy', @$message->id) }}">
                                                            @method('DELETE')
                                                            @csrf()
                                                        </form>
                                                    @endcanany
                                                </td>
                                            @endcanany
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                @if (count(@$userContacts))
                                    {{ @$userContacts->appends(['keyword' => request('keyword'), 'perPage' => request('perPage')])->links() }}
                                @else
                                    <div class="text-center"> Contact not found</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    @include('admin.pages.user_contacts.messageMailModal')
@endsection

    @push('script')
        <script>

            $("#checkAll").change(function () {
                $("input:checkbox").prop('checked', this.checked);
            });

            $(".checkedMe").click(function () {
                if ($(this).is(":checked")) {
                    var isAllChecked = true; // initialize all is checked true

                    $(".checkedMe").each(function () {
                        if (!this.checked)
                            isAllChecked = false;
                    });

                    if (isAllChecked) {
                        $("#checkAll").prop("checked", true);
                    }
                } else {
                    $("#checkAll").prop("checked", false);
                }
            });


            $(".sendMailAllMessagesBtn").on('click', (e) => {
                e.preventDefault();
                $("#sendMailAllMessagesModal").modal('show');
            })


            $(".sendMailSelectedMessageBtn").on('click', (e) => {
                e.preventDefault();

                let customers = [];
                $(".checkedMe").each(function () {
                    if (this.checked) {
                        customers.push($(this).val())
                    }
                });

                if (customers.length) {
                    $("#selectedMessagesField").val(customers)
                    $("#sendMailAllSelectedMessagesModal").modal('show');
                } else {
                    toastr.warning('First select some contacts.');
                }
            })
        </script>
    @endpush



