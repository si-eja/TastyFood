@extends('temppage')
@section('content')

{{-- ================== HERO ================== --}}
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">
            {{ $tentang->web_title }}
        </h1>
    </div>
</section>

{{-- ================== TENTANG ================== --}}
<section class="bg-costume">
    <div class="container py-5">
        <div class="row g-3 flex-row-reverse">

            {{-- IMAGE (STATIC) --}}
            <div class="col-md-6 row g-2">
                <div class="col-md-6">
                    <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}"
                        class="object-fit-cover rounded-4"
                        style="width:100%; height:100%; max-height:390px;">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('ASET/brooke-lark-1Rm9GLHV0UA-unsplash.jpg') }}"
                        class="object-fit-cover rounded-4"
                        style="width:100%; height:100%; max-height:390px;">
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="col-md-6">
                <div class="isi d-flex flex-column justify-content-center h-100">
                    <h2 class="fw-bold mb-3">
                        {{ $tentang->about_title }}
                    </h2>

                    <p class="fw-bold">
                        {{ $tentang->about_desc_1 }}
                    </p>

                    <p>
                        {{ $tentang->about_desc_2 }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================== VISI ================== --}}
<section class="bg bg-white">
    <div class="container py-5">
        <div class="row g-3 flex-wrap">

            {{-- IMAGE (STATIC) --}}
            <div class="col-md-6 row g-2">
                <div class="col-md-6">
                    <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}"
                        class="object-fit-cover rounded-4"
                        style="width:100%; height:100%; max-height:320px;">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('ASET/brooke-lark-1Rm9GLHV0UA-unsplash.jpg') }}"
                        class="object-fit-cover rounded-4"
                        style="width:100%; height:100%; max-height:320px;">
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="col-md-6 text-start">
                <div class="isi d-flex flex-column justify-content-center h-100">
                    <h4 class="fw-bold mb-3">Visi</h4>

                    <p>
                        {{ $tentang->visi_desc_1 }}
                    </p>

                    <p>
                        {{ $tentang->visi_desc_2 }}
                    </p>
                </div>
            </div>

        </div>

        {{-- ================== MISI ================== --}}
        <div class="row g-3 flex-row-reverse mt-5">

            {{-- IMAGE (STATIC) --}}
            <div class="col-md-6">
                <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}"
                    class="object-fit-cover rounded-4"
                    style="width:100%; height:100%; max-height:320px;">
            </div>

            {{-- CONTENT --}}
            <div class="col-md-6 text-start">
                <div class="isi d-flex flex-column justify-content-center h-100">
                    <h4 class="fw-bold mb-3">Misi</h4>

                    <p>
                        {{ $tentang->misi_desc_1 }}
                    </p>

                    <p>
                        {{ $tentang->misi_desc_2 }}
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
