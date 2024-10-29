<!-- resources/views/reviews/index.blade.php -->
@extends('layouts.frontend_theme.main')
@section('mainContent')
@section('pageTitle', $pageTitle)
<section class="reviews-section">
    <div class="container">
        {{-- <h3 class="text-left mb-4">Reviews for this Project</h3> --}}

                <div class="mb-sm-3">
        <h1 class="mb-sm-0">{{ $pageTitle ?? '' }}</h1>
                </div>



 <!-- For all reviews -->

    {{-- <x-approved-reviews :projectId="$project->id" :projectName="$project->name" :limit="10000" /> --}}

    <div class="reviewed_num d-flex align-items-center gap-3 mb-4">
            <div>
                <h5 class="m-0 p-0">4.0</h5>
            </div>
            <div id="star-rating2" class="star-rating">
                <i class="fa fa-star" data-value="1"></i>
                <i class="fa fa-star" data-value="2"></i>
                <i class="fa fa-star" data-value="3"></i>
                <i class="fa fa-star" data-value="4"></i>
                <i class="fa fa-star" data-value="5"></i>
            </div>
            <div>
                <p class="m-0 pt-1">7,296 reviews</p>
            </div>
    </div>
    <div class="row">
        <div class="col-lg-4"> 
            <div class="top_part mb-4">
                <div class="reviewed_progress">
                    <div class="card p-3 g-0">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 p-0">Excellent</p>
                                <p class="m-0 p-0">592</p>
                            </div>
                            <div class="progress w-100">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 p-0">Very good</p>
                                <p class="m-0 p-0">312</p>
                            </div>
                            <div class="progress w-100">
                                <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 p-0">Average</p>
                                <p class="m-0 p-0">312</p>
                            </div>
                            <div class="progress w-100">
                                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60%</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 p-0">Poor</p>
                                <p class="m-0 p-0">312</p>
                            </div>
                            <div class="progress w-100">
                                <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">40%</div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1 p-0">Terrible</p>
                                <p class="m-0 p-0">2</p>
                            </div>
                            <div class="progress w-100">
                                <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20%</div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="filter_buttons">
                <div>
                    <h5 class="mb-3">Popular mentions</h5>
                    <div class="mb-4 d-flex gap-2 w-100 flex-wrap">
                        <button class="btn btn-outline-dark">Overall Satisfaction</button>
                        <button class="btn btn-outline-dark">Location & Accessibility</button>
                        <button class="btn btn-outline-dark">Amenities & Facilities</button>
                        <button class="btn btn-outline-dark">Apartment/Condo Unit Design & Quality</button>
                        <button class="btn btn-outline-dark">Safety & Security</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="card p-3 g-0 mt-3">
            <div class="row">
                <div class="col-lg-4 border-end">
                    <div class="left_part">
                        {{-- 1 --}}
                        <div class="mb-2">
                                <p class="mb-1 p-0">Overall Satisfaction</p>
                                <div class="row d-flex align-items-center w-100 mb-2">
                                    <div class="col-lg-9">
                                        <div class="progress w-100">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="m-0 p-0">Excellent</span>
                                    </div>
                                </div> 
                        </div>
                        {{-- 2 --}}
                        <div class="mb-2">
                                <p class="mb-1 p-0">Location & Accessibility</p>
                                <div class="row d-flex align-items-center w-100 mb-2">
                                    <div class="col-lg-9">
                                        <div class="progress w-100">
                                            <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">90%</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="m-0 p-0">Very good</span>
                                    </div>
                                </div> 
                        </div>
                        {{-- 3 --}}
                        <div class="mb-2">
                                <p class="mb-1 p-0">Amenities & Facilities</p>
                                <div class="row d-flex align-items-center w-100 mb-2">
                                    <div class="col-lg-9">
                                        <div class="progress w-100">
                                            <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60%</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="m-0 p-0">Average</span>
                                    </div>
                                </div> 
                        </div>
                        {{-- 4 --}}
                        <div class="mb-2">
                                <p class="mb-1 p-0">Apartment/Condo Unit Design & Quality</p>
                                <div class="row d-flex align-items-center w-100 mb-2">
                                    <div class="col-lg-9">
                                        <div class="progress w-100">
                                            <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60%</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="m-0 p-0">Average</span>
                                    </div>
                                </div> 
                        </div>
                        {{-- 5 --}}
                        <div>
                            <p class="mb-1 p-0">Safety & Security</p>
                            <div class="row d-flex align-items-center w-100">
                                    <div class="col-lg-9">
                                        <div class="progress w-100">
                                            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">80%</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="m-0 p-0">Very good</span>
                                    </div>
                            </div> 
                        </div>
                    </div>  
                </div>
                <div class="col-lg-8 ps-lg-4">
                    <div class="reviewed_sec">
                            {{-- Review One Start--}}
                            <div>
                                <div class="reviewed_info d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://perfectliving.in/storage/app/public/elevation_pictures/xfIdH60bcMmsJoO9LqrSSSJMZwGrnGBaU25sB8eV.jpg" alt="img" class="img-fluid">
                                        <div>
                                            <h5 class="m-0 p-0">Suneel G</h5>
                                            <p class="m-0 p-0">Telangana</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <a href="#" class="text-decoration-none like-button gap-2">
                                            <i class="fa-regular fa-thumbs-up"></i> <span class="like-count">100</span>
                                        </a>
                                        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-flag"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="reviewed_content">
                                    <div class="d-flex justify-content-start mb-2">
                                        <div id="star-rating2" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>                                        
                                    </div>
                                    <p class="m-0 p-0">Nov 2023.</p>
                                <div class="remarkable_text">
                                        <p>Superb ambience, well trained staff extremely beautifully kept premises. Only flaw is it's very hot in general areas. Enclosed galleria has air conditioning but no air flow in general areas atleast some stand fans should have been provided making lounging more enjoyable.</p>
                                        <p>Superb ambience, well trained staff extremely beautifully kept premises. Only flaw is it's very hot in general areas. Enclosed galleria has air conditioning but no air flow in general areas atleast some stand fans should have been provided making lounging more enjoyable.</p>
                                </div>
                                    
                                </div>
                            </div>
                            {{-- Review One End--}}
                            {{-- <hr> --}}
                            {{-- <div>
                                <div class="reviewed_info d-flex align-items-center justify-content-between mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://perfectliving.in/storage/app/public/elevation_pictures/xfIdH60bcMmsJoO9LqrSSSJMZwGrnGBaU25sB8eV.jpg" alt="img" class="img-fluid">
                                        <div>
                                            <h5 class="m-0 p-0">Luxe Travel Management</h5>
                                            <p class="m-0 p-0">New Delhi, India. 804 contributions</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <a href="#" class="text-decoration-none"><i class="fa-regular fa-thumbs-up"></i> <span>1000</span></a>
                                        <a href="#" class="text-decoration-none"><i class="fa-solid fa-ellipsis"></i></a>
                                    </div>
                                </div>
                                <div class="reviewed_content">
                                    <div class="d-flex justify-content-start mb-2">
                                        <div id="star-rating2" class="star-rating">
                                            <i class="fa fa-star" data-value="1"></i>
                                            <i class="fa fa-star" data-value="2"></i>
                                            <i class="fa fa-star" data-value="3"></i>
                                            <i class="fa fa-star" data-value="4"></i>
                                            <i class="fa fa-star" data-value="5"></i>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold">Very busy and full of people trying to sell you stuff :(</h6>
                                    <p class="m-0 p-0">Nov 2023.</p>
                                    <p>Baga Beach, located in Goa, India, is a vibrant destination known for its lively atmosphere and picturesque scenery. The beach offers a mix of relaxation and adventure, making it a popular spot for both tourists and locals.</p>
                                    <p>Baga Beach, located in Goa, India, is a vibrant destination known for its lively atmosphere and picturesque scenery. The beach offers a mix of relaxation and adventure, making it a popular spot for both tourists and locals.</p>
                                    <div class="small_text mt-3">
                                        <p class="m-0 p-0">Written 19 October 2024</p>
                                        <span class="m-0 p-0">This review is the subjective opinion of a Tripadvisor member and not of Tripadvisor LLC. Tripadvisor performs checks on reviews as part of our industry-leading trust & safety standards. Read our transparency report to learn more.</span>
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Report Form</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Coming Soon
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

@endsection

@push('styles')
<!-- Add FontAwesome or a similar icon library for the stars -->

<!-- Custom styles for the star rating -->
<style>
    #star-rating2 {
        direction: ltr;
    }
    #star-rating2 .fa-star {
        color: #ccc; 
        font-size: 24px;
        cursor: pointer;
    }
    #star-rating2 .fa-star[data-value="1"],
    #star-rating2 .fa-star[data-value="2"],
    #star-rating2 .fa-star[data-value="3"],
    #star-rating2 .fa-star[data-value="4"],
    #star-rating2 .fa-star[data-value="5"] {
        color: #f5c518; 
    }
    #star-rating2 .fa-star[data-value="4"] ~ .fa-star {
        color: #ccc; 
    }
    .reviewed_progress p{
        font-size: 16px;
    }
    .reviewed_progress .progress-bar{
        /* background-color: #f5c518; */
        background-color: #f5c518;
    }
    @media (max-width:425px){
        .reviewed_sec {
            margin-top:20px;
        }
    }
    .left_part p{
        font-size: 14px;
    }
    .left_part span{
        font-size: 13px;
    }
    .left_part .progress-bar{
        background-color: #e40048;
    }
    .search_main{
        position: relative;
    }
    .search_main i{
        position: absolute;
        left: 20px;
        top: 12px;
    }
    .reviewed_filter .form-control{
        border-radius: 35px;
        padding: 8px 20px 8px 50px;
        box-shadow: none !important;
        border: 1px solid #909090;
    }
    .filter_buttons .btn_filter{
        background-color: #ebebeb;
        border-radius: 35px;
        padding: 4px 20px 4px 20px;
    }
    .filter_buttons .btn-outline-dark{
        /* background-color: #ebebeb; */
        border-radius: 35px;
        padding: 4px 20px 4px 20px;
    }
    .filter_buttons .btn-outline-dark:hover{
        background-color: #e40048;
        border-color: #e40048
    }
    .reviewed_info img{
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
    }
    
    .reviewed_info a i{
        font-size: 16px;
        color: #5b5b5b;
        transition: 0.3s; 
    }
    .reviewed_info a i:hover{
        color: #000000;
    }
    .reviewed_info a span{
        font-size: 16px;
        color: #909090;
    }
    .reviewed_content .small_text p{
        font-size: 13px;
    }
    .reviewed_content .small_text span{
        font-size: 12px;
        line-height: 10px;
    }
    .remarkable_text{
        min-height: 100%;
        height: 150px;
        overflow-y: scroll;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const likeButton = document.querySelector(".like-button");
        const likeIcon = likeButton.querySelector("i");
        const likeCount = likeButton.querySelector(".like-count");

        let liked = false;
        let count = parseInt(likeCount.textContent);

        likeButton.addEventListener("click", function (event) {
            event.preventDefault();

            liked = !liked;

            if (liked) {
                likeIcon.classList.replace("fa-regular", "fa-solid");
                likeButton.classList.add("liked");
                count++;
            } else {
                likeIcon.classList.replace("fa-solid", "fa-regular");
                likeButton.classList.remove("liked");
                count--;
            }

            likeCount.textContent = count;
        });
    });
</script>
@endpush