@extends('layouts.vacancy')

@section('title')
    <title>edit</title>
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

                        <h2><i class="sl sl-icon-plus"></i> Edit Listing</h2>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Edit Listing</li>
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
					<form action="/vacancies/{{$vacancy->slug}}" method="post">
					
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    
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
                                    <input name="title" class="search-field" type="text" value="{{old('title')?old('title'):$vacancy->title}}" />
								</div>
                            </div>

                            
                            <div class="row with-forms">

							<!-- Status -->
							<div class="col-md-12">
								<h5>Tags</h5>
						
						    <select required id="tags" class="chosen-select-no-single" multiple="multiple" name="tags[]">
                            
                                @foreach($tags as $tag)
                                <option
                                    @foreach($vacancy->tags as $real_tag)
                                    
                                    {{ ($real_tag->id == $tag->id) ? 'selected="selected"' : '' }}
                                    
                                    @endforeach
                                    
                                    value="{{ $tag->id }}">{{ $tag->name }}
                                </option>

                                @endforeach
                            
                            </select>

                            </div>
                            <!-- Row / End -->

                            <!-- Description -->
                            <div class="form col-md-12">
                                <h5>Description <i class="tip" data-tip-content="About your vacancy"></i></h5>
                                <textarea class="WYSIWYG" name="description" cols="40" rows="10" id="summary"
                                    spellcheck="true" >{{old('description')?old('description'):$vacancy->description}}</textarea>			
                            </div>

                        </div>
                        <!-- Row / End -->

                    	</div>
                    	<!-- Section / End -->

                    <button id="submit" type="submit" class="submit button preview margin-bottom-30">Update Data <i
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
        
        CKEDITOR.replace( 'description',{
            filebrowserUploadUrl: "",
            filebrowserUploadMethod: 'form'
        } );

    </script>

@endsection

@section('scripts')
    <script type="text/javascript" src={{asset("js.select2.min.js")}}>    
        // $('.chosen-select-no-single').select2();
        $('.chosen-select-no-single').select2().val({!! json_encode($vacancy->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection
