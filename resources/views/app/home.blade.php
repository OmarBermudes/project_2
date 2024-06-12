<x-layout>
    <img class="bg-img" src="./images/banner/banner-3.jpg" alt="">

    @include('includes.navbar')

    <div class="container pt-5">
        <div class="row  h-100 align-items-center">
            <div class="col-md-10 col-lg-6 text-white">
                {{-- Title --}}
                <h1 class="text-capitalize">
                    <span class="custom-text-warning h5">Nostalx</span> <br>
                    Captura y comparte los momentos mas especiales.
                </h1>
                {{-- Description --}}
                <p class="d-none d-md-block">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos quas dolorem modi, accusantium,
                    accusamus sint porro similique maiores perferendis aliquid commodi, laudantium iure. Suscipit ad
                    porro cum? Ut, deleniti quisquam.</p>
                {{-- Button --}}
                <a href="#" class="text-reset btn btn-warning">Try Now</a>

            </div>
        </div>
    </div>

</x-layout>
