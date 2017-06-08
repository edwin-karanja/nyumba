@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Property Images</div>

                            <div class="panel-body">
                                <div class="row">
                                    @forelse($property->getMedia() as $media)
                                        <div class="col-md-3">
                                            <div class="img-rounded">
                                                <a href="{{ $media->getUrl() }}" target="_blank">
                                                    <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="img-rounded thumbnail pull-left" width="150" height="150">
                                                </a>
                                            </div>
                                            <code>
                                                Size: {{ $media->human_readable_size }}
                                            </code>
                                        </div>
                                    @empty
                                        <p style="padding-left: 10px">No Media associated with this property</p>
                                    @endforelse
                                </div>
                            </div>

                            @if($property->hasMedia())
                                <div class="panel-footer">
                                    <form action="/property/{{ $property->id }}/media/delete" method="post">
                                        {{ csrf_field() }} {{ method_field('delete') }}
                                        <button class="btn btn-xs btn-danger" type="submit">Delete All</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Upload More Images</div>

                            <div class="panel-body">
                                <form action="/property/{{ $property->id }}/media/store" id="propImages" class="dropzone" id="my-awesome-dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Property Metadata
                                <a href="/property/{{ $property->id }}/edit" class="btn btn-xs btn-success pull-right">Edit Property</a>
                            </div>

                            <div class="panel-body">
                                <div class="pull-right">
                                    <p>Main Property Image</p>
                                    <img src="{{ Storage::url($property->image_path) }}" class="img-rounded thumbnail pull-right" width="150" height="150">
                                </div>

                                <div class="well well-sm col-md-6">
                                    <p>Location: {{ $property->location }}</p>
                                    <p>Bedrooms: {{ $property->bedrooms }}</p>
                                    <p>Price: {{ number_format($property->price, 2) }}</p>
                                    <p>Ownership: {{ $property->ownership }}</p>
                                    <p>Type: {{ $property->type_id }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Extra Property fields</div>
                            <div class="panel-body">
                                <form action="" class="">
                                    <div class="form-group">
                                        <label for="" class="control-label">Ensuite Bedrooms</label>
                                        <input type="text" name="ensuite_number" class="form-control" value="{{ old('ensuite_number') }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Land Area</label>
                                                <input type="text" name="land_area" class="form-control" value="{{ old('land_area') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Building Area</label>
                                                <input type="text" name="building_area" class="form-control" value="{{ old('building_area') }}">
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <example></example>
    </div>
@endsection
@section('page-scripts')
    <script>
        Dropzone.options.propImages = {
            parallelUploads: 2,
            acceptedFiles: 'image/*',
            maxFiles: 10,
            init: function init() {
                this.on("queuecomplete", function (file) {
                    location.reload();
                });
            }
        }
    </script>
@endsection