@extends('layouts.layout')

@section('content')
	<section class="content-header">
		
    </section>

    <section class="content">

<div class="container ">
            <form method="post">
                <div class="row">
                    <div class="col-md-2">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-head">
                                    <h5>
                                        Kshiti Ghelani
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="contact-info-tab" data-toggle="tab" href="#contact-info" role="tab" aria-controls="contact-info" aria-selected="true">Contact Info</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="job-info-tab" data-toggle="tab" href="#job-info" role="tab" aria-controls="job-info" aria-selected="true">Job Details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="education-info-tab" data-toggle="tab" href="#education-info" role="tab" aria-controls="education-info" aria-selected="true">Education Info</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="certification-info-tab" data-toggle="tab" href="#certification-info" role="tab" aria-controls="certification-info" aria-selected="true">Certifications</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " id="skills-info-tab" data-toggle="tab" href="#skills-info" role="tab" aria-controls="skills-info" aria-selected="true">Skills</a>
                                </li>

                            </ul>

                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>

                            <div class="tab-pane fade" id="contact-info" role="tabpanel" aria-labelledby="contact-info-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Professiond</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>

                            <div class="tab-pane fade" id="job-info" role="tabpanel" aria-labelledby="job-info-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Professiond</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>

                            <div class="tab-pane fade" id="education-info" role="tabpanel" aria-labelledby="education-info-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Professiond</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>

                            <div class="tab-pane fade" id="certification-info" role="tabpanel" aria-labelledby="certification-info-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Professiond</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>

                            <div class="tab-pane fade" id="skills-info" role="tabpanel" aria-labelledby="skills-info-tab">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Professiond</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>           
        </div>



    </section>
@endsection



<!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

</div>
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

</div> -->