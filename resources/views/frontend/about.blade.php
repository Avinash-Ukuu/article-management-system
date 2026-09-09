@extends('frontend.layouts.master')

@section('content')

<div class="container">

    <div class="row">
      <div class="col-lg-12">
            <div class="about-hero text-center mt-2">
                <h1>
                    About Us
                </h1>
                <p>
                    Discover stories, ideas, insights and information
                    that matter.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="about-content">
                <h2>
                    Welcome
                </h2>
                <p>
                    Welcome to our platform, where we bring together
                    informative articles, inspiring stories, useful
                    insights and interesting ideas across different
                    categories.
                </p>
                <p>
                    Our goal is to make quality content easy to discover,
                    understand and share. Whether you are looking for
                    the latest stories, helpful information or simply
                    something interesting to read, we aim to provide
                    content for every kind of reader.
                </p>
                <h2>
                    What We Do
                </h2>
                <p>
                    We publish carefully organized content across
                    multiple categories. Our platform includes articles,
                    blogs, quotes and other informative content created
                    to provide value to our readers.
                </p>
                <h2>
                    Our Mission
                </h2>
                <p>
                    Our mission is simple — to create a reliable,
                    engaging and easy-to-use platform where readers can
                    discover valuable content every day.
                </p>
                <h2>
                    Explore Our Content
                </h2>
                <p>
                    Explore our categories, discover trending stories,
                    search for topics that interest you and find
                    something new to read.
                </p>
                <div class="mt-4 mb-3">
                    <a
                        href="{{ route('categories') }}"
                        class="btn btn-primary"
                    >
                        Explore Categories
                    </a>
                    <a
                        href="{{ route('search') }}"
                        class="btn btn-outline-primary"
                    >
                        Search Articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
