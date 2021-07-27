@extends("adminlayout.adminlayout")
@section("body")
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>


tinymce.init({
  selector: 'textarea#default'
});


  </script>

  <!-- MAIN CONTENT-->
  <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div style="margin-bottom: 15px">
                <h1>BASIC SITE SETTINGS</h1>
            </div>
            {{-- companyabout --}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">About company</div>
                        <div class="card-body">

                            <form action="{{ route("savecompanyabout") }}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">About us Title</label>
                                    <input id="about" name="about_title" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ isset($companyDetail) ? $companyDetail->aboutTitle: 'Enter site Title here'}}">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Write Company description Below</label>
                                    <textarea id="default" name="about_text"  cols="15" value="" rows="13">
                                        {{ isset($companydetails) ? $companydetails->aboutText: 'write brief description about the company'}}
                                    </textarea>

                                    {{-- <textarea style="background-color: rgb(137, 204, 243)" name="" id="" cols="40" rows="30"></textarea> --}}
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>


                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-pen fa-lg"></i>&nbsp;
                                       <span>Update About Us</span>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Companydetails --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Company</strong>
                            <small> Details</small>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route("savecompanydetails") }}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Company name</label>
                                <input type="text" value="{{ isset($companyDetail) ? $companyDetail->companyName: 'Name of the company'}}" rows="13" id="company" placeholder="Enter your company name" name="companyname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Running days</label>
                                <input type="text" value="{{ isset($companyDetail) ? $companyDetail->runningDays: 'Number of days'}}" id="company" placeholder="Running days" name="runningdays" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vat" class=" form-control-label">Company Email</label>
                                <input type="text" id="vat" value="{{ isset($companyDetail) ? $companyDetail->companyEmail: 'Company email'}}" placeholder="Company Email" name="companyemail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="street" class=" form-control-label">Company location</label>
                                <input type="text" id="street" value="{{ isset($companyDetail) ? $companyDetail->companyLocation: 'Company location'}}" placeholder="Company location" name="companylocation" class="form-control">
                            </div>
                            <div class="row form-group">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="city" class=" form-control-label">Company phone</label>
                                        <input type="text" id="city" value="{{ isset($companyDetail) ? $companyDetail->companyPhone: 'Company Phone'}}" placeholder="Phone" name="companycontact" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-pen fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Update company details</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>ADD NEW FAQS</strong>
                        </div>
                        <form action="{{ route("savecompanyfaq") }}" method="post" class="form-horizontal">
                        <div class="card-body card-block">

                                @csrf

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Question</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="question" placeholder="EnterQuestion" required class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Answer</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email-input" name="answer" placeholder="Enter Answer" required class="form-control">

                                    </div>
                                </div>


                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Create
                            </button>

                        </div>
                    </form>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>FAQ 1</strong>
                        </div>
                        <div class="card-body card-block">
                            <form action="" method="post"  class="form-horizontal">
                                {{-- <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Static</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static">Username</p>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-xs-12">
                                        <h5>Question</h5>
                                        <textarea name="question" id="" cols="20" rows="10">

                                        </textarea>
                                    </div>

                                    <div class="col-xs-12">
                                        <h5>Answer</h5>
                                        <textarea name="answer" id="" cols="20" rows="10">

                                        </textarea>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Edit
                            </button>
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Delete
                            </button>
                        </div>
                    </div>


                </div>

        </div>
    </div>
</div>
  </div>

@endsection
