@extends('admin.layouts.main')

@section('title')
  <title>Home</title>
@endsection

@section('content')

  <x-alert :$user />

  <h1>Halaman Admin</h1>

@endsection
