<x-app-layout>
    <x-slot name="header">Quziler </x-slot>

    <div class="card-boddy">
        <h5 class="card-title">
            <a href="{{ route("quizzes.create") }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Quiz oluştur</a>
        </h5>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Quizz</th>
                <th scope="col">Soru sayısı</th>
                <th scope="col">Durum</th>
                <th scope="col">Bitiş Tarihi</th>
                <th scope="col">İşlemler</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)

              <tr>
                <th >{{ $quiz->title }}</th>
                <th >{{ $quiz->questions_count }}</th>
                <td>
                  @switch($quiz->status)
                    @case("publish")
                    
                    <span class="badge alert-primary">Aktif</span>
                    
                      
                      @break
                      @case("passive")
                      <span class="badge alert-secondary">Pasif</span>
                      @break
                      @case("draft")
                      
                      <span class="badge alert-warning">Taslak</span>
                      
                      @break
                  
                    @default
                      
                  @endswitch



                </td>
                <td>{{ $quiz->finished_at }}</td>
                <td>
                    <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-primary">Soruları Gör</a>
                    
                    <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary">Düzenle</a>
                    <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger">Sil</a>

                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $quizzes->links() }}
    </div>
    <div class="alert alert-danger">Boostrap dash</div>
</x-app-layout>
