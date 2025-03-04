@extends('admin.layout.main')
@section('title')
    | Compliance
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
@endsection
@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Compliance </div>
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
                                    <th>Logo</th>
                                    <th>Image Alt</th>
                                    <th>Image Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr id="tr_category{{ $row->id }}">

                                        <td>
                                            <a href="{{ asset($row->logo) }}" target="_blank"><img
                                                    src="{{ asset($row->logo) }}" height="100px" width="100xp"></a>
                                        </td>
                                        <td>{{ $row->image_alt }}</td>
                                        <td>{{ $row->image_title }}</td>
                                        <td>
                                            <select id="status{{ $row->id }}" style="width: fit-content !important;"
                                                class="form-select" onchange="status('{{ encrypt($row->id) }}',this.value)"
                                                required>
                                                <option value="Enable" @if ($row->status == 'Enable') selected @endif>
                                                    Enable
                                                </option>
                                                <option value="Disable" @if ($row->status == 'Disable') selected @endif>
                                                    Disable
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <div style="width:max-content">
                                                <a href="#!" onclick="edit({{ json_encode($row) }})">
                                                    <i class="material-icons-outlined">edit</i>
                                                </a>
                                                <a href="#!"
                                                    onclick="delete_category('{{ encrypt($row->id) }}',{{ $row->id }})">
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
                            <h5 class="modal-title">Compliance</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class"
                                    action="{{ route('admin.success-stories.compliance.save') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="id">

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
                                        <h6 class="mb-0 text-uppercase">Logo<span style="color:red"> *</span></h6>
                                        <hr>
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="image" class="form-label">Image should be (800*500) and
                                                    less
                                                    than 5MB</label>
                                                <div id="img_section">
                                                    <input id="image" type="file" name="logo" class="dropify"
                                                        accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                                                        data-max-height="500" data-max-file-size="5M"
                                                        data-default-file="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <label for="image_alt" class="form-label">Image ALT</label>
                                        <input type="text" class="form-control" id="image_alt" name="image_alt"
                                            placeholder="Image ALT" >
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_title" class="form-label">Image Title</label>
                                        <input type="text" class="form-control" id="image_title" name="image_title"
                                            placeholder="Image Title" >
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

        });

        function delete_category(id, trid) {

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
                        url: `/admin/success-stories/compliance/${id}/delete`,
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
                                $('#tr_category' + trid).remove();
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

        function status(id, status) {
            $.ajax({
                url: `/admin/success-stories/compliance/${id}/${status}/status`,
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

        function edit(row) {
            $('#img_section').empty();
            var image_url = "/" + row.logo;
            var img_file = `<div id="img_section">
                                <input id="image" type="file" name="icon" class="dropify"
                                accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                                data-max-height="500" data-max-file-size="5M"
                                data-default-file="${image_url}">
                            </div>
                            `;

            $('#img_section').append(img_file);

            $('#image_alt').val(row.image_alt);
            $('#image_title').val(row.image_title);
            $('#status_model').val(row.status);
            $('#id').val(row.id);
            $('.dropify').dropify();
            $('#FormModal').modal('show');
        }
        $('.close_btn').on('click', function() {
            $('.form_class')[0].reset();
            $('#img_section').empty();
            var img_file = `<input id="image" type="file" name="logo"
                                class="dropify" accept=".jpg, .png, image/jpeg, image/png, .svg"
                                data-max-width="850" data-max-height="500"
                                data-max-file-size="5M" required data-default-file="">`;
            $('#img_section').append(img_file);
            $('#id').val('');
            $('#image').dropify();
        })
    </script>
@endsection
