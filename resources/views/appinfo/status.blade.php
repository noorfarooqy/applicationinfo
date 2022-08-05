@extends('appinfo::appinfo.appinfo_layout')

@section('content')
<div class="side-app" id="AppInfoForm">
    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Application information</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Application information</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Update application information
            </div>
            <app-info-form></app-info-form>
        </div>
       <app-logo-form></app-logo-form>
    </div>
</div>
@endsection


@section('scripts')
    @vite(['resources/js/status.js'])
@endsection