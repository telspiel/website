@extends('admin.layout.main')
@section('title')
    | Array Expertise
@endsection
@section('css')
    <style>
        .no-border {
            border: none;
        }

        .textarea-dimension {
            height: 150px;
            width: 350px;
        }

        .save-btn {
            border: none;
            background-color: white;
        }
    </style>
@endsection
@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Array Of Our Expertise</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">List</li>
                        </ol>
                    </nav>
                </div>


            </div>
            <!--end breadcrumb-->
            {{-- <h6 class="mb-0 text-uppercase">Solutions</h6>
            <hr> --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.home.array-expertise-save') }}">
                            @csrf
                            <input type="hidden" id="our_expertise_id" name="our_expertise_id"
                                value="{{ encrypt($ourExpertise->id) }}">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Short Title</th>
                                        <th>Title</th>
                                        <th>Detail</th>
                                        <th>CTA Link</th>
                                        <th>Url</th>
                                        <th>Action</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="no-border form-control" readonly name="short_title"
                                                value="{{ $ourExpertise->short_title }}"></td>
                                        <td><input type="text" class="no-border form-control" readonly name="title"
                                                value="{{ $ourExpertise->title }}"></td>
                                        <td><textarea class="no-border textarea-dimension form-control" name="detail" readonly>
                                         {!! nl2br(e($ourExpertise->detail)) !!} </textarea>
                                        </td>
                                        <td><input type="text" class="no-border form-control" readonly name="cta_link"
                                                value="{{ $ourExpertise->cta_link }}"></td>
                                        <td><input type="text" class="no-border form-control" readonly name="url"
                                                value="{{ $ourExpertise->url }}"></td>
                                        <td>
                                            <div id="table-action">
                                                <a href="#!" onclick="editRow()">
                                                    <i class="material-icons-outlined">edit</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">Array Of Our Expertise | Right</h6>

            <div class="ms-auto" style="float: right;margin-top: -30px;">
                <div class="btn-group">
                    <a type="button" class="btn px-4" href="{{ route('admin.home.array-expertise.create') }}"
                        style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">Add New</a>

                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Cat Id</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Detail</th>
                                    <th>link Name</th>
                                    <th>Image</th>
                                    <th>Image Alt</th>
                                    <th>Image Title</th>
                                    <th>Banner CTA Name</th>
                                    <th>Banner CTA Link</th>
                                    <th>Meta Title</th>
                                    <th>Meta Desc</th>
                                    <th>Meta Keyword</th>
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
                        <div class="modal-header border-bottom-0 py-2"
                            style="background-image: linear-gradient(310deg, #edefef 0%, #ffce00 100%) !important;">
                            <h5 class="modal-title">Add Client Brand</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class" action="{{ route('admin.home.brand-save') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="id">
                                    <div class="col-md-12">
                                        <label for="client_name" class="form-label">Client Name<span  style="color:red"> *</span></label>
                                        <input type="text" class="form-control" id="client_name" name="client_name"
                                            placeholder="Client Name" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title<span  style="color:red"> *</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="status" class="form-label">Status<span  style="color:red"> *</span></label>
                                        <select id="status" class="form-select" name="status" required>
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
                                                <label for="status" class="form-label">Image should be (300*300) and
                                                    less
                                                    than 1MB<span  style="color:red"> *</span></label>
                                                <div id="img_section">
                                                    <input id="client_logo" type="file" name="logo"
                                                        class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                                                        data-max-width="300" data-max-height="300"
                                                        data-max-file-size="1M" required data-default-file="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn px-4"
                                                style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">Submit</button>
                                            <button type="button" class="btn btn-grd-danger px-4 close_btn"
                                                data-bs-dismiss="modal">Cancel</button>
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
        window.table = "";
        $(document).ready(function() {
            $('#example2').DataTable();
            $('#example2').attr('style', 'border-collapse:collapse !important;width:1012px !important');
            $('.dropify').dropify();
            table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                searching: true,
                ajax: {
                    url: '{{ route('admin.home.array-expertise-list') }}',
                },
                columns: [{
                        data: 'cat_id',
                        name: 'cat_id'
                    },
                    {
                        data: 'icon',
                        name: 'icon'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
                    },
                    {
                        data: 'link_name',
                        name: 'link_name'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'image_alt',
                        name: 'image_alt'
                    },
                    {
                        data: 'image_title',
                        name: 'image_title'
                    },
                    {
                        data: 'banner_cta_name',
                        name: 'banner_cta_name'
                    },
                    {
                        data: 'banner_cta_link',
                        name: 'banner_cta_link'
                    },
                    {
                        data: 'meta_title',
                        name: 'meta_title'
                    },
                    {
                        data: 'meta_desc',
                        name: 'meta_desc'
                    },
                    {
                        data: 'meta_keyword',
                        name: 'meta_keyword'
                    },
                    {

                        name: 'status',
                    },
                    {
                        name: 'action'
                    },

                ],
                columnDefs: [{
                    "targets": 1,
                    "render": function(data, type, full) {
                        return `<img src="{{ asset('${full.icon}') }}" />`;
                    }
                }, {
                    "targets": 6,
                    "render": function(data, type, full) {
                        return `<a href="{{ asset('${full.image}') }}" target="_blank"><img src="{{ asset('${full.image}') }}" width="90" height="70" /></a>`;
                    }
                }, {
                    "targets": 14,
                    "render": function(data, type, full) {
                        return `<select id="status" style="width: fit-content !important;" class="form-select" name="status" onchange="brandStatus('${full.encrypt_id}',this.value)" required>
                                        <option value="Enable" ${(full.status=='Enable')? "selected" :''}>Enable</option>
                                        <option value="Disable" ${(full.status=='Disable')? "selected" :''}>Disable</option>
                                    </select>`;
                    }
                }, {
                    "targets": 15,
                    "render": function(data, type, full) {
                        return `<div style="width:max-content;"><a href="#!" onclick="deleteRow('${full.encrypt_id}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    &nbsp;&nbsp;
                                <a href="/admin/home/array-expertise/create/${full.encrypt_id})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-primary"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                </div>`;
                    }
                }]
            });
        });

        function deleteRow(id) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/home/array-expertise/${id}/delete`,
                        type: "delete",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.message,
                                    icon: "success"

                                });
                                table.ajax.reload();
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
            });

        }

        function brandStatus(id, status) {
            $.ajax({
                url: `/admin/home/array-expertise/${id}/${status}/status`,
                type: "put",
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
                        table.ajax.reload();
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

        function edit(id, title, name, logo) {
            $('#img_section').empty();
            var url = "/" + logo;
            var img_file = `<input id="client_logo" type="file" name="logo" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="300"
                            data-max-height="300" data-max-file-size="1M" required
                            data-default-file="${url}">`;

            $('#img_section').append(img_file);
            $('#title').val(title);
            $('#client_name').val(name);
            $('#id').val(id);
            $('.dropify').dropify();
            $('#FormModal').modal('show');
        }
        $('.close_btn').on('click', function() {
            $('.form_class')[0].reset();
            $('#img_section').empty();
            var img_file = `<input id="client_logo" type="file" name="logo" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="300"
                            data-max-height="300" data-max-file-size="1M" required>`;
            $('#img_section').append(img_file);
            $('#id').val('');
            $('#client_logo').dropify();
        })

        function editRow() {
            $('.no-border').attr('readonly', false);
            $('#table-action').empty();
            var btns = `<button type="submit" class="save-btn">
                            <i class="material-icons-outlined">save</i>
                        </button>
                        <a href="#!" onclick="cancel_btn()">
                            <i class="material-icons-outlined">cancel</i>
                        </a>`;
            $('#table-action').append(btns);
        }

        function cancel_btn() {
            $('.no-border').attr('readonly', true);
            $('#table-action').empty();
            var btns = `<a href="#!" onclick="editRow()">
                            <i class="material-icons-outlined">edit</i>
                        </a>`;
            $('#table-action').append(btns);
        }
    </script>
@endsection
