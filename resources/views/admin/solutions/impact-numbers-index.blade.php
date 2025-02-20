@extends('admin.layout.main')
@section('title')
    | Impact Numbers
@endsection
@section('css')
    <style>
        .no-border {
            border: none;
        }

        .textarea-dimension {
            height: 100px;
            width: fit-content;
        }

        .compliance-dimension {
            height: 100px;
            width: fit-content;
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
                <div class="breadcrumb-title pe-3">Impact Numbers</div>



            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.solutions.impact-numbers.save') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="title_id" name="impact_number_id"
                                value="{{ encrypt($heading->id) }}">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Impact Title</th>
                                        <th>Impact Sub-Title</th>
                                        <th>Impact Short Description</th>
                                        <th>Impact Icon</th>
                                        <th>Impact Rating</th>
                                        <th>Imapact Trustpilot</th>
                                        <th>Imapact CTA Name</th>
                                        <th>Imapact CTA Link</th>
                                        <th>Action</th>
                                    </tr>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="no-border form-control textarea-dimension" readonly
                                                name="title" value="{{ $heading->our_impact_title }}"></td>
                                        <td><input type="text" class="no-border form-control textarea-dimension" readonly
                                                name="subtitle" value="{{ $heading->our_impact_subtitle }}"></td>
                                        <td>
                                            <textarea class="no-border form-control textarea-dimension" name="shortdesc" readonly>
                                             {!! nl2br(e($heading->our_impact_shortdesc)) !!}</textarea>
                                        </td>
                                        <td>
                                            <input id="image" type="file" name="icon" class="dropify"
                                                accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                                                data-max-height="500" data-max-file-size="5M"
                                                data-default-file="{{ asset($heading->our_impact_icon) }}"
                                                disabled="disabled">
                                        </td>
                                        <td><input type="text" class="no-border form-control textarea-dimension" readonly
                                                name="rating" value="{{ $heading->our_imapact_rating }}"></td>
                                        <td><input type="text" class="no-border form-control textarea-dimension" readonly
                                                name="trustpilot" value="{{ $heading->our_imapact_trustpilot }}"></td>
                                        <td><input type="text" class="no-border form-control textarea-dimension" readonly
                                                name="cta_name" value="{{ $heading->our_imapact_cta_name }}"></td>
                                        <td>
                                            <textarea class="no-border form-control textarea-dimension" name="cta_link" readonly>
                                             {!! nl2br(e($heading->our_imapact_cta_link)) !!}</textarea>
                                        </td>
                                        {{-- <td>
                                            <textarea class="no-border form-control" name="heading" readonly>
                                         {!! nl2br(e($heading->heading)) !!} </textarea>
                                        </td> --}}
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
                <div class="breadcrumb-title pe-3">Compliance</div>
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
                        style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}"
                        data-bs-toggle="modal" data-bs-target="#FormModal">Add New</a>

                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.solutions.compliance.save') }}"
                            enctype="multipart/form-data">
                            @csrf

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
                                    @foreach ($logos as $logo)
                                        <tr id="trid{{ $logo->id }}">
                                            <td>
                                                <a href="{{ asset($logo->logo) }}" target="_blank"><img
                                                        src="{{ asset($logo->logo) }}"></a>
                                            </td>
                                            <td>{{ $logo->image_alt }}</td>
                                            <td>{{ $logo->image_title }}</td>

                                            <td><select id="status{{ $logo->id }}"
                                                    style="width: fit-content !important;" class="form-select"
                                                    onchange="caseStatus('{{ encrypt($logo->id) }}',this.value)" required>
                                                    <option value="Enable"
                                                        @if ($logo->status == 'Enable') selected @endif>
                                                        Enable
                                                    </option>
                                                    <option value="Disable"
                                                        @if ($logo->status == 'Disable') selected @endif>
                                                        Disable
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="#!"
                                                        onclick="editRowCompliance({{ json_encode($logo) }})">
                                                        <i class="material-icons-outlined">edit</i>
                                                    </a>
                                                    <a href="#!"
                                                        onclick="delete_compliance('{{ encrypt($logo->id) }}',{{ $logo->id }})">
                                                        <i class="material-icons-outlined">delete</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>

             <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">USP</div>
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
                    <a type="button" class="btn px-4" href="#!"
                        style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}"
                        data-bs-toggle="modal" data-bs-target="#USPModal">Add New</a>

                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.solutions.usp.save') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Icon</th>
                                        <th>Image Alt</th>
                                        <th>Image Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($usps as $usp)
                                        <tr id="tridusp{{ $usp->id }}">
                                            <td>{{ $usp->title }}</td>
                                            <td>{{ $usp->short_des }}</td>
                                            <td>
                                                <a href="{{ asset($usp->icon) }}" target="_blank"><img
                                                        src="{{ asset($usp->icon) }}"></a>
                                            </td>
                                            <td>{{ $usp->image_alt }}</td>
                                            <td>{{ $usp->image_title }}</td>

                                            <td><select id="status{{ $usp->id }}"
                                                    style="width: fit-content !important;" class="form-select"
                                                    onchange="caseStatus('{{ encrypt($usp->id) }}',this.value)" required>
                                                    <option value="Enable"
                                                        @if ($usp->status == 'Enable') selected @endif>
                                                        Enable
                                                    </option>
                                                    <option value="Disable"
                                                        @if ($usp->status == 'Disable') selected @endif>
                                                        Disable
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                                <div style="width:max-content">
                                                    <a href="#!" onclick="editRowUsp({{ json_encode($usp) }})">
                                                        <i class="material-icons-outlined">edit</i>
                                                    </a>
                                                    <a href="#!"
                                                        onclick="delete_usp('{{ encrypt($usp->id) }}',{{ $usp->id }})">
                                                        <i class="material-icons-outlined">delete</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
            {{-- form model --}}
            <div class="modal fade" id="FormModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 py-2"
                            style="background-image: linear-gradient(310deg, #edefef 0%, #ffce00 100%) !important;">
                            <h5 class="modal-title">Add Compliance</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class" action="{{ route('admin.solutions.compliance.save') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="compliance_id">
                                    <div class="col-md-12 mx-auto">
                                        <h6 class="mb-0 text-uppercase">Image<span style="color:red"> *</span></h6>
                                        <hr>
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="image" class="form-label">Image should be (800*500) and
                                                    less
                                                    than 5MB</label>
                                                <div id="img_section">
                                                    <input id="image" type="file" name="logo" class="dropify"
                                                        accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                                                        data-max-height="500" data-max-file-size="5M" required
                                                        data-default-file="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_alt" class="form-label">Image Alt<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="image_alt" name="image_alt"
                                            placeholder="Image Alt" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_title" class="form-label">Image Title<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="image_title" name="image_title"
                                            placeholder="Image Title" required>
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
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn px-4"
                                                style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">Submit</button>
                                            <button type="button" class="btn btn-grd-danger px-4 close_btn_compliance"
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
            {{-- form model --}}
            <div class="modal fade" id="USPModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 py-2"
                            style="background-image: linear-gradient(310deg, #edefef 0%, #ffce00 100%) !important;">
                            <h5 class="modal-title">Add USP</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class" action="{{ route('admin.solutions.usp.save') }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id" id="usp_id">
                                    <div class="col-md-12">
                                        <label for="usp_title" class="form-label">Title<span style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="usp_title" name="title"
                                            placeholder="Title" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="short_des" class="form-label">Short Description<span
                                                style="color:red">
                                                *</span></label>
                                        <input type="text" class="form-control" id="short_des" name="short_des"
                                            placeholder="Short Description" required>
                                    </div>
                                    <div class="col-md-12 mx-auto">
                                        <h6 class="mb-0 text-uppercase">Image<span style="color:red"> *</span></h6>
                                        <hr>
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="image" class="form-label">Image should be (800*500) and
                                                    less
                                                    than 5MB</label>
                                                <div id="usp_img_section">
                                                    <input id="image" type="file" name="icon" class="dropify"
                                                        accept=".jpg, .png, image/jpeg, image/png,svg"
                                                        data-max-width="850" data-max-height="500"
                                                        data-max-file-size="5M" required data-default-file="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_alt_usp" class="form-label">Image Alt</label>
                                        <input type="text" class="form-control" id="image_alt_usp" name="image_alt"
                                            placeholder="Image Alt">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="image_title_usp" class="form-label">Image Title</label>
                                        <input type="text" class="form-control" id="image_title_usp" name="image_title"
                                            placeholder="Image Title">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="usp_status_model" class="form-label">Status<span style="color:red">
                                                *</span></label>
                                        <select id="usp_status_model" class="form-select" name="status" required>
                                            <option value="">Choose...</option>
                                            <option value="Enable">Enable</option>
                                            <option value="Disable">Disable</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn px-4"
                                                style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">Submit</button>
                                            <button type="button" class="btn btn-grd-danger px-4 close_btn_usp"
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
        // window.table = "";
        $(document).ready(function() {
            $('#example2').DataTable();
            $('#example2').attr('style', 'border-collapse:collapse !important;width:1012px !important');
            $('.dropify').dropify();

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

        function delete_compliance(id, s_id) {

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
                        url: `/admin/solutions/compliance/${id}/delete`,
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

                                $('#trid' + s_id).remove();
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

        function delete_usp(id, s_id) {

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
                        url: `/admin/solutions/usp/${id}/delete`,
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

                                $('#tridusp' + s_id).remove();
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
                url: `/admin/solutions/compliance/${id}/${status}/status`,
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

        function editRow() {
            $('.no-border').attr('readonly', false);
            $('#image').prop('disabled', '');
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
            $('#image').prop('disabled', false);
            $('#table-action').empty();
            var btns = `<a href="#!" onclick="editRow()">
                            <i class="material-icons-outlined">edit</i>
                        </a>`;
            $('#table-action').append(btns);
        }

        function editRowCompliance(logoData) {
            console.log(logoData.id);


            $('#img_section').empty();
            var url = "/" + logoData.logo;
            var img_file = `<input id="image" type="file" name="logo" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M"
                            data-default-file="${url}">`;

            $('#img_section').append(img_file);
            $('#image_alt').val(logoData.image_alt);
            $('#image_title').val(logoData.image_title);
            $('#status_model').val(logoData.status);
            $('#compliance_id').val(logoData.id);
            $('.dropify').dropify();
            $('#FormModal').modal('show');
        }
        $('.close_btn_compliance').on('click', function() {
            $('.form_class')[0].reset();
            $('#img_section').empty();
            var img_file = `<input id="image" type="file" name="logo" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M" required>`;
            $('#img_section').append(img_file);
            $('#id').val('');
            $('.dropify').dropify();
        })

        function editRowUsp(logoData) {
            $('#usp_img_section').empty();
            var url = "/" + logoData.icon;
            var img_file = `<input id="image" type="file" name="icon" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M"
                            data-default-file="${url}">`;

            $('#usp_img_section').append(img_file);
            $('#usp_title').val(logoData.title);
            $('#short_des').val(logoData.short_des);
            $('#image_alt_usp').val(logoData.image_alt);
            $('#image_title_usp').val(logoData.image_title);
            $('#usp_status_model').val(logoData.status);
            $('#usp_id').val(logoData.id);
            $('.dropify').dropify();
            $('#USPModal').modal('show');
        }

        $('.close_btn_usp').on('click', function() {
            $('.form_class')[0].reset();
            $('#img_section').empty();
            var img_file = `<input id="image" type="file" name="icon" class="dropify"
                            accept=".jpg, .png, image/jpeg, image/png" data-max-width="850"
                            data-max-height="500" data-max-file-size="5M" required>`;
            $('#img_section').append(img_file);
            $('#id').val('');
            $('.dropify').dropify();
        })
    </script>
@endsection
