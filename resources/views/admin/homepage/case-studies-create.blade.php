@extends('admin.layout.main')
@section('title')
    | Case Studies Form
@endsection

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Case Studies</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                @if ($data)
                                    Update
                                @else
                                    Create
                                @endif
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Case Studies Form</h5>
                            <form class="row g-3" method="POST" action="{{ route('admin.home.case-studies.save') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id"
                                    value="@if ($data) {{ encrypt($data->id) }} @endif">

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        @if ($data) value="{{ $data->title }}" @endif
                                        placeholder="Title" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shot_desc" class="form-label">Shot Desc<span style="color:red">
                                            *</span></label>
                                    <textarea type="text" class="form-control" id="shot_desc" name="shot_desc" placeholder="Shot Desc" required>
                                        @if ($data)
{!! $data->shot_desc !!}
@endif
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="icon" class="form-label">Icon(300*300) less 1MB<span style="color:red">
                                            *</span></label>
                                    <input id="icon" type="file" name="icon" class="dropify"
                                        accept=".jpg, .png, image/jpeg, image/png" data-max-width="300"
                                        data-max-height="300" data-max-file-size="1M"
                                        @if ($data) data-default-file="{{ asset($data->icon) }}" @else required @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image<span style="color:red"> *</span></label>
                                    <input id="image" type="file" name="image" class="dropify"
                                        accept=".jpg, .png, image/jpeg, image/png" data-max-file-size="2M"
                                        @if ($data) data-default-file="{{ asset($data->image) }}" @else required @endif>
                                </div>
                                <div class="col-md-6">
                                    <label for="image_alt" class="form-label">Image Alt<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="image_alt" class="form-control" id="image_alt"
                                        @if ($data) value="{{ $data->image_alt }}" @endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="image_title" class="form-label">Image Title<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="image_title" class="form-control" id="image_title"
                                        @if ($data) value="{{ $data->image_title }}" @endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="website" class="form-label">Website<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="website" class="form-control" id="website"
                                        @if ($data) value="{{ $data->website }}" @endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="youtube_video_link" class="form-label">Youtube Video Link</label>
                                    <input type="text" name="youtube_video_link" class="form-control"
                                        id="youtube_video_link"
                                        @if ($data) value="{{ $data->youtube_video_link }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="number_perc_data1" class="form-label">Number % Data1<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="number_perc_data1" class="form-control"
                                        id="number_perc_data1"
                                        @if ($data) value="{{ $data->number_perc_data1 }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="oneliner_perc_data1" class="form-label">Oneliner % Data1<span
                                            style="color:red">
                                            *</span></label>
                                    <input type="text" name="oneliner_perc_data1" class="form-control"
                                        id="oneliner_perc_data1"
                                        @if ($data) value="{{ $data->oneliner_perc_data1 }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="number_perc_data2" class="form-label">Number % Data2<span
                                            style="color:red">
                                            *</span></label>
                                    <input type="text" name="number_perc_data2" class="form-control"
                                        id="number_perc_data2"
                                        @if ($data) value="{{ $data->number_perc_data2 }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="oneliner_perc_data2" class="form-label">Oneliner % Data2<span
                                            style="color:red">
                                            *</span></label>
                                    <input type="text" name="oneliner_perc_data2" class="form-control"
                                        id="oneliner_perc_data2"
                                        @if ($data) value="{{ $data->oneliner_perc_data2 }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="number_perc_data3" class="form-label">Number % Data3<span
                                            style="color:red">
                                            *</span></label>
                                    <input type="text" name="number_perc_data3" class="form-control"
                                        id="number_perc_data3"
                                        @if ($data) value="{{ $data->number_perc_data3 }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="oneliner_perc_data3" class="form-label">Oneliner % Data3<span
                                            style="color:red">
                                            *</span></label>
                                    <input type="text" name="oneliner_perc_data3" class="form-control"
                                        id="oneliner_perc_data3"
                                        @if ($data) value="{{ $data->oneliner_perc_data3 }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="details" class="form-label">Details<span style="color:red">
                                            *</span></label>
                                    <textarea type="text" name="details" class="form-control" id="details" required> @if ($data)
{!! $data->details !!}
@endif
</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="company_desc" class="form-label">Company Desc<span style="color:red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="company_desc" name="company_desc"
                                        @if ($data) value="{{ $data->company_desc }}" @endif
                                        placeholder="Company Desc" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="headquaters" class="form-label">Headquaters<span style="color:red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="headquaters" name="headquaters"
                                        @if ($data) value="{{ $data->headquaters }}" @endif
                                        placeholder="Headquaters" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="industry" class="form-label">Industry<span style="color:red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="industry" name="industry"
                                        @if ($data) value="{{ $data->industry }}" @endif
                                        placeholder="Industry" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="product_used" class="form-label">Product Used<span style="color:red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="product_used" name="product_used"
                                        @if ($data) value="{{ $data->product_used }}" @endif
                                        placeholder="Product Used" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cta_url" class="form-label">CTA Url<span style="color:red">
                                            *</span></label>
                                    <input type="text" class="form-control" id="cta_url" name="cta_url"
                                        @if ($data) value="{{ $data->cta_url }}" @endif
                                        placeholder="CTA Url" required>
                                </div>


                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn px-4"
                                            style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">
                                            @if ($data)
                                                Update
                                            @else
                                                Submit
                                            @endif
                                        </button>
                                        <a href="{{ URL::previous() }}" class="btn btn-grd-danger px-4">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--end main wrapper-->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $('.dropify').dropify();
        });
    </script>
@endsection
