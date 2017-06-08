@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Properties</div>

                    <div class="panel-body">
                        @forelse($properties as $property)
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($property->image_path) }}" alt="Some Image" class="img-rounded img-responsive" height="50" width="100">
                                </div>
                                <div class="col-md-8">
                                    <p>Bedrooms: {{ $property->bedrooms }}</p>
                                    <p>Location: {{ $property->location }}</p>
                                    <p>Image URL: {{ Storage::url($property->image_path) }}</p>
                                    <a href="/property/{{ $property->id }}" class="btn btn-link">Add Property Data</a>
                                </div>
                            </div>
                        @empty
                            No Property listed within our servers at this time.
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
