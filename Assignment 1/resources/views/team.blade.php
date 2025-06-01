@extends('layouts.app')

@section('title', 'Kainara Team')
@section('body-class', 'bg-white min-h-screen flex flex-col')

@section('content')
@php
    $skipAnimation = !is_null(request('role', null));
    $displayRole = strtolower($selectedRole ?? 'all');
@endphp

<div id="opening1" class="flex items-center justify-center h-screen transition-opacity duration-1000 opening-transition {{ $skipAnimation ? 'hidden' : '' }}">
    <img src="/image/logo/1.png" alt="Logo Kainara" class="w-1/2 h-auto" />
</div>

<div id="opening2" class="flex items-center justify-center h-screen transition-opacity duration-1000 opening-transition {{ $skipAnimation ? 'hidden' : '' }}">
    <div class="flex flex-col items-start text-left relative">
        <p class="text-base text-gray-600 tracking-widest raleway">WE ARE</p>
        <h1 class="text-9xl font-bold tracking-widest storica m-2">KAINARA</h1>
        <div class="flex justify-end items-end w-full">
            <p class="text-base text-gray-600 tracking-widest raleway">BANGGA PAKAI KARYA UMKM</p>
        </div>
    </div>
</div>

<div id="mainContent" class="flex-1 flex flex-col items-center justify-center p-6 {{ $skipAnimation ? '' : 'hidden' }}">
    <h2 class="text-3xl font-semibold text-gray-700 mb-8 raleway">Meet Our Team!</h2>

    {{-- Role Filter Dropdown --}}
    <form method="GET" action="{{ url()->current() }}" class="mb-6">
        <select name="role" onchange="this.form.submit()" class="border p-2 rounded">
            <option value="all" {{ $displayRole === 'all' ? 'selected' : '' }}>All Roles</option>
            @php
                $roles = collect($allMembers)->pluck('role')->unique()->sort()->values();
            @endphp
            @foreach($roles as $roleOption)
                <option value="{{ strtolower($roleOption) }}" {{ $displayRole === strtolower($roleOption) ? 'selected' : '' }}>{{ $roleOption }}</option>
            @endforeach
        </select>
    </form>

    {{-- Members Grid --}}
    <div class="flex flex-row flex-wrap justify-center gap-6">
        @foreach ($members as $member)
            @php
                $memberRole = strtolower($member['role']);
            @endphp

            @if ($displayRole === 'all')
                @php $showMember = true; @endphp

            @elseif ($displayRole === 'backend developer' && $memberRole === 'backend developer')
                @php $showMember = true; @endphp

            @elseif ($displayRole === 'frontend developer' && $memberRole === 'frontend developer')
                @php $showMember = true; @endphp

            @elseif ($displayRole === 'fullstack developer' && $memberRole === 'fullstack developer')
                @php $showMember = true; @endphp

            @elseif ($displayRole === 'ui/ux designer' && $memberRole === 'ui/ux designer')
                @php $showMember = true; @endphp

            @else
                @php $showMember = false; @endphp
            @endif

            @if ($showMember)
                <a href="{{ route('team.show', ['alt' => $member['alt']]) }}">
                    <div
                        class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center w-64 hover:scale-110 hover:translate-2 transition-transform duration-300"
                    >
                        <div class="w-48 aspect-[3/4] overflow-hidden rounded-lg mb-4">
                            <img
                                src="{{ asset($member['gallery'][0]) }}"
                                alt="{{ $member['alt'] }}"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 raleway">{{ $member['name'] }}</h3>
                        <p class="text-sm text-gray-500 raleway">Role: {{ $member['role'] }}</p>
                        <p class="text-sm text-gray-500 raleway">ID: {{ $member['student_id'] }}</p>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const opening1 = document.getElementById('opening1');
        const opening2 = document.getElementById('opening2');
        const main = document.getElementById('mainContent');

        const skipAnimation = {{ $skipAnimation ? 'true' : 'false' }};

        if (!skipAnimation) {
            opening1.classList.add('show');

            setTimeout(() => {
                opening1.classList.remove('show');
                opening1.classList.add('fade-out');

                setTimeout(() => {
                    opening1.classList.add('hidden');

                    opening2.classList.add('show');

                    setTimeout(() => {
                        opening2.classList.remove('show');
                        opening2.classList.add('fade-out');

                        setTimeout(() => {
                            opening2.classList.add('hidden');
                            main.classList.remove('hidden');
                        }, 1000);
                    }, 2000);
                }, 1000);
            }, 2000);
        } else {
            opening1.classList.add('hidden');
            opening2.classList.add('hidden');
            main.classList.remove('hidden');
        }
    });

    // Detect refresh / reload
    window.addEventListener('pageshow', (event) => {
        if (event.persisted || performance.getEntriesByType("navigation")[0].type === 'reload') {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('role')) {
                window.location.href = '{{ url('/') }}';
            }
        }
    });
</script>
@endpush
