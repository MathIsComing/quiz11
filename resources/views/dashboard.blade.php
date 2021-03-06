<x-app-layout>
    <x-slot name="header">Anasayfa </x-slot>
<div class="row">
    <div class="col-md-8">
        <div class="list-group">
            @foreach ( $quizzes as $quiz )
                
            
            <a href="{{ route("quiz.detail", $quiz->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $quiz->title }}</h5>
                    <small>{{ "Bitiş tarihi ".$quiz->finished_at }}</small>
                </div>
                <p class="mb-1">{{  Str::limit($quiz->description,100)  }}</p>
                <small>{{ $quiz->questions_count." Soru" }}</small>
            </a>
            @endforeach
            {{ $quizzes->links() }}
            
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="card" >
            <div class="card-header">
              Featured
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($results as $result)
                <li class="list-group-item">
                    <strong>{{ $result->point }}</strong> - 
                    <a href="{{ route("quiz.detail",$result->quiz->slug) }}">{{ $result->quiz->title }}</a>
                    
                </li>
                @endforeach
              

            </ul>
          </div>
    
    </div>
</div>

</x-app-layout>