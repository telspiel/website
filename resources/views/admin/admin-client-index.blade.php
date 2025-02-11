@extends('admin.layout.main')
@section('title')
    |Clients
@endsection
@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Clients</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">List</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn px-4"
                            style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}"
                            data-bs-toggle="modal" data-bs-target="#FormModal">Add New</button>

                    </div>
                </div>

            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">DataTable Example</h6>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Client Name</th>
                                    <th>Logo</th>
                                    <th>IS Visible</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>


            {{-- form model --}}
            <div class="modal fade" id="FormModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                            <h5 class="modal-title">Add Client</h5>
                            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3" action="{{ route('admin.clients.save') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="client_name" class="form-label">Client Name</label>
                                        <input type="text" class="form-control" id="client_name" name="client_name"
                                            placeholder="Client Name">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="status" class="form-label">Status</label>
                                        <select id="status" class="form-select" name="status">
                                            <option value="">Choose...</option>
                                            <option value="Enable">Enable</option>
                                            <option value="Disable">Disable</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mx-auto">
                                        <h6 class="mb-0 text-uppercase">Logo</h6>
                                        <hr>
                                        <div class="card">
                                            <div class="card-body">
                                                <input id="fa" class="dropify" type="file" name="logo"
                                                    accept=".jpg, .png, image/jpeg, image/png">

                                                {{-- <input id="fancy-file-upload" type="file" name="logo"
                                                    accept=".jpg, .png, image/jpeg, image/png"> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn px-4"
                                                style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;
}">Submit</button>
                                            <button type="button" class="btn btn-grd-info px-4">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end form model --}}
        </div>
    </main>
    <!--end main wrapper-->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            tableData();
            $('.dropify').dropify();
        });

        function tableData() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.clients.list') }}',
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'client_name',
                        name: 'client_name'
                    },
                    {
                        name: 'logo'
                    },
                    {
                        data: 'show_on_home_page_chkbox',
                        name: 'visible',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        name: 'action'
                    },

                ],
                columnDefs: [{
                    "targets": 2,
                    "render": function(data, type, full) {
                        return `<img src="{{ asset('${full.logo}') }}" />`;
                    }
                }, {
                    "targets": 5,
                    "render": function(data, type, full) {
                        return `<a href="#!" onclick="deleteLogo('${full.encrypt_id}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                            &nbsp;&nbsp;
                                            <a href="#!" onclick="editLogo('${full.encrypt_id}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-primary"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                        </td>`;
                    }
                }]
            });
        }

        function deleteLogo(id) {
            $.ajax({
                url: `/admin/clients/${id}/delete`,
                type: "delete",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        tableData();
                    } else {
                        Swal.fire({
                            title: response.message,
                            icon: "error",
                            draggable: true
                        });
                    }

                }
            });
        }

        function editLogo(id) {

        }
    </script>
@endsection
