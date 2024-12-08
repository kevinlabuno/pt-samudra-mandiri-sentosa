@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data</h1>
    <p>This is data</p>

    <div class="form-card-container">
        <!-- Title -->
        <h1 class="form-card-title">Responsive Form</h1>

        <!-- Form -->
        <form action="" method="POST">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Dropdown -->
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <!-- Number -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" min="0" required>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label for="bio">Short Bio</label>
                <textarea id="bio" name="bio" rows="4" placeholder="Write a short bio about yourself"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="form-submit-btn">Submit</button>
        </form>
    </div>

    <div class="table-container">
        <div class="table-title">Data Tabel</div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="action-btns">
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-secondary">View</a>
                            <form action="" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
