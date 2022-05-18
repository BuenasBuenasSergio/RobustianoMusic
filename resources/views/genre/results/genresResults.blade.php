<a href="{{ route('genres.create') }}">
    <div class="row" id="resultados">
        @foreach ($genres as $genre)
            <div class="card  bg-black text-white col-6 col-sm-6 col-md-4 col-lg-3">
                <a href="">
                    <!--LLeva a los artistas del pais-->
                    <div id="fondo">
                        <img class="card-img " src="{{ asset($genre->image) }}">
                    </div>
                    <div class="card-img-overlay">
                        <div class="texto">
                            <h5 class="card-title">{{ $genre->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
