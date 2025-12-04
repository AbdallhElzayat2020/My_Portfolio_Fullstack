@extends('dashboard.layouts.master')
@section('title', 'Project Details')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Project Details</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Short Title</dt>
                        <dd class="col-sm-8">{{ $project->short_title }}</dd>

                        <hr>
                        <dt class="col-sm-4">Full Title</dt>
                        <dd class="col-sm-8">{{ $project->full_title }}</dd>

                        <hr>
                        <dt class="col-sm-4">Category</dt>
                        <dd class="col-sm-8">{{ $project->category->name ?? '-' }}</dd>

                        <hr>
                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-label-{{ $project->status === 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </dd>

                        <hr>
                        <dt class="col-sm-4">In Home</dt>
                        <dd class="col-sm-8">
                            {{ $project->in_home ? 'Yes' : 'No' }}
                        </dd>

                        <hr>
                        <dt class="col-sm-4">Featured</dt>
                        <dd class="col-sm-8">
                            {{ $project->is_featured ? 'Yes' : 'No' }}
                        </dd>

                        <hr>
                        <dt class="col-sm-4">Short Description</dt>
                        <dd class="col-sm-8">{!! $project->short_desc !!}</dd>

                        <hr>
                        <dt class="col-sm-4">Full Description</dt>
                        <dd class="col-sm-8">{!! $project->full_desc !!}</dd>

                        <hr>
                        <dt class="col-sm-4">Link</dt>
                        <dd class="col-sm-8">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
                            @else
                                -
                            @endif
                        </dd>
                    </dl>

                    @if ($project->image && $project->image->count())
                        <hr>
                        <p class="mb-1">Images:</p>
                        @foreach ($project->image as $img)
                            <img src="{{ $img->url }}" alt="{{ $project->short_title }}"
                                style="max-width: 90px; max-height: 90px; object-fit: cover;" class="border rounded me-1 mb-1">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
