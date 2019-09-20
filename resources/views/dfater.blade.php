{{--
  Template Name: Dfater | دفاتر
--}}

@extends('layouts.app')

@section('content')
    <div class="dfater-list">
      @include('partials.files-big', ['files' => $files])
    </div>
@endsection
