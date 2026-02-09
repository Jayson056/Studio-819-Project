@extends('layouts.admin_glass')

@section('title', 'Customers')

@section('content')
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="page-title mb-0">Customers</h1>
    </header>

    <div class="glass-card p-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th width="100">ID</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th width="150" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $c)
                <tr>
                    <td class="text-secondary">#{{ $c->customer_id }}</td>
                    <td class="fw-bold text-white">{{ $c->first_name }} {{ $c->last_name }}</td>
                    <td class="text-secondary">{{ $c->email }}</td>
                    <td class="text-secondary">{{ $c->phone_number }}</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-link text-success me-2" 
                                onclick="openEditModal('{{ $c->customer_id }}', '{{ $c->first_name }}', '{{ $c->last_name }}', '{{ $c->email }}', '{{ $c->phone_number }}')">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <form action="{{ route('admin.customer.delete', $c->customer_id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Edit Customer Modal --}}
    <div class="modal fade" id="customerModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.customer.update') }}" method="POST" class="w-100">
                @csrf @method('PUT')
                <div class="modal-content glass-card p-2">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-white fw-bold">Edit Customer</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" id="editCustomerId">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-secondary small text-uppercase fw-bold">First Name</label>
                                <input type="text" name="first_name" id="editFirstName" class="glass-input form-control" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label text-secondary small text-uppercase fw-bold">Last Name</label>
                                <input type="text" name="last_name" id="editLastName" class="glass-input form-control" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-secondary small text-uppercase fw-bold">Email Address</label>
                            <input type="email" name="email" id="editEmail" class="glass-input form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label text-secondary small text-uppercase fw-bold">Phone Number</label>
                            <input type="text" name="phone_number" id="editPhone" class="glass-input form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-link text-secondary text-decoration-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4">Update Customer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const customerModal = new bootstrap.Modal(document.getElementById('customerModal'));

    function openEditModal(id, first, last, email, phone) {
        document.getElementById('editCustomerId').value = id;
        document.getElementById('editFirstName').value = first;
        document.getElementById('editLastName').value = last;
        document.getElementById('editEmail').value = email;
        document.getElementById('editPhone').value = phone;
        customerModal.show();
    }
</script>
@endsection