@extends('dashboard.layouts.master')
@section('title', 'Brands')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Brands</h5>
                    <a href="{{ route('brands.create') }}" class="btn btn-primary btn-sm">
                        <i class="ti ti-plus me-1"></i> Add Brand
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration + ($brands->currentPage() - 1) * $brands->perPage() }}</td>
                                        <td>
                                            @if ($brand->image)
                                                <img src="{{ $brand->image->url }}"
                                                    alt="{{ $brand->alt_text ?: $brand->brand_name }}"
                                                    style="width: 40px; height: 40px; object-fit: contain;"
                                                    class="border rounded bg-white">
                                            @else
                                                <span class="text-muted small">No logo</span>
                                            @endif
                                        </td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>
                                            <span
                                                class="badge bg-label-{{ $brand->status === 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($brand->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $brand->created_at?->format('Y-m-d') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('brands.show', $brand) }}" class="btn btn-sm btn-outline-info">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this brand?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No brands added yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection