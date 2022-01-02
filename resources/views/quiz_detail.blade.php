<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} </x-slot>

    <div class="card">
        <div class="card-body">


            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru sayısı
                            <span class="badge badge-secondary badge-pill">{{ $quiz->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son katılım tarihi
                            <span class="badge badge-secondary badge-pill">{{ $quiz->finished_at }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama puan
                            <span class="badge badge-secondary badge-pill">60</span>
                            
                        </li>

                    </ul>
                    <br/>
                </div>

                <div class="col-md-8">{{ $quiz->description }}</p>
                </div>

                <a href="{{  route("quiz.join",$quiz->slug) }}" class="btn btn-primary btn-black">Quiz'e katıl</a>
            </div>
        </div>

</x-app-layout>