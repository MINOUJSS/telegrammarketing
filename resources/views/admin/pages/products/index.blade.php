@extends('admin.layouts.app')
@section('header')
@include('admin.inc.header.index')
@endsection
@section('side-bar')
@include('admin.inc.side-bar.index')
@endsection
@section('content-wrapper')
@include('admin.inc.contents.products.index')
@endsection
@section('main-footer')
@include('admin.inc.footer.index')
@endsection
@section('control-sidebar')
@include('admin.inc.control-sidebar.index')
@endsection