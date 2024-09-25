@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card widget-card border-light shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title widget-card-title mb-4">List of Owners</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless bsb-table-xl text-nowrap align-middle m-0">
                                    <thead class="table-light">
                                        <tr class="text-sm font-monospace">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Upload</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($users->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">No users available.</td>
                                            </tr>
                                        @else
                                            @php $count = 1; @endphp
                                            @foreach($users as $user)
                                                @if($user->role === 'book_owner')
                                                    <tr class="text-sm font-weight-light">
                                                        <th>0{{ $count++ }}</th>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->book()->count() }} books</td>
                                                        <td>{{ $user->location }}</td>
                                                        <td>
                                                            @if($user->is_enabled)
                                                                <span class="text-success">
                                                                    <i class="fas fa-check-circle"></i> Active
                                                                </span>
                                                            @else
                                                                <span class="text-danger">
                                                                    <i class="fas fa-times"></i> Inactive
                                                                </span>
                                                            @endif

                                                            <!-- Toggle Status Button -->
                                                            <form action="{{ route('user.toggle', $user->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-link p-0" title="Toggle Status">
                                                                    @if($user->is_enabled)
                                                                        <i class="fas fa-toggle-on text-success fa-2x"></i>
                                                                    @else
                                                                        <i class="fas fa-toggle-off text-danger fa-2x"></i>
                                                                    @endif
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <!-- View Button -->
                                                            <a href="" class="btn btn-info btn-sm" title="View">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Delete Button -->
                                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                            
                                                            <!-- Approve Books -->
                                                          

                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
