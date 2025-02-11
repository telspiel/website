@extends('layouts.app')

@section("htmlheader_title", $integration_page_headings->meta_title)

@section("htmlheader_desc", $integration_page_headings->meta_desc)

@section("htmlheader_keyword", $integration_page_headings->meta_keyword)

@section('content')
    
    
    <div class="py-5 bg-gradiant-1 borderbottom">
        <div class="container">-
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class=" my-lg-4 fs-68 fw-medium lh-1 text-m-40 text-capitalize">
                        <!-- {{$integration_banner->title}} -->
						<span class="d-lg-block typewrite" data-period="1000" data-type='["Comprehend", "Untangle"]'>Comprehend</span> partner Integrations

                    </h1>
                    <p class="fs-5 grey-1 mb-4 text-m-16">
                        {{$integration_banner->detail}}
                    </p>
                    <a href="{{$integration_banner->url}}" class="btn btn-warning">{{$integration_banner->cta_link}}</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{url($integration_banner->image)}}" class="w-100 hero-img" alt="{{$integration_banner->image_alt}}" title="{{$integration_banner->image_title}}">
                </div>
            </div>
        </div>
    </div>




    @if(!$integration_categories->isEmpty())
    <section class="borderbottom " data-aos="fade-up">
        <div class="container">
            <ul class="nav navmenu2" id="myTab" role="tablist">
                @foreach($integration_categories as $category)
                @php
                if($category->id == 1){
                    $idTab = "Integration-tab";
                    $areaTab = "Integration";
                }else{
                    $idTab = "Api-tab";
                    $areaTab = "Api";
                }
                @endphp
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{$idTab}}" data-bs-toggle="tab" href="#{{$areaTab}}" role="tab"
                        aria-controls="{{$areaTab}}" aria-selected="true">{{$category->category_name}}<img
                            src="{{url('assets/images/icons/right-icon.svg')}}" alt=""></a>
                </li>
                @endforeach

            </ul>
        </div>
    </section>
    @endif
    @if(!$integration_categories->isEmpty())
    <section class="" data-aos="fade-up">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                @foreach($integration_categories as $category)
                @php
                if($category->id == 1){
                    $idTab = "Integration-tab";
                    $areaTab = "Integration";
                    $letter = 'e';
                    $serviceLetter = 'b';
                }else{
                    $idTab = "Api-tab";
                    $areaTab = "Api";
                    $letter = 'a';
                    $serviceLetter = 'c';
                }
                @endphp
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{$areaTab}}" role="tabpanel"
                    aria-labelledby="{{$idTab}}">
                    @php
                    $integration_sub_categories = DB::table('integration_sub_categories')
                                    ->select('integration_sub_categories.*')
                                    ->where('cat_id',$category->id)
                                    ->where('status','Enable')
                                    ->get(); 
                    @endphp
                    @if(!$integration_sub_categories->isEmpty())
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row pt-lg-4  gx-lg-5">
                                <div class="col-lg-2 border-end">
                                    <ul class="navmenu2 flex-column align-items-start p-0 d-none d-lg-flex"
                                        role="tablist" id="myTab2">
                                        @php
                                        $a = 1;
                                        @endphp
                                        @foreach($integration_sub_categories as $subCat)
                                        @php
                                        $subCatText = strtolower($subCat->title);
                                        $subCatText = preg_replace('/\s+/', ' ', $subCatText);
                                        $subCatText = str_replace(' ', '-', $subCatText);
                                        @endphp
                                        <li role="presentation">
                                            <a class="{{ $loop->first ? 'active' : '' }}" id="{{$subCatText}}-tab" data-bs-toggle="tab" href="#{{$subCatText}}" role="tab"
                                                aria-selected="true">
                                                {{$subCat->title}} <img src="{{url('assets/images/icons/right-icon.svg')}}" alt="">
                                            </a>
                                        </li>
                                        @php
                                        $a++;
                                        @endphp
                                        @endforeach


                                    </ul>

                                    <div class="d-lg-none  pb-0 px-lg-3">
                                        <div class="dropdown navmenu2drop ">
                                            @foreach($integration_sub_categories as $subCat)
                                            @if($loop->first)
                                            <button type="button " class="changetext" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                {{$subCat->title}}
                                            </button>
                                            @endif
                                            @endforeach
                                            @php
                                            $b = 1;
                                            @endphp
                                            <ul class="dropdown-menu" role="tablist">
                                                @foreach($integration_sub_categories as $subCat)
                                                @php
                                                $subCatText = strtolower($subCat->title);
                                                $subCatText = preg_replace('/\s+/', ' ', $subCatText);
                                                $subCatText = str_replace(' ', '-', $subCatText);
                                                @endphp
                                                <li role="presentation"><a class="dropdown-item {{ $loop->first ? 'active' : '' }}" href="#{{$subCatText}}"
                                                        data-bs-toggle="tab" data-tab-name="{{$subCatText}}">{{$subCat->title}}</a></li>
                                                @php
                                                $b++;
                                                @endphp
                                                @endforeach
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="tab-content" id="myTab2Content">
                                       
                                        @foreach($integration_sub_categories as $subCat)
                                        @php
                                        $integration_services_category = DB::table('integration_services_category')
                                                        ->select('integration_services_category.*')
                                                        ->where('cat_id',$subCat->cat_id)
                                                        ->where('sub_cat_id',$subCat->id)
                                                        ->where('status','Enable')
                                                        ->get();
                                        // echo $subCat->cat_id.'_'.$subCat->id.'<br>';
                                        @endphp
                                        @php
                                        $subCatText = strtolower($subCat->title);
                                        $subCatText = preg_replace('/\s+/', ' ', $subCatText);
                                        $subCatText = str_replace(' ', '-', $subCatText);
                                        @endphp
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{$subCatText}}" aria-labelledby="{{$subCatText}}" role="tabpanel">
                                            <div class="row">
                                                @if(!$integration_services_category->isEmpty())
                                                @php
                                                $z = 1;
                                                @endphp
                                                <div class="col-lg-2">
                                                    <div class="nav-resposnive d-lg-block d-none">
                                                        <ul class="navmenu2 flex-lg-column align-items-start p-0 "
                                                            role="tablist" id="myTab3">
                                                            @foreach($integration_services_category as $service)
                                                            @php
                                                            $serviceText = strtolower($service->title);
                                                            $serviceText = preg_replace('/\s+/', ' ', $serviceText);
                                                            $serviceText = str_replace(' ', '-', $serviceText);
                                                            @endphp
                                                            <li role="presentation">
                                                                <a class="{{ $loop->first ? 'active' : '' }}" id="{{$serviceText}}-tab" data-bs-toggle="tab"
                                                                    href="#{{$serviceText}}" role="tab" aria-selected="true">
                                                                    {{$service->title}} <img src="{{url('assets/images/icons/right-icon.svg')}}"
                                                                        alt="">
                                                                </a>
                                                            </li>
                                                            @php
                                                            $z++;
                                                            @endphp
                                                            @endforeach


                                                        </ul>
                                                    </div>



                                                    <div class="d-lg-none pt-3 pb-0 px-lg-3">
                                                        <div class="dropdown navmenu2drop">
                                                            @foreach($integration_services_category as $service)
                                                            @if($loop->first)
                                                            <button type="button " class="changetext bg-transparent" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                {{$service->title}}
                                                            </button>
                                                            @endif
                                                            @endforeach
                                                            <ul class="dropdown-menu" role="tablist">
                                                                @php
                                                                $d = 1;
                                                                @endphp
                                                                @foreach($integration_services_category as $service)
                                                                @php
                                                                $serviceText = strtolower($service->title);
                                                                $serviceText = preg_replace('/\s+/', ' ', $serviceText);
                                                                $serviceText = str_replace(' ', '-', $serviceText);
                                                                @endphp
                                                                <li role="presentation"><a class="dropdown-item {{ $loop->first ? 'active' : '' }}"
                                                                        href="#{{$serviceText}}" data-bs-toggle="tab"
                                                                        data-tab-name="{{$serviceText}}">{{$service->title}}</a></li>
                                                                @php
                                                                $d++;
                                                                @endphp
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-10">
                                                    <div class="tab-content">
                                                        @php
                                                            $firstActiveClassAdded = false;
                                                            $e = 1;
                                                        @endphp
                                                        @php
                                                        $integration_services_category = DB::table('integration_services_category')
                                                                        ->select('integration_services_category.*')
                                                                        ->where('cat_id',$subCat->cat_id)
                                                                        ->where('sub_cat_id',$subCat->id)
                                                                        ->where('status','Enable')
                                                                        ->get(); 
                                                        @endphp
                                                        @if(!$integration_services_category->isEmpty())
                                                        @foreach($integration_services_category as $service)
                                                        @php
                                                        $integration_services_content = DB::table('integration_services_content')
                                                                        ->select('integration_services_content.*')
                                                                        ->where('cat_id',$service->cat_id)
                                                                        ->where('sub_cat_id',$service->sub_cat_id)
                                                                        ->where('services_id',$service->id)
                                                                        ->where('status','Enable')
                                                                        ->first(); 

                                                        @endphp
                                                        @if(isset($integration_services_content))
                                                        @php
                                                            $activeClass = !$firstActiveClassAdded ? 'active show' : '';
                                                            $firstActiveClassAdded = true; // Set flag to true after the first iteration
                                                        @endphp
                                                        @php
                                                        $serviceText = strtolower($service->title);
                                                        $serviceText = preg_replace('/\s+/', ' ', $serviceText);
                                                        $serviceText = str_replace(' ', '-', $serviceText);
                                                        @endphp
                                                        <div class="tab-pane fade {{ $activeClass }}" id="{{$serviceText}}" role="tabpanel"
                                                            tabindex="0">
                                                            <div class="card light-bg rounded-0 border-0 ">
                                                                <div class="card-body">
                                                                    <h2 class="fs-3 text-m-20">{{$integration_services_content->title}}</h2>
                                                                    <img src="{{url($integration_services_content->image)}}" class="my-3 w-100" alt="{{$integration_services_content->image_alt}}" title="{{$integration_services_content->image_title}}">
                                                                    <p>{{$integration_services_content->content}}</p>
                                                                   <!-- <button  value="{{$integration_services_content->id}}"
                                                                        class="btn btn-outline-light text-secondary border-light-2 downloadBtnClick"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#formmodal">{{$integration_services_content->cta_name}}</button>-->
																	 <button  value="{{$integration_services_content->id}}"
                                                                        class="btn btn-outline-light text-secondary border-light-2 downloadBtnClick"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#">{{$integration_services_content->cta_name}}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @php
                                                        $e++;
                                                        @endphp
                                                        @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>



                                </div>
                            </div>



                        </div>
                        
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if(!$integration_benefits->isEmpty())
    <section class="section-spacing position-relative" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <div class="badge-only mb-0 aos-init aos-animate" data-aos="fade-up">
                            <img src="{{url($integration_page_headings->benefit_icon)}}" alt="" />
                            {{$integration_page_headings->benefit_title}}
                        </div>

                        <h3 class="fs-44 fw-medium text-m-32 aos-init aos-animate" data-aos="fade-up">{{$integration_page_headings->benefit_subtitle}}</h3>
                        <p class="aos-init aos-animate" data-aos="fade-up">{{$integration_page_headings->benefit_shortdesc}}</p>
                    </div>
                </div>
            </div>
            <ul class="whattheysay mt-lg-5 mt-2">
                @foreach($integration_benefits as $benifit)
                <li class="aos-init aos-animate" data-aos="fade-left"><img src="{{url($benifit->icon)}}" alt="{{$benifit->one_liner_content}}" style="width: 52px!important; height: 52px!important;">
                    <p>{{$benifit->one_liner_content}}</p>
                </li>
                @endforeach
            </ul>
            <img src="{{url($integration_page_headings->benefit_bg_png)}}" class="whattheysay-mg d-none d-lg-block" alt="{{$integration_page_headings->benefit_bg_image_alt}}" title="{{$integration_page_headings->benefit_bg_image_title}}">
        </div>

    </section>
    @endif




    @if(!$integration_usp->isEmpty())
    <section class="section-spacing">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="badge-only mb-0  aos-init aos-animate" data-aos="fade-up">
                            <img src="{{url($integration_page_headings->usp_icon)}}" alt="{{$integration_page_headings->usp_title}}" /> {{$integration_page_headings->usp_title}}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="fs-44 fw-medium mb-0 text-m-32  aos-init aos-animate" data-aos="fade-up">{{$integration_page_headings->usp_subtitle}}</h4>
                    </div>
                    @foreach($integration_usp as $usp)
                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card aos-init aos-animate" data-aos="fade-up">
                            <div class="card-body">
                                <div class="icon_about">
                                <img src="{{url($usp->icon)}}" alt="{{$usp->image_alt}}" title="{{$usp->image_title}}">
                               
                                </div>
                                 <h6 class="fs-5 fw-bold hover-color my-3 pb-0">{{$usp->title}}</h6>
                                <p class="mb-0">{{$usp->short_des}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif



    <!-- Modal -->
    <div class="modal fade mmodal" id="formmodal" tabindex="-1" aria-labelledby="formmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 py-2">
                    <h1 class="modal-title fs-3 mx-auto" id="formmodalLabel">Form Title</h1>
                    <button type="button" class="btn-close modalclose" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="content_id" name="" value="">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control nameY" id="yname" placeholder="Your Name">
                        <label for="yname">Your Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control emailY" id="Email" placeholder="Email">
                        <label for="Email">Email</label>
                    </div>

                    <button type="button" class="btn btn-warning w-100 downloadPdf">Submit and Download</button>
                </div>

            </div>
        </div>
    </div>
@endsection



@section('script_content')

<script>
    $(document).on('click','.downloadBtnClick',function(){
        var id = $(this).val();
        $('.content_id').val(id);
    });
</script>
<script>
    $(document).on('click','.downloadPdf', function() {
      var id = $('.content_id').val();
      var name = $('.nameY').val();
      var email = $('.emailY').val();
      if(name == ''){
        return alert('Name field required.');
      }
      if(email == ''){
        return alert('Email field required.');
      }
      var errorMessage = '';

      // Regular expression for basic email validation
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailPattern.test(email)) {
        errorMessage = 'Please enter a valid email address.';
      }

      if (errorMessage) {
        // $('#error-message').text(errorMessage);
         return alert(errorMessage);
      }
      $.ajax({
        url:"{{url('download-pdf')}}",
        method:"POST",
        data:{"_token": "{{ csrf_token() }}", "id": id,"name": name, "email": email},
        success:function(data)
        {
            if(data.error == 200){
                // window.location.href = "{{url('/')}}/"+data.pdf;
                window.open("{{url('/')}}/" + data.pdf, '_blank')
                $('#formmodal').modal('hide');
                $('.nameY').val('');
                $('.emailY').val('');
            }else if(data.error == 422){
                return alert(data.message.email);
            }else{
                return alert(data.message);
            }
            
        }

       });
    });
  </script>

@endsection
