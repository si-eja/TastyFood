@extends('temppage')
@section('content')
<section class="backgournd-image">
    <div class="container h-100 d-flex align-items-center justify-content-start">
        <h1 class="text-white fw-bold">Tentang Kami</h1>
    </div>
</section>
<section class="bg-costume">
    <div class="container py-5">
        <div class="row g-3 flex-row-reverse">
            <div class="col-md-6 row g-2">
                <div class="col-md-6">
                    <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="" class="object-fit-cover rounded-4" style="width: 100%; height: 100%; max-height: 390px;">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('ASET/brooke-lark-1Rm9GLHV0UA-unsplash.jpg') }}" alt="" class="object-fit-cover rounded-4" style="width: 100%; height: 100%; max-height: 390px;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="isi d-flex flex-column justify-content-center h-100">
                    <h2 class="fw-bold mb-3">Tasty Food</h2>
                    <p class="fw-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg bg-white">
    <div class="container py-5">
        <div class="row g-3 flex-wrap">
            <div class="col-md-6 row g-2">
                <div class="col-md-6">
                    <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="" class="object-fit-cover rounded-4" style="width: 100%; height: 100%; max-height: 320px;">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('ASET/brooke-lark-1Rm9GLHV0UA-unsplash.jpg') }}" alt="" class="object-fit-cover rounded-4" style="width: 100%; height: 100%; max-height: 320px;">
                </div>
            </div>
            <div class="col-md-6 text-start">
                <div class="isi d-flex flex-column justify-content-center h-100">
                    <h4 class="fw-bold mb-3">Visi</h4>
                    <p class="text-lowercase">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                    <p class="text-lowercase">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                </div>
            </div>
        </div>
        <div class="row g-3 flex-row-reverse mt-5">
            <div class="col-md-6">
                <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="" class="object-fit-cover rounded-4" style="width: 100%; height: 100%; max-height: 320px;">
            </div>
            <div class="col-md-6 text-start">
                <div class="isi d-flex flex-column justify-content-center h-100">
                    <h4 class="fw-bold mb-3">Misi</h4>
                    <p class="text-lowercase">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                    <p class="text-lowercase">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium nam magnam sed delectus amet nulla tempora perspiciatis. Perspiciatis, quidem voluptatem vel nemo ea, amet odio quos porro quod, aliquid deleniti!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection