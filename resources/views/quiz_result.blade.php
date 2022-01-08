<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} Sonucu </x-slot>

    <div class="card">
        <div class="card-body">

            <h3>Puanınız: {{ $quiz->my_result->point }}</h3>
            @foreach ($quiz->questions as $question )
            <small> Doğru cevap oranı %{{ $question->true_percent  }}</small> <br/>
                @if ($question->correct_answer == $question->my_answer->answer)
                    <i class="fa fa-check text-success"></i>
                    @else
                    <i class="fa fa-times text-danger"></i>
                @endif
            <strong> {{ $loop->iteration }}.Soru</strong> 
            {{ $question->question }}
            @if ($question->image)
            <img src="{{ asset($question->image) }}" class="img-responsive" style="width: 50%">
            @endif
            <div class="form-check">
                @if("answer1" == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif("answer1"== $question->my_answer->answer)
                <i class="fa fa-circle"></i>

                @endif
                <label class="form-check-label" for="quiz{{ $question->id }}1">
                    {{ $question->answer1 }}
                </label>
            </div>
            <div class="form-check">
                @if("answer2" == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif("answer2"== $question->my_answer->answer)
                <i class="fa fa-circle"></i>

                @endif
                <label class="form-check-label" for="quiz{{ $question->id }}2">
                    {{ $question->answer2 }}
                </label>
            </div>
            <div class="form-check">
                @if("answer3" == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif("answer3"== $question->my_answer->answer)
                <i class="fa fa-circle"></i>

                @endif
                <label class="form-check-label" for="quiz{{ $question->id }}3">
                    {{ $question->answer3 }}
                </label>
            </div>
            <div class="form-check">
                @if("answer4" == $question->correct_answer)
                <i class="fa fa-check text-success"></i>
                @elseif("answer4"== $question->my_answer->answer)
                <i class="fa fa-circle"></i>

                @endif
                <label class="form-check-label" for="quiz{{ $question->id }}4">
                    {{ $question->answer4 }}
                </label>
            </div>
            @if (!$loop->last) 
            
            <hr>
            @endif
            @endforeach
           

        </div>

</x-app-layout>