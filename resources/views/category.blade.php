@extends('base')
@section('title', "categorie : ".$category['name'])
@section('content')

    <div class="bg-black text-white">
        <div class="flex justify-center pt-20 pb-8">
            <h1 class="text-3xl text-center w-96 pb-4 border-b-4">
                {{ $category->name }}
            </h1>
        </div>
        <div class="mx-auto max-w-2xl px-4 py-1 pb-40 sm:px-6  lg:max-w-7xl lg:px-8">
            @if($products->isEmpty())
                <p class="text-2xl text-center">Aucun produit ne correspond à votre recherche.</p>
            @else
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach($products as $product)
                        <div class="group relative">
                            <div
                                class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-black lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img
                                    src={{ asset('image/CLAVIER.png') }}
                                alt="Le clavier de l'enfer."
                                class="drop-shadow-white h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <a href="/product/{{ $product->id }}">
                                <div>
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
                                        <button class="mt-5 border-none btn bg-yellow-figma" style="color:black">En
                                            savoir plus
                                        </button>
                                        <p class="mt-2 text font-medium text-end">{{ $product->price }}€</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    <!-- More products... -->
                </div>
            @endif

        </div>
        @auth
            <a href="/admin/product/add" class="flex justify-center">
                <button class="btn mb-5 border-none bg-purple-figma text-white-figma">
                    Ajouter un produit au catalogue
                </button>
            </a>
        @endauth
    </div>



    <div class="mt-6 pb-20">
        {{ $products->links() }}
    </div>

@endsection
