@extends('admin.layout.main')
@section('title')
    | Array Expertise Form
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
                            <h5 class="mb-4">Array Expertise Form</h5>
                            <form class="row g-3" method="POST"
                                action="{{ route('admin.home.array-expertise-save-right') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id"
                                    value="@if ($data) {{ encrypt($data->id) }} @endif">
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Category<span style="color:red">
                                            *</span></label>
                                    <select id="input7" class="form-select" name="category" id="category" required>
                                        <option value="">--select--</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}"
                                                @if ($data && $data->cat_id == $cat->id) selected @endif>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Title<span style="color:red"> *</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        @if ($data) value="{{ $data->title }}" @endif
                                        placeholder="Title" required>
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
                                    <label for="slug" class="form-label">Slug<span style="color:red"> *</span></label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        @if ($data) value="{{ $data->slug }}" @endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="link_name" class="form-label">Link_name<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="link_name" class="form-control" id="link_name"
                                        @if ($data) value="{{ $data->link_name }}" @endif required>
                                </div>
                                <div class="col-md-6">
                                    <label for="banner_cta_name" class="form-label">Banner CTA Name<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="banner_cta_name" class="form-control" id="banner_cta_name"
                                        @if ($data) value="{{ $data->banner_cta_name }}" @endif
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="banner_cta_link" class="form-label">Banner CTA Link<span style="color:red">
                                            *</span></label>
                                    <input type="text" name="banner_cta_link" class="form-control" id="banner_cta_link"
                                        @if ($data) value="{{ $data->banner_cta_link }}" @endif
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn px-4"
                                            style="background-image: linear-gradient(315deg, #373435 0%, #ffcc29 74%) !important;}">
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
