@extends('layouts.admin_glass')

@section('title', 'Packages')

@section('styles')
<style>
    .package-tabs {
        display: flex; gap: 30px; margin-bottom: 30px; border-bottom: 1px solid var(--glass-border);
    }
    .tab-link {
        font-size: 1.1rem; font-weight: 600; color: var(--text-dim); cursor: pointer; padding-bottom: 15px; transition: all 0.3s ease;
    }
    .tab-link.active {
        color: white; border-bottom: 2px solid #a23a43; margin-bottom: -1px;
    }
    .table-section { display: none; }
    .table-section.active { display: block; }
</style>
@endsection

@section('content')
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="page-title mb-0">Packages</h1>
        <button class="btn btn-primary px-4" onclick="openAddModal()">
            <i class="bi bi-plus-lg me-2"></i> <span id="addBtnText">Add Package</span>
        </button>
    </header>

    <div class="package-tabs">
        <div class="tab-link active" onclick="switchTab('packages')">Packages</div>
        <div class="tab-link" onclick="switchTab('backdrops')">Backdrops</div>
        <div class="tab-link" onclick="switchTab('addons')">Add-ons</div>
    </div>

    <div class="glass-card p-4">
        <div id="packagesSection" class="table-section active">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="150">ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th width="150" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $p)
                    <tr>
                        <td class="text-secondary">#{{ $p->package_id }}</td>
                        <td class="fw-bold">{{ $p->package_name }}</td>
                        <td>₱{{ number_format($p->base_price, 2) }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-link text-success me-2" onclick="openEditModal('package', '{{ $p->package_id }}', '{{ $p->package_name }}', '{{ $p->base_price }}')"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.packages.delete', ['type'=>'package', 'id'=>$p->package_id]) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="backdropsSection" class="table-section">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="150">ID</th>
                        <th>Name</th>
                        <th width="150" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($backdrops as $b)
                    <tr>
                        <td class="text-secondary">#{{ $b->backdrop_id }}</td>
                        <td class="fw-bold">{{ $b->backdrop_name }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-link text-success me-2" onclick="openEditModal('backdrop', '{{ $b->backdrop_id }}', '{{ $b->backdrop_name }}', 0)"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.packages.delete', ['type'=>'backdrop', 'id'=>$b->backdrop_id]) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="addonsSection" class="table-section">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="150">ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th width="150" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addons as $a)
                    <tr>
                        <td class="text-secondary">#{{ $a->addon_id }}</td>
                        <td class="fw-bold">{{ $a->addon_name }}</td>
                        <td>₱{{ number_format($a->price, 2) }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-link text-success me-2" onclick="openEditModal('addon', '{{ $a->addon_id }}', '{{ $a->addon_name }}', '{{ $a->price }}')"><i class="bi bi-pencil-square"></i></button>
                            <form action="{{ route('admin.packages.delete', ['type'=>'addon', 'id'=>$a->addon_id]) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="itemModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.packages.store') }}" method="POST" id="modalForm" class="w-100">
                @csrf
                <div id="methodField"></div>
                <div class="modal-content glass-card p-2">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-white fw-bold" id="modalTitle">Add Item</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="itemId">
                        <input type="hidden" name="type" id="itemType">
                        <div class="mb-4">
                            <label class="form-label text-secondary small text-uppercase fw-bold">Name</label>
                            <input type="text" name="name" id="itemName" class="glass-input form-control" required>
                        </div>
                        <div class="mb-2" id="priceInputDiv">
                            <label class="form-label text-secondary small text-uppercase fw-bold">Price</label>
                            <input type="number" step="0.01" name="price" id="itemPrice" class="glass-input form-control">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-link text-secondary text-decoration-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    let currentTab = 'packages';
    const itemModal = new bootstrap.Modal(document.getElementById('itemModal'));

    function switchTab(tab) {
        currentTab = tab;
        document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
        event.target.classList.add('active');
        document.querySelectorAll('.table-section').forEach(s => s.classList.remove('active'));
        document.getElementById(tab + 'Section').classList.add('active');
        document.getElementById('addBtnText').textContent = "Add " + tab.charAt(0).toUpperCase() + tab.slice(1, -1).replace('-', ' ');
    }

    function openAddModal() {
        document.getElementById('modalTitle').textContent = "Add " + currentTab.replace('-', ' ');
        document.getElementById('modalForm').action = "{{ route('admin.packages.store') }}";
        document.getElementById('methodField').innerHTML = "";
        document.getElementById('itemType').value = currentTab.slice(0, -1);
        document.getElementById('itemName').value = "";
        document.getElementById('itemPrice').value = "";
        document.getElementById('priceInputDiv').style.display = currentTab === 'backdrops' ? 'none' : 'block';
        itemModal.show();
    }

    function openEditModal(type, id, name, price) {
        document.getElementById('modalTitle').textContent = "Edit " + type;
        document.getElementById('modalForm').action = "{{ route('admin.packages.update') }}";
        document.getElementById('methodField').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('itemType').value = type;
        document.getElementById('itemId').value = id;
        document.getElementById('itemName').value = name;
        document.getElementById('itemPrice').value = price;
        document.getElementById('priceInputDiv').style.display = type === 'backdrop' ? 'none' : 'block';
        itemModal.show();
    }
</script>
@endsection