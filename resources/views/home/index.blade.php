@extends('layouts.master')

@section('content')
    <main>
        <!--=============================
            SLIDER START
        ==============================-->
        @include('home.components.slider')
        <!--=============================
            SLIDER END
        ==============================-->

        <!--=============================
            Explore Categories START
        ==============================-->
        @include('home.components.explore_categories')
        <!--=============================
            Explore Categories END
        ==============================-->

        <!--=============================
            ALL LEARNING SECTIONS START
        ==============================-->
        @include('home.components.all_learning_sections')
        <!--=============================
            ALL LEARNING SECTIONS END
        ==============================-->
    </main>
@endsection
