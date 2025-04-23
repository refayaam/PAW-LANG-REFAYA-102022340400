@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Student Profile</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <div class="mb-3">
                <!-- ==================4================== -->
                <!-- Add the picture to public/images, then fill the path -->
                <img src="" alt="Profile Picture" class="img-thumbnail rounded-circle" width="150">
            </div>
            <!-- ==================5================== -->
            <!-- Create a view file that will display student data in a table format. -->
            <!-- Use <tr>, <th>, and <td> tags for rows and columns. -->
            <!-- Use Blade syntax {{ $student->column_name }} to display variable values. -->
        </table>
    </div>
</div>
@endsection
