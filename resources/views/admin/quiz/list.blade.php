<x-app-layout>
    <x-slot name="header">Quziler </x-slot>

    <div class="card-boddy">
        <h5 class="card-title float-right">
            <a href="{{ route("quizzes.create") }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Quiz oluştur</a>
        </h5>

        <form method="GET" action="">
          <div class="form-row">
          <div class="col-md-4">
            <input type="text" name="title" value="{{ request()->get("title") }}" class="form-control" placeholder="Quiz Adı">
          </div>
          <div class="col-md-4">
            <select class="form-control" onchange="this.form.submit()" name="status">
              <option value="">Durum seçiniz</option>
              <option @if(request()->get("status")==="publish") selected @endif value="publish">aktif</option>
              <option @if(request()->get("status")==="passive") selected @endif value="passive">pasif</option>
              <option @if(request()->get("status")==="draft") selected @endif value="draft">Taslak</option>
            </select>
          </div>
          @if (request()->get("title") || request()->get("status") )
            
          
          <div class="col-md-2">
            <a href=" {{ route("quizzes.index") }}" class="btn btn-secondary">Sıfırla</a>

          </div>
          @endif
          </div>
        </form>

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

                  <a href="{{ route("quizzes.details", $quiz->id) }}" class="btn btn-sm btn-secondary">
                    <i class="fa fa-info-circle"></i>
                  </a>

                    <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-sm btn-primary">Soruları Gör</a>
                    
                    <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary">Düzenle</a>
                    <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger">Sil</a>

                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $quizzes->withQueryString()->links()}}
    </div>
    <div class="alert alert-danger">Boostrap dash</div>
</x-app-layout>
