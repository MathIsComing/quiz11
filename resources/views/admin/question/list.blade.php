<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}  Quizine ait sorular </x-slot>

    <div class="card-boddy">
        <h5 class="card-title">
            <a href="{{ route("quizzes.create", $quiz->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Quiz oluştur</a>
        </h5>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Soru</th>
                <th scope="col">Fotoğraf</th>
                <th scope="col">1. cevap</th>
                <th scope="col">2. cevap</th>
                <th scope="col">3. cevap</th>
                <th scope="col">4. cevap</th>
                <th scope="col">Doğru cevap</th>
                <th scope="col">İşlemler</th>
              </tr>

              @foreach ($quiz->questions as $question)

              <tr>
                <td >{{ $question->question }}</td>
                <td>{{ $question->image }}</td>
                <td>{{ $question->answer1 }}</td>
                <td>{{ $question->answer2 }}</td>
                <td>{{ $question->answer3 }}</td>
                <td>{{ $question->answer4 }}</td>
                <td>{{ substr($question->correct_answer, -1) }}.Cevap</td>
                
                <td>

                    <a href="{{ route('quizzes.edit', $question->id) }}" class="btn btn-sm btn-primary">Düzenle</a>
                    <a href="{{ route('quizzes.destroy', $question->id) }}" class="btn btn-sm btn-danger">Sil</a>

                  </td>
              </tr>
              @endforeach

            </thead>
            <tbody>
                
            </tbody>
          </table>
        
    </div>
    <div class="alert alert-danger">Boostrap dash</div>
</x-app-layout>
