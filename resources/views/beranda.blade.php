@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Dashboard</h1>
    <p>This is the main page of your website where you can add an overview or important updates.</p>
    <div class="stats">
        <div class="stat-card">
            <h3>Total Inventaris</h3>
            <p>{{ $totalInventaris }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Bom</h3>
            <p>{{ $totalBom }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Ikan</h3>
            <p>{{ $totalIkan }}</p>
        </div>
    </div>
</div>
@endsection
