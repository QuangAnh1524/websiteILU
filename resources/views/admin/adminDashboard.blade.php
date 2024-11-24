@extends('admin.layouts.app')

@section('content')
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                @include('admin.components.admin-statsCard')
            </div>
            <div class="col-12 col-lg-3">
                @include('admin.components.admin-profileCard')
                @include('admin.components.admin-recentMessage')
                @include('admin.components.admin-vistorProfile')
            </div>
        </section>
    </div>
@endsection
