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
                <th scope="col">Durum</th>
                <th scope="col">Bitiş Tarihi</th>
                <th scope="col">İşlemler</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)

              <tr>
                <th >{{ $quiz->title }}</th>
                <td>{{ $quiz->status }}</td>
                <td>{{ $quiz->finished_at }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-primary">Düzenle</a>
                    <a href="" class="btn btn-sm btn-danger">Sil</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $quizzes->links() }}
    </div>
    <div class="alert alert-danger">Boostrap dash</div>
</x-app-layout>
