@extends('layouts.app')
@section('content')
<h1 class="mb-4">Settings for {{ $client->client_name }}</h1>
<div class="lead_adds_sec">
    <div class="row">
        <div class="col-lg-3">
             <x-project-side-menu :client="$client" />
        </div>
        <div class="col-lg-9">
            <div class="lead_adds_main_wrapper py-5 px-4">
                <h2 class="mb-3">A2AHome Land Lead Notifications</h2>
                <p class="mb-4">Send lead notification emails and first response emails through your mail server. Enter the details below to setup your own mail server.</p>
                <div class="mb-4">   
                    <div class="mb-2">
                        <p class="fw-bold">Lead Notifications</p>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="yes" onclick="toggleForm(true)">
                        <label class="form-check-label" for="yes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="no" onclick="toggleForm(false)" checked>
                        <label class="form-check-label" for="no">
                            No
                        </label>
                    </div>
                </div>
                <form id="notificationForm" style="display: none;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <strong>Example:</strong><br>
                                <small>yourname:yourname@company.com, <br> anothername:anothername@company.com</small>
                                <input type="text" name="notification_email" id="notification_email" class="form-control" placeholder="Lead Notification">
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label" for="cc_emails">CC</label><br>
                                <strong>Example:</strong><br>
                                <small>yourname:yourname@company.com , anothername:anothername@company.com</small>
                                <input type="text" name="cc_emails" id="cc_emails" class="form-control" placeholder="CC Emails">
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label" for="bcc_emails">BCC</label><br>
                                <strong>Example:</strong><br>
                                <small>yourname:yourname@company.com , anothername:anothername@company.com</small>
                                <input type="text" name="bcc_emails" id="bcc_emails" class="form-control" placeholder="BCC Emails">
                            </div>
                            <div>
                                <button id="send" type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        function toggleForm(isVisible) {
            const form = document.getElementById('notificationForm');
            form.style.display = isVisible ? 'block' : 'none';
        }
    </script>
    

@endsection
