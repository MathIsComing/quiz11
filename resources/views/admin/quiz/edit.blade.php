<x-app-layout>

    <x-slot name="header">Quiz Güncelle></x-slot>

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ route("quizzes.update" , $quiz->id) }}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label>Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" required>

                    <label>Quiz açıklama</label>
                    <input type="text" name="description" class="form-control" value="{{ $quiz->description }}" required>

                    <label>Bitiş tarihi olacak mı?  </label><input type="checkbox">
                    <br>
                    <label>Bitiş tarihi</label>
                    <label> Eski bitiş tarihi {{ date('Y-m-d\TH:İ', strtotime($quiz->finished_at)) }}</label>
                    <input type="datetime-local" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif class="form-control" required>

                </div>
                <div class="form-group">
                    <label>Quiz durumu</label>
                    <select name="status" class="form-control">
                        <option @if($quiz->questions_count<2) disabled @endif @if($quiz->status==="publish") selected @endif value="publish">Aktif</option>
                        <option @if($quiz->status==="passive") selected @endif value="passive">Pasif</option>
                        <option @if($quiz->status==="draft")   selected @endif  value="draft">Taslak</option>


                    </select>

                </div>
                <br>
                <input type="hidden" name="id" class="form-control" value="{{ $quiz->id }}" required>
                <button type="submit" class="btn btn-success btn-sm btn-block">Quiz güncelle</button>

            </form>
        </div>
    </div>

    <x-slot name="js">
       <script>
           $("#isFinished").change(function(){
            alert("çalıştı")

           })

       </script>
    
    </x-slot>
</x-app-layout>