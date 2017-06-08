@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Property Create</div>

                    <div class="panel-body">
                        <form action="/property" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <legend>Add new Property</legend>
                            <div class="form-group ">
                                <label for="" class="control-label col-sm-3 col-md-3">Location</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" for="" name="location" value="{{ old('location') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-sm-3 col-md-3">No of Bedrooms</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="number" for="" name="bedrooms" value="{{ old('bedrooms') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-md-9 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="published" id="published" value="1" {{ old('published') == 1 ? 'checked' : '' }}> Published
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-sm-3 col-md-3">Image</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="file" for="" name="image" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-offset-3 col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">Save Property</button>
                                    {{ csrf_field() }}
                                </div>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <ul>
                                            <li>{{ $error }}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
