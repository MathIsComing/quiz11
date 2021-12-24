<x-app-layout>

    <x-slot name="header">Quiz Oluştur></x-slot>

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ route("quizzes.store") }}">
                @csrf
                <div class="form-group">
                    <label>Quiz başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ old("title") }}" required>

                    <label>Quiz açıklama</label>
                    <input type="text" name="description" class="form-control" value="{{ old("description") }}" required>

                    <label>Bitiş tarihi olacak mı?  </label><input type="checkbox">
                    <br>
                    <label>Bitiş tarihi</label>
                    <input type="datetime-local" name="finished_at" value="{{ old("finished_at") }}" class="form-control" required>

                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm btn-block">Quiz oluştur</button>

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