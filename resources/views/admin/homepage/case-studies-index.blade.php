@extends('admin.layout.main')
@section('title')
    | Case Studies
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
                <div class="breadcrumb-title pe-3">Case Studies | Title</div>



            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.home.case-studies-title.save') }}">
                            @csrf
                            <input type="hidden" id="title_id" name="case_study_title_id"
                                value="{{ encrypt($caseTitle->id) }}">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Heading</th>
                                        <th>Action</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="no-border form-control" readonly name="title"
                                                value="{{ $caseTitle->title }}"></td>
                                        <td>
                                            <textarea class="no-border form-control" name="heading" readonly>
                                         {!! nl2br(e($caseTitle->heading)) !!} </textarea>
                                        </td>
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

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Case Studies</div>
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
            <div class="ms-auto" style="float: right;margin-top: -50px;">
                <div class="btn-group">
                    <a type="button" class="btn px-4" href="{{ route('admin.home.case-studies.create') }}"
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
                                    <th>Title</th>
                                    <th>Industry Id</th>
                                    <th>Product Id</th>
                                    <th>Icon</th>
                                    <th>Shot Desc</th>
                                    <th>Image</th>
                                    <th>Image Alt</th>
                                    <th>Image Title</th>
                                    <th>Youtube Video Link</th>
                                    <th>Number % Data1</th>
                                    <th>Oneliner % Data1</th>
                                    <th>Number % Data2</th>
                                    <th>Oneliner % Data2</th>
                                    <th>Number % Data3</th>
                                    <th>Oneliner % Data3</th>
                                    <th>Details</th>
                                    <th>Company Desc</th>
                                    <th>Website</th>
                                    <th>Headquaters</th>
                                    <th>Industry</th>
                                    <th>Product Used</th>
                                    <th>CTA Url</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
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
                    url: '{{ route('admin.home.case-studies.list') }}',
                },
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'industry_id',
                        name: 'industry_id'
                    },
                    {
                        data: 'product_id',
                        name: 'product_id'
                    },
                    {
                        name: 'icon'
                    },
                    {
                        name: 'shot_desc'
                    },
                    {
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
                        data: 'youtube_video_link',
                        name: 'youtube_video_link'
                    },
                    {
                        data: 'number_perc_data1',
                        name: 'number_perc_data1'
                    },
                    {
                        data: 'oneliner_perc_data1',
                        name: 'oneliner_perc_data1'
                    },
                    {
                        data: 'number_perc_data1',
                        name: 'number_perc_data1'
                    },
                    {
                        data: 'oneliner_perc_data2',
                        name: 'oneliner_perc_data2'
                    },
                    {
                        data: 'number_perc_data3',
                        name: 'number_perc_data3'
                    },
                    {
                        data: 'oneliner_perc_data3',
                        name: 'oneliner_perc_data3'
                    },

                    {
                        name: 'details'
                    },
                    {
                        data: 'company_desc',
                        name: 'company_desc'
                    },
                    {
                        data: 'website',
                        name: 'website'
                    },
                    {
                        data: 'headquaters',
                        name: 'headquaters'
                    },
                    {
                        data: 'industry',
                        name: 'industry'
                    },
                    {
                        data: 'product_used',
                        name: 'product_used'
                    },
                    {
                        data: 'cta_url',
                        name: 'cta_url'
                    },
                    {

                        name: 'status',
                    },
                    {
                        name: 'action'
                    },

                ],
                columnDefs: [{
                    "targets": 3,
                    "render": function(data, type, full) {
                        return `<img src="{{ asset('${full.icon}') }}" />`;
                    }
                },{
                    "targets": 4,
                    "render": function(data, type, full) {
                        return `<textarea class="form-control" style="width:fit-content;height:150px" readonly>${full.shot_desc}</textarea>`;
                    }
                }, {
                    "targets": 5,
                    "render": function(data, type, full) {
                        return `<a href="{{ asset('${full.image}') }}" target="_blank"><img src="{{ asset('${full.image}') }}" width="100" height="100"/></a>`;
                    }
                }, {
                    "targets": 15,
                    "render": function(data, type, full) {
                        return `<textarea class="form-control" style="width:fit-content;height:150px" readonly>${full.details}</textarea>`;
                    }
                }, {
                    "targets": 22,
                    "render": function(data, type, full) {
                        return `<select id="status" style="width: fit-content !important;" class="form-select" name="status" onchange="caseStatus('${full.encrypt_id}',this.value)" required>
                                        <option value="Enable" ${(full.status=='Enable')? "selected" :''}>Enable</option>
                                        <option value="Disable" ${(full.status=='Disable')? "selected" :''}>Disable</option>
                                    </select>`;
                    }
                }, {
                    "targets": 23,
                    "render": function(data, type, full) {
                        return `<div style="width:max-content;"><a href="#!" onclick="deleteRow('${full.encrypt_id}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                    &nbsp;&nbsp;
                                <a href="/admin/home/case-studies/create/${full.encrypt_id})"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-primary"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
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
                        url: `/admin/home/case-studies/${id}/delete`,
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

        function caseStatus(id, status) {
            $.ajax({
                url: `/admin/home/case-studies/${id}/${status}/status`,
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
