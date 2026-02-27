@extends('website.dashboard_master')
@section('title','Dashboard')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="user-dashboard-info-box">
                <div class="mb-2 section-title-02 d-grid">
                    <h4>Basic Information</h4>
                </div>
                <div class="cover-photo-contact">
                    <div class="mb-3 upload-file">
                        <label for="formFile" class="form-label"
                            onclick="window.location.href='{{ url('/change-profile-picture') }}'">Upload Profile Photo</label>
                        <input type="file" class="form-control" id="formFile" style="display:none;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="" action="{{ url('save-astrologer-details', $user->id) }}" method="POST">
        @csrf
        <div class="user-dashboard-info-box">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="mb-3 col-12 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required value="{{ $user->name ?? '' }}" name="name">
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required value="{{ $user->email ?? '' }}" name="email">
                </div>

                <div class="mb-3 col-12 col-md-6">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" required name="dob">
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <label for="mobile" class="form-label">Phone</label>
                    <input type="number" class="form-control" id="mobile" required value="{{ $user->mobile ?? '' }}" name="mobile" disabled>
                </div>

                <div class="mb-3 col-12 col-md-6">
                    <label for="languages" class="form-label">Language</label>
                    <select name="languages[]" id="languages" multiple class="form-control" required>
                        @foreach(explode(',', $userDetails->languages) as $language)
                        <option value="{{ $language ?? '' }}" selected>{{ $language ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <label for="gender" class="form-label">Gender</label>
                    <div class='genderOption'>
                        Male <input type="radio" value="male" name="gender" {{ $user->gender == 'male' ? "checked" : '' }}>
                        Female <input type="radio" value="female" name="gender" {{ $user->gender == 'female' ? "checked" : '' }}>
                        Other <input type="radio" value="other" name="gender" {{ $user->gender == 'other' ? "checked" : '' }}>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6">
                    <label for="expertise" class="form-label">Expertise</label>
                    <select name="expertise[]" id="expertise" multiple class="form-control" required>
                        @foreach(explode(',', $userDetails->expertise) as $expertise)
                        <option value="{{ $expertise ?? '' }}" selected>{{ $expertise ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <label for="experience" class="form-label">Experience</label>
                    <select name="experience" id="experience" class="form-control" required>
                        @for($i=1; $i<=50; $i++)
                        <option value="{{ $i }}"{{ $userDetails->total_experience == $i ? "selected" : '' }}>{{ $i }} Years</option>
                        @endfor
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-block" style="background-color: #ffcd3a;">Save Details</button>


        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#languages").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

        $("#expertise").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
    </script>
    @endsection
