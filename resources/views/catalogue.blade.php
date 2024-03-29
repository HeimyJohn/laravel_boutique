@extends('base')
@section('title', "Catalogue des produits")
@section('content')

    <div class="bg-black text-white">
        <img class="bg-none h-screen w-screen opacity-25 object-cover top-0 left-0 fixed"
             src="{{ asset("image/testbackgroundcatalogue.jpg") }}" alt="background">
        <div class="flex justify-center pt-20 pb-8">
            <h1 class="text-3xl text-center w-96 pb-4 border-b-4">
                TOUS NOS CLAVIERS
            </h1>
        </div>

        <h2 class="text-center text-2xl">
            @if($search_terms!=null)
                Résultats de la recherche pour "{{ $search_terms }}"
            @endif
        </h2>


        <div class="mx-auto max-w-2xl px-4 py-1 pb-40 sm:px-6  lg:max-w-7xl lg:px-8">
            @if($products->isEmpty())
                <p class="text-2xl text-center">Aucun produit ne correspond à votre recherche.</p>
            @else

                <div class="mt-6">
                    {{ $products->links() }}
                </div>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 ">
                    @foreach($products as $product)
                        <div class="group relative">
                                <div class="min-h-80 aspect-h-1 aspect-w-1 w-full rounded-md lg:aspect-none lg:h-80">
                                    <img
                                        class="drop-shadow-white h-full w-full object-cover object-center lg:h-full lg:w-full"
                                        src={{ asset('image/CLAVIER.png') }} alt="clavier">
                                </div>
                                <div>
                                    <div>
                                        <h3 class="text-2xl">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $product->name }}
                                        </h3>
                                        <p class="mt-1 text-sm">{{ $product->description }}</p>
                                    </div>
                                </div>

                                <div class="flex flex-initial justify-between items-center">
                                    <a href="/product/{{ $product->id }}" class="z-20">
                                        <button class="mt-5 border-none btn bg-yellow-figma" style="color:black">En
                                            savoir plus
                                        </button>
                                    </a>
                                    <p class="mt-2 text font-medium text-end">{{ $product->price }}€</p>

                                </div>
                        </div>
                    @endforeach

                    <!-- More products... -->
                </div>
            @endif

        </div>
        @can("create", \App\Models\Product::class)
            <a href="/admin/product/add" class="flex justify-center">
                <button class="btn mb-5 border-none bg-purple-figma text-white-figma z-10 hover:text-purple-figma">
                    Ajouter un produit au catalogue
                </button>
            </a>
        @endcan
    </div>



    <div class="mt-6 pb-20">
        {{ $products->links() }}
    </div>

@endsection
