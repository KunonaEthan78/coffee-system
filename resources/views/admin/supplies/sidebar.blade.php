@auth
    @if (auth()->user()->is_admin)
        <li><a href="{{ route('admin.supplies.index') }}">Supply Records</a></li>
        <li><a href="{{ route('admin.suppliers.index') }}">Suppliers</a></li>
        <li><a href="{{ route('admin.coffees.index') }}">Coffees</a></li>
    @endif
@endauth