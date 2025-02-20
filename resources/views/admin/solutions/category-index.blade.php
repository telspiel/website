@extends('admin.layout.main')
@section('title')
    | Category
@endsection
@section('css')
    <style>
        .no-border {
            border: none;
        }

        .textarea-dimension {
            height: 150px;
            width: 350px !important;
        }

        .save-btn {
            border: none;
            background-color: white;
        }
    </style>
@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category</div>
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
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Main Category Name</th>
                                    <th>Title</th>
                                    <th>Detail</th>
                                    <th>Slug</th>
                                    <th>Icon</th>
                                    <th>Image</th>
                                    <th>Image Alt</th>
                                    <th>Image Title</th>
                                    <th>Link Name</th>
                                    <th>Banner CTA Name</th>
                                    <th>Banner CTA Link</th>
                                    <th>Meta Title</th>
                                    <th>Meta Desc</th>
                                    <th>Meta Keyword</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategory as $subcat)
                                    <tr id="tridusp{{ $subcat->id }}">
                                        <td>{{ $subcat->category_data->name }}</td>
                                        <td>{{ $subcat->title }}</td>
                                        <td>
                                            <textarea class="no-border form-control textarea-dimension" name="shortdesc" readonly>
                                             {!! nl2br(e($subcat->detail)) !!}</textarea>
                                        </td>
                                        <td>{{ $subcat->slug }}</td>
                                        <td>
                                            <a href="{{ asset($subcat->icon) }}" target="_blank"><img
                                                    src="{{ asset($subcat->icon) }}" height="100px" width="100xp"></a>
                                        <td>
                                            <a href="{{ asset($subcat->image) }}" target="_blank"><img
                                                    src="{{ asset($subcat->image) }}" height="100px" width="100xp"></a>
                                        </td>
                                        <td>{{ $subcat->image_alt }}</td>
                                        <td>{{ $subcat->image_title }}</td>
                                        <td>{{ $subcat->link_name }}</td>
                                        <td>{{ $subcat->banner_cta_name }}</td>
                                        <td>{{ $subcat->banner_cta_link }}</td>
                                        <td>{{ $subcat->meta_title }}</td>
                                        <td>{{ $subcat->meta_desc }}</td>
                                        <td>{{ $subcat->keyword }}</td>

                                        <td><select id="status{{ $subcat->id }}" style="width: fit-content !important;"
                                                class="form-select"
                                                onchange="caseStatus('{{ encrypt($subcat->id) }}',this.value)" required>
                                                <option value="Enable" @if ($subcat->status == 'Enable') selected @endif>
                                                    Enable
                                                </option>
                                                <option value="Disable" @if ($subcat->status == 'Disable') selected @endif>
                                                    Disable
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <div style="width:max-content">
                                                <a href="#!" onclick="edit({{ json_encode($subcat) }})">
                                                    <i class="material-icons-outlined">edit</i>
                                                </a>
                                                <a href="#!"
                                                    onclick="delete_cat('{{ encrypt($subcat->id) }}',{{ $subcat->id }})">
                                                    <i class="material-icons-outlined">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
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
                            <h5 class="modal-title">Add Worklife</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class" action="{{ route('admin.about.worklife.save') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="id">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="short_desc" class="form-label">Short Description<span style="color:red">
                                                *</span></label>
                                        <textarea type="text" class="form-control" id="short_desc" name="short_desc" placeholder="Short Description"
                                            required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cta_name" class="form-label">CTA Name<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="cta_name" name="cta_name"
                                            placeholder="CTA Name" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cta_link" class="form-label">CTA Link<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="cta_link" name="cta_link"
                                            placeholder="CTA Link" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="status_model" class="form-label">Status<span style="color:red">
                                                *</span></label>
                                        <select id="status_model" class="form-select" name="status" required>
                                            <option value="">Choose...</option>
                                            <option value="Enable">Enable</option>
                                            <option value="Disable">Disable</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mx-auto">
                                        <h6 class="mb-0 text-uppercase">Image<span style="color:red"> *</span></h6>
                                        <hr>
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="image" class="form-label">Image should be (800*500) and
                                                    less
                                                    than 5MB</label>
                                                <div id="img_section">
                                                    <input id="image" type="file" name="image" class="dropify"
                                                        accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                                                        data-max-height="500" data-max-file-size="5M" required
                                                        data-default-file="">
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
            $('.dropify').dropify();
            table = $('#example').DataTable();
            // table = $('#example').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ordering: false,
            //     searching: true,
            //     ajax: {
            //         url: '{{ route('admin.about.worklife.list') }}',
            //     },
            //     columns: [{
            //             data: 'title',
            //             name: 'title'
            //         },
            //         {
            //             data: 'short_desc',
            //             name: 'short_desc'
            //         },
            //         {
            //             name: 'image'
            //         },
            //         {
            //             data: 'cta_name',
            //             name: 'cta_name'
            //         }, {
            //             data: 'cta_link',
            //             name: 'cta_link'
            //         },
            //         {

            //             name: 'status',
            //         },
            //         {
            //             name: 'action'
            //         },

            //     ],
            //     columnDefs: [{
            //         "targets": 2,
            //         "render": function(data, type, full) {
            //             return `<a href="{{ asset('${full.image}') }}" target="_blank"> <img src="{{ asset('${full.image}') }}" width="100" height="100"/></a>`;
            //         }
            //     }, {
            //         "targets": 5,
            //         "render": function(data, type, full) {
            //             return `<select id="status" class="form-select" name="status" style="width: fit-content !important;" onchange="brandStatus('${full.encrypt_id}',this.value)" required>
        //                             <option value="Enable" ${(full.status=='Enable')? "selected" :''}>Enable</option>
        //                             <option value="Disable" ${(full.status=='Disable')? "selected" :''}>Disable</option>
        //                         </select>`;
            //         }
            //     }, {
            //         "targets": 6,
            //         "render": function(data, type, full) {
            //             return `<div style="width: max-content !important;"><a href="#!" onclick="deleteLogo('${full.encrypt_id}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
        //                                     &nbsp;&nbsp;
        //                                     <a href="#!" onclick="edit('${full.encrypt_id}','${full.image}','${full.title}','${full.short_desc}','${full.cta_name}','${full.cta_link}','${full.status}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-primary"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
        //                                 </div>`;
            //         }
            //     }]
            // });
        });

        function deleteLogo(id) {

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
                        url: `/admin/about/worklife/${id}/delete`,
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
                url: `/admin/about/worklife/${id}/${status}/status`,
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

        function edit(id, image, title, short_desc, cta_name, cta_link, status) {


            $('#img_section').empty();
            var url = "/" + image;
            var img_file = `<input id="image" type="file" name="image" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M"
                            data-default-file="${url}">`;

            $('#img_section').append(img_file);
            $('#title').val(title);
            $('#short_desc').val(short_desc);
            $('#cta_name').val(cta_name);
            $('#cta_link').val(cta_link);
            $('#status_model').val(status);
            $('#id').val(id);
            $('.dropify').dropify();
            $('#FormModal').modal('show');
        }
        $('.close_btn').on('click', function() {
            $('.form_class')[0].reset();
            $('#img_section').empty();
            var img_file = `<input id="image" type="file" name="image" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M" required>`;
            $('#img_section').append(img_file);
            $('#id').val('');
            $('#image').dropify();
        })
    </script>
@endsection
