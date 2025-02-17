@extends('admin.layout.main')
@section('title')
    | Blogs
@endsection
@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Blogs</div>
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
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Short Description</th>
                                    <th>Image</th>
                                    <th>Image Alt</th>
                                    <th>Image Title</th>
                                    <th>CTA Name</th>
                                    <th>CTA Link</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keywords</th>
                                    <th>Tags</th>
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
                            <h5 class="modal-title">Blogs</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class" action="{{ route('admin.about.blog.save') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="id">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Title<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="content" class="form-label">Content<span style="color:red">
                                                *</span></label>
                                        <textarea type="text" class="form-control" id="content" name="content" placeholder="Content" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description<span style="color:red">
                                                *</span></label>
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cta_name" class="form-label">CTA Name</label>
                                        <input type="text" class="form-control" id="cta_name" name="cta_name"
                                            placeholder="CTA Name">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="cta_link" class="form-label">CTA Link<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="cta_link" name="cta_link" required
                                            placeholder="CTA cta Link">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_title" class="form-label">Meta Title<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            required placeholder="Meta Title">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords"
                                            name="meta_keywords" placeholder="Meta Keywords">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="tags" class="form-label">Tags<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="tags" name="tags"
                                            required placeholder="Tags">
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
                                                <label for="image" class="form-label">Image should be (850*1000) and
                                                    less
                                                    than 5MB</label>
                                                <div id="img_section">
                                                    <input id="image" type="file" name="image" class="dropify"
                                                        accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                                                        data-max-height="1000" data-max-file-size="5M" required
                                                        data-default-file="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_alt" class="form-label">Image Alt<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="image_alt" name="image_alt"
                                            placeholder="Image Alt">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_title" class="form-label">Image Title<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="image_title" name="image_tite"
                                            placeholder="Image Title">
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
            table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                searching: true,
                ajax: {
                    url: '{{ route('admin.about.blogs.list') }}',
                },
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {

                        name: 'content'
                    },
                    {

                        name: 'description'
                    },
                    {
                        name: 'image'
                    },
                    {
                        data: 'image_alt',
                        name: 'image_alt'
                    },
                    {
                        data: 'image_tite',
                        name: 'image_tite'
                    },
                    {
                        data: 'cta_name',
                        name: 'cta_name'
                    },
                    {
                        data: 'cta_link',
                        name: 'cta_link'
                    },
                    {
                        data: 'meta_title',
                        name: 'meta_title'
                    },
                    {
                        data: 'meta_keywords',
                        name: 'meta_keywords'
                    },
                    {
                        data: 'tags',
                        name: 'tags'
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
                        return `<textarea class="form-control" style="width:fit-content;height:150px" readonly>${full.content}</textarea>`;
                    }
                }, {
                    "targets": 2,
                    "render": function(data, type, full) {
                        return `<textarea class="form-control" style="width:fit-content;height:150px" readonly>${full.description}</textarea>`;
                    }
                }, {
                    "targets": 3,
                    "render": function(data, type, full) {
                        return `<a href="{{ asset('${full.image}') }}" target="_blank"> <img src="{{ asset('${full.image}') }}" width="100" height="100"/></a>`;
                    }
                }, {
                    "targets": 11,
                    "render": function(data, type, full) {
                        return `<select id="status" class="form-select" name="status" style="width: fit-content !important;" onchange="brandStatus('${full.encrypt_id}',this.value)" required>
                                        <option value="Enable" ${(full.status=='Enable')? "selected" :''}>Enable</option>
                                        <option value="Disable" ${(full.status=='Disable')? "selected" :''}>Disable</option>
                                    </select>`;
                    }
                }, {
                    "targets": 12,
                    "render": function(data, type, full) {
                        return `<div style="width: max-content !important;"><a href="#!" onclick="deleteLogo('${full.encrypt_id}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                                &nbsp;&nbsp;
                                                <a href="#!" onclick='edit("${full.encrypt_id}","${full.image}","${encodeURIComponent(full.content)}","${encodeURIComponent(full.description)}","${full.title}","${full.cta_name}","${full.cta_link}","${full.status}","${full.image_alt}","${full.image_tite}","${full.meta_title}","${full.meta_keywords}","${full.tags}")'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-primary"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                            </div>`;
                    }
                }]
            });
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
                        url: `/admin/about/blog/${id}/delete`,
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
                url: `/admin/about/blog/${id}/${status}/status`,
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

        function edit(id, image, content, description, title, cta_name, cta_link, status, image_alt, image_title,
            meta_title,
            meta_keywords, tags) {

            $('#img_section').empty();
            var url = "/" + image;
            var img_file = `<input id="image" type="file" name="image" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M"
                            data-default-file="${url}">`;

            $('#img_section').append(img_file);
            $('#content').val(decodeURIComponent(content));
            $('#description').val(decodeURIComponent(description));
            $('#title').val(title);
            $('#cta_name').val(cta_name);
            $('#cta_link').val(cta_link);
            $('#status_model').val(status);
            $('#image_alt').val(image_alt);
            $('#image_title').val(image_title);
            $('#meta_title').val(meta_title);
            $('#meta_keywords').val(meta_keywords);
            $('#tags').val(tags);
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
