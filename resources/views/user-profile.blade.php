@extends('layouts.layout')

@section('content')
<section class="content-header panel">

  <h1>Employees
            <small>employees</small>
        </h1>
</section>

<section class="content">


        <div class="row">
                    <div class="col-md-3">

                        <div class="profile-img">
                            <img src="http://127.0.0.1:8000/img/user2-160x160.jpg" alt="profile image"/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="profile-head">
                                    <h2>
                                        Richard Odigiri
                                    </h2>
                                    <h4>
                                        Web Developer and Designer
                                    </h4>
                                
                                 <p class="proile-rating">EVALUATION : <span>75%</span></p>
                                    <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                    <span class="sr-only">75% Complete</span>
                                    </div>
                                    </div>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                    <a class="nav-link active" id="basic-info-tab" data-toggle="tab" href="#basic-info" role="tab" aria-controls="basic-info" aria-selected="true">Basic Information</a>
                                    </li>

                                    <li class="nav-item">
                                    <a class="nav-link " id="education-info-tab" data-toggle="tab" href="#education-info" role="tab" aria-controls="education-info" aria-selected="false">Education </a>
                                    </li>

                                    <li class="nav-item">
                                    <a class="nav-link " id="certification-info-tab" data-toggle="tab" href="#certification-info" role="tab" aria-controls="certification-info" aria-selected="false">Certifications</a>
                                    </li>

                                    <li class="nav-item">
                                    <a class="nav-link " id="skills-info-tab" data-toggle="tab" href="#skills-info" role="tab" aria-controls="skills-info" aria-selected="false">Skills</a>
                                    </li>

                            </ul>
                        </div>
                    </div>
        </div>

        <div class="row">
               
                    <div class="col-md-12">
                        <div class="tab-content basic-tab" id="myTabContent">
                            
                            <div class="tab-pane fade in active" id="basic-info" role="tabpanel" aria-labelledby="personal-info-tab">

                                <div class="panel panel-default card-body">
                                        <div class="panel-heading">Personal Information</div>

                                        <div class="panel-body">
                                        <div class="col-md-4"> 
                                            <label class="control-label ">Employee Number</label>
                                            <label class="control-label viewLabel">Employee Number</label> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label ">National Identity Number</label>
                                            <label class="control-label viewLabel">National Identity Number</label>  
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label ">Gender</label>
                                            <label class="control-label viewLabel">Gender</label>  
                                             
                                        </div>

                                        <div class="col-md-4"> 
                                            <label class="control-label ">Marital Status</label>
                                            <label class="control-label viewLabel">Marital Status</label> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label ">Date of Birth</label>
                                            <label class="control-label viewLabel">Date of Birth</label>  
                                        </div>

                                        </div>
                                </div>

                                <div class="panel panel-default">
                                        <div class="panel-heading">Contact Information</div>
                                        <div class="panel-body">
                                            <div class="col-md-4"> 
                                                <label class="control-label ">Country</label>
                                                <label class="control-label viewLabel">Country</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">State</label>
                                                <label class="control-label viewLabel">State</label>  
                                            </div>

                                            <div class="col-md-4"> 
                                                <label class="control-label ">Address 1</label>
                                                <label class="control-label viewLabel">Address 1</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Address 2</label>
                                                <label class="control-label viewLabel">Address 2</label>  
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Zip Code</label>
                                                <label class="control-label viewLabel">Zip Code</label>  
                                                 
                                            </div>

                                            <div class="col-md-4"> 
                                                <label class="control-label ">Personal Phone</label>
                                                <label class="control-label viewLabel">Personal Phone</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Office Phone</label>
                                                <label class="control-label viewLabel">Office Phone</label>  
                                            </div>

                                            <div class="col-md-4"> 
                                                <label class="control-label ">Private Email</label>
                                                <label class="control-label viewLabel">Private Email</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Office Email</label>
                                                <label class="control-label viewLabel">Office Email</label>  
                                            </div>

                                        </div>
                                </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">Job Information</div>
                                            <div class="panel-body">
                                            <div class="col-md-4"> 
                                                <label class="control-label ">Job Title</label>
                                                <label class="control-label viewLabel">Job Title</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Department</label>
                                                <label class="control-label viewLabel">Department</label>  
                                            </div>
                                            
                                            <div class="col-md-4"> 
                                                <label class="control-label ">Employee ID</label>
                                                <label class="control-label viewLabel">Employee ID</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Employee Status</label>
                                                <label class="control-label viewLabel">Employee Status</label>  
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Employee Supervisor</label>
                                                <label class="control-label viewLabel">Employee Supervisor</label>  
                                                 
                                            </div>

                                            <div class="col-md-4"> 
                                                <label class="control-label ">Pay Grade</label>
                                                <label class="control-label viewLabel">Pay Grade</label> 
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label ">Joined Date</label>
                                                <label class="control-label viewLabel">Joined Date</label>  
                                            </div>

                                        </div>
                                    </div>
                            </div>

                        <div class="tab-pane fade" id="education-info" role="tabpanel" aria-labelledby="education-info-tab">

                                <div class="row">
                                    <div class="col-md-12"> 
                                            <a href="#" class="btn btn-primary btn-sm my-2">
                                            <span class="fa fa-plus-circle mr-2"></span>
                                            Add Education
                                            </a>
                                        <table class="table table-striped">
                                              <thead>
                                                <tr class="table-heading-bg">
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Employee Details</th>
                                                    <th scope="col">Qualification</th>
                                                    <th scope="col">Award Institution/Body</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">End Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>Otto</td>
                                                  <td>Otto</td>
                                                  <td>
                                                  <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="#" role="button" style=" margin-right: 5px; "> </a>

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="#" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="#"></a>
                                                    </div> 
                                                </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>Otto</td>
                                                  <td>Otto</td>
                                                  <td>
                                                  <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="#" role="button" style=" margin-right: 5px; "> </a>

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="#" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="#"></a>
                                                    </div> 
                                                </td>
                                                </tr>
                                              </tbody>
                                            </table> 
                                    </div>
                                    </div>
                                </div>

                        <div class="tab-pane fade" id="certification-info" role="tabpanel" aria-labelledby="certification-info-tab">

                                <div class="row">
                                    <div class="col-md-12">
                                    
                                    <a href="#" class="btn btn-primary btn-sm my-2">
                                            <span class="fa fa-plus-circle mr-2"></span>
                                            Add Certification
                                            </a>
                                        <table class="table table-striped">
                                              <thead>
                                                <tr class="table-heading-bg">
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Employee Details</th>
                                                    <th scope="col">Certification Title</th>
                                                    <th scope="col">Award Institution/Body</th>
                                                    <th scope="col">Awarded On</th>
                                                    <th scope="col">Valid Through</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>Otto</td>
                                                  <td>Otto</td>
                                                  <td>
                                                  <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="#" role="button" style=" margin-right: 5px; "> </a>

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="#" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="#"></a>
                                                    </div> 
                                                </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>Otto</td>
                                                  <td>Otto</td>
                                                  <td>
                                                  <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-cloud-download " href="#" role="button" style=" margin-right: 5px; "> </a>

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="#" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="#"></a>
                                                    </div> 
                                                </td>
                                                </tr>
                                              </tbody>
                                            </table> 

                                    </div>

                                  
                                    </div>
                                </div>

                        <div class="tab-pane fade" id="skills-info" role="tabpanel" aria-labelledby="skills-info-tab">

                                <div class="row">  

                                    <div class="col-md-12">
                                    <a href="#" class="btn btn-primary btn-sm my-2">
                                            <span class="fa fa-plus-circle mr-2"></span>
                                            Add Skills
                                            </a>
                                        <table class="table table-striped">
                                              <thead>
                                                <tr class="table-heading-bg">
                                                    <th scope="col">S/N</th>
                                                    <th scope="col">Employee Details</th>
                                                    <th scope="col">Skill Title</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>
                                                  <div class="btn-group">
                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="#" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="#"></a>
                                                    </div> 
                                                </td>
                                                </tr>
                                                <tr>
                                                  <th scope="row">1</th>
                                                  <td>Mark</td>
                                                  <td>Otto</td>
                                                  <td>@mdo</td>
                                                  <td>
                                                  <div class="btn-group">

                                                         <a class="edit-btn btn btn-info btn-sm fa fa-edit" href="#" role="button" style=" margin-right: 5px; "> </a>

                                                        <a class="delete-btn btn btn-danger btn-sm fa fa-trash" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-certId="#"></a>
                                                    </div> 
                                                </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                    </div>

                                    
                                    </div>
                                </div>
                        </div>
                    </div>
        </div>


</section>
@endsection

