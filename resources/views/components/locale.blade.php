<form action="{{ route('setlocale', $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm {{ app()->getLocale() === $lang ? 'btn-primary' : 'btn-outline-primary' }}">
        <img src="{{ asset('vendor/blade-flags/country-' . $lang . '.svg') }}" width="32" height="32" alt="{{ $lang }}">
        {{ strtoupper($lang) }}
    </button>
</form>