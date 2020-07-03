@extends('layouts.vacancy')

@section('title')
    <title>Tambah Lowongan</title>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" id="colors">
@endsection

@section('content')
        <!-- Content================================================== -->
        <!-- Titlebar
        ================================================== -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2><i class="sl sl-icon-plus"></i> Add Listing</h2>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Add Listing</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>

        <!-- Container -->
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <form action="/vacancies" method="post">
                    {{ csrf_field() }}
                    <div id="add-listing" class="separated-form">

                        <!-- Section -->
                        <div class="add-listing-section">

                            <!-- Headline -->
                            <div class="add-listing-headline">
                                <h3><i class="sl sl-icon-doc"></i> Basic Informations</h3>
                            </div>

                            <!-- Title -->
                            <div class="row with-forms">
                                <div class="col-md-12">
                                    <h5>Listing Title <i class="tip" data-tip-content="Title of your vacancy"></i></h5>
                                    <input name="title" class="search-field" type="text" value="{{old('title')}}" />
                                </div>
                            </div>

                            <div class="row with-forms">

							<!-- Status -->
							<div class="col-md-12">
								<h5>Tags</h5>
								<select class="chosen-select-no-single " name="tags[]" multiple="multiple">
                                    @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
							</div>

                            </div>
                            <!-- Row / End -->

                            <!-- Description -->
                            <div class="form">
                                <h5>Description <i class="tip" data-tip-content="About your vacancy"></i></h5>
                                <textarea class="WYSIWYG" name="description" id=" cols="40" rows="10" id="id="my-editor"
                                    spellcheck="true" >{{old('description')}}</textarea>			
                            </div>

                        </div>
                        <!-- Row / End -->

                        </div>
                        <!-- Section / End -->

                    <button id="submit" type="submit" class="submit button preview margin-bottom-30">Add Data <i
                            class="fa fa-arrow-circle-right"></i></button>
                </div>
                </form>
            </div>

        </div>

    </div>
    <!-- Content / End -->
    <!-- Container / End -->

    <script src={{asset("ckeditor/ckeditor.js")}}></script>
    <script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    </script>
    <script>
        
        CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('vacancy.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
        
    </script>

@endsection

@section('scripts')
    <script type="text/javascript" src={{asset("js.select2.min.js")}}></script> 
    <script>
        $(document).ready(function() {
        $('.chosen-select-no-single').select2();
        });
    </script>
@endsection