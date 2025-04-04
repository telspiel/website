@extends('admin.layout.main')
@section('title')
    | Contact IT Revolution
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
                <div class="breadcrumb-title pe-3">Contact IT Revolution </div>
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
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Remarks</th>
                                    <th>Sent To</th>
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
                        <div class="modal-header border-bottom-0 py-2" style="background-color: #ffce00 !important;">
                            <h5 class="modal-title">Send an email</h5>
                            <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                <i class="material-icons-outlined">close</i>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="form-body">
                                <form class="row g-3 form_class" action="{{ route('admin.email.send') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="">
                                    <input type="hidden" name="type" value="contact_it">
                                        <div class="col-md-12">
                                        <label for="to_email" class="form-label">Recipient Email<span style="color:red">
                                                *</span></label>
                                        <select id="to_email" class="form-select" name="to_email" required>
                                            <option value="">Select...</option>
                                            @foreach ($emails as $email)
                                                <option value="{{ $email->email }}">{{ $email->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="subject" class="form-label">Subject<span style="color:red">
                                                *</span></label>
                                        <input type="text" id="subject" class="form-control" name="subject" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="message" class="form-label">Message<span style="color:red">
                                                *</span></label>
                                        <textarea type="text" class="form-control" id="message" name="message" style="height:250px;" placeholder="Message"
                                            required></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" class="btn px-4"
                                                style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">Send</button>
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

            table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ordering: false,
                searching: true,
                ajax: {
                    url: '{{ route('admin.enquiry.contact-it-revolution.list') }}',
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone_no',
                        name: 'phone_no'
                    },
                    {

                        name: 'remarks'
                    },
                    {
                        data: 'is_sent',
                        name: 'is_sent'
                    },
                    {
                        name: 'action'
                    },

                ],
                columnDefs: [{
                    "targets": 3,
                    "render": function(data, type, full) {
                        return (full.remarks) ?
                            `<textarea class="form-control" style="width:fit-content;height:150px" readonly>${full.remarks}</textarea>` :
                            '';
                    }
                }, {
                    "targets": 5,
                    "render": function(data, type, full) {
                        return `<div style="width: max-content !important;">
                                    &nbsp;&nbsp;
                                    <a href="#!" onclick='sendEmail(${JSON.stringify(full)})'><i class="material-icons-outlined">send</i></a>
                                </div>`;
                    }
                }]
            });
        });

        function sendEmail(row) {
            var text = `Name: ${row.name}
            Email: ${row.email}
            Phone No.: ${row.phone_no}
            Remarks: ${row.remarks}`.replace(/^\s+/gm, '');
            $('#message').val(text.trim());
            $('#id').val(row.id);
            $('#FormModal').modal('show');
        }
        $('.close_btn').on('click', function() {
            $('.form_class')[0].reset();
            $('#id').val('');
        })
    </script>
@endsection
