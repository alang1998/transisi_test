<div class="dropdown float-right">
    <button class="btn p-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg"  height="20px" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
        </svg>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        {{ $slot }}
    </div>
</div>