<li class="nav-item has-treeview">
    <a href="#" class="nav-link text-white">
        <i class="nav-icon far fa-address-card text-warning"></i>
        <p>
            Karyawan
            <i class="fas fa-angle-left right text-white"></i>
            <span class="badge badge-success right">3</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.employees.create') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Tambah Karyawan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employees.index') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Daftar Karyawan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employees.attendance') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Absensi Karyawan</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link text-white">
        <i class="nav-icon fa fa-calendar-check-o text-warning"></i>
        <p>
            Daftar Cuti Karyawan
            <i class="fas fa-angle-left right text-white"></i>
            <span class="badge badge-success right">1</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.leaves.index') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Cuti</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link text-white">
        <i class="nav-icon fas fa-clock text-warning"></i>
        <p>
            Kelola Lembur
            <i class="fas fa-angle-left right text-white"></i>
            <span class="badge badge-success right">2</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.expenses.setting_index') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Setting Lembur</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.expenses.index') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Daftar Lembur</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link text-white">
        <i class="nav-icon fa fa-calendar-minus-o text-warning"></i>
        <p>
            Hari Libur
            <i class="fas fa-angle-left right text-white"></i>
            <span class="badge badge-success right">2</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.holidays.create') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Tambah Hari Libur</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.holidays.index') }}" class="nav-link text-white">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>Daftar Hari Libur</p>
            </a>
        </li>
    </ul>
</li>
