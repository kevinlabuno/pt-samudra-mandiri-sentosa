@extends('layouts.app')
<style>
    .profile-container {
        max-width: 600px;
        margin: auto;
        background: linear-gradient(135deg, #153B5F, #1C496E);
        color: #fff;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out;
    }

    .profile-container:hover {
        transform: translateY(-5px);
    }

    .profile-header h2 {
        font-size: 1.8rem;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .profile-header p {
        font-size: 0.9rem;
        opacity: 0.85;
        margin: 0;
    }

    .form-group label {
        display: block;
        font-size: 0.95rem;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group p {
        font-size: 0.9rem;
        margin: 0;
        background: rgba(255, 255, 255, 0.1);
        padding: 10px;
        border-radius: 5px;
    }

    .btn-light {
        background-color: #fff;
        color: #153B5F;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        background-color: #f4f4f9;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 10px;
        overflow: hidden;
    }

    .modal-header {
        background-color: #153B5F;
        color: #fff;
        border-bottom: none;
    }

    .modal-title {
        font-weight: bold;
    }

    .btn-close-white {
        filter: invert(100%);
    }

    .modal-body .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .modal-footer .btn {
        padding: 8px 20px;
        border-radius: 5px;
    }

    .modal-footer .btn-secondary {
        background-color: #ddd;
        color: #333;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #ccc;
    }

    .modal-footer .btn-primary {
        background-color: #153B5F;
        color: #fff;
        border: none;
    }

    .modal-footer .btn-primary:hover {
        background-color: #1C496E;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        .profile-container {
            padding: 20px;
        }

        .btn-light {
            padding: 8px 20px;
            font-size: 0.9rem;
        }

        .profile-header h2 {
            font-size: 1.5rem;
        }
    }
</style>

@section('content')
<div class="container">
    <!-- Profile Container -->
    <div class="profile-container" style="max-width: 600px; margin: auto; background: #fff; color: #153B5F; border-radius: 10px; padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="profile-header text-center mb-4">
            <h2>Profile Pengguna</h2>
            <p style="opacity: 0.8;">Berikut data diri pengguna anda.</p>
        </div>
        <div class="profile-details">
            <div class="form-group mb-3">
                <label for="name" style="font-weight: bold;">Name</label>
                <p id="name">{{ $user->name }}</p>
            </div>
            <div class="form-group mb-3">
                <label for="email" style="font-weight: bold;">Email</label>
                <p id="email">{{ $user->email }}</p>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-light" style="color: #153B5F; font-weight: bold; padding: 10px 20px; border-radius: 5px;" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                Edit Profile
            </button>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header" style="background-color: #153B5F; color: #fff;">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name" style="font-weight: bold;">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" style="font-weight: bold;">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #153B5F; border-color: #153B5F;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
