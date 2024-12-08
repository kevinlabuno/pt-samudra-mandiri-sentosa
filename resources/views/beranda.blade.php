@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Dashboard</h1>
    <p>This is the main page of your website where you can add an overview or important updates.</p>
    <div class="stats">
        <div class="stat-card">
            <h3>Total Users</h3>
            <p>1,234</p>
        </div>
        <div class="stat-card">
            <h3>Active Sessions</h3>
            <p>567</p>
        </div>
        <div class="stat-card">
            <h3>New Messages</h3>
            <p>89</p>
        </div>
    </div>
</div>
@endsection
