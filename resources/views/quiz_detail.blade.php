<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} </x-slot>

    <div class="card">
        <div class="card-body">


            <p class="card-text">
                <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sıralama
                            <span class="badge bg-success">{{ $quiz->my_rank}}</span>
                        </li>
                        @endif
                        
                        @if ($quiz->my_result)
                            
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Puan
                            <span class="badge bg-success">{{ $quiz->my_result->point}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Doğru/Yanlış
                            <span class="badge bg-warning text-dark">{{ $quiz->my_result->correct}}/ {{ $quiz->my_result->wrong}} </span>
                            
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru sayısı 
                            <span class="badge bg-primary">  {{ $quiz->questions_count}}</span>
                        </li>
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son katılım tarihi
                            <span class="badge bg-secondary">{{ $quiz->finished_at }}</span>
                        </li>
                        @endif
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama puan
                            <span class="badge bg-secondary">{{ $quiz->details["average"] }}</span>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı sayısı
                                <span class="badge bg-secondary">{{ $quiz->details["join_count"] }}</span>
                            
                        </li>
                        @endif
                    </ul>
                    <br/>
@if (count($quiz->TopTen)>0)
               <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">İlk 10</h5>
                            <ul class="list-group">
                                @foreach ($quiz->topTen as $result)
                                
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="h3">{{ $loop->iteration }}.</strong>
                                    <img class="w8 h-10 rounded-full" src="{{ $result->user->profile_photo_url }}">
                                    {{ $result->user->name }}
                                <span class="badge bg-secondary">{{ $result->point }}</span>
                                </li>
                                @endforeach
                            </ul>
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>

                <div class="col-md-8">{{ $quiz->description }}</p>
                </div>
                @if ($quiz->my_result)
                <a href="{{  route("quiz.join",$quiz->slug) }}" class="btn btn-primary btn-black">Quiz'i görüntüle</a>

                @elseif($quiz->finished_at>now())
                <a href="{{  route("quiz.join",$quiz->slug) }}" class="btn btn-primary btn-black">Quiz'e katıl</a>
                @endif
            </div>
        </div>
        
</x-app-layout>
