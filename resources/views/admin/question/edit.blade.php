<x-app-layout>

    <x-slot name="header">{{ $question->question }} için soruyu düzenle</x-slot>
  
    <div class="card">
        <div class="card-body">
  
               <form method="post" action="{{ route("questions.update",[$question->quiz_id,$question->id]) }}" enctype="multipart/form-data"> 
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label>Soru</label>
                    <input type="text" name="question" class="form-control" value="{{ $question->question }}" required>
                    
                    <label>Fotoğraf</label>
                    @if($question->image)
                    <a href="{{ asset($question->image)}}" target="_blank">
                    <img src="{{ asset($question->image) }}" class="img-responsive" style="width: 400px"></a>
                <br/>
                @endif
                    <input type="file" name="image" class="form-control">
  
  
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>1. Cevap</label>
                                <textarea name="answer1" class="form-control" rows="2">{{ $question->answer1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>2. Cevap</label>
                                <textarea name="answer2" class="form-control" rows="2">{{ $question->answer2 }}</textarea>
                            </div>
                        </div>
  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>3. Cevap</label>
                                <textarea name="answer3" class="form-control" rows="2">{{ $question->answer3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>4. Cevap</label>
                                <textarea name="answer4" class="form-control" rows="2">{{ $question->answer4 }}</textarea>
                            </div>
                        </div>
                    </div>
  
                    <div class="form-group">
                        <label>Doğru cevap</label>
                        <select name="correct_answer" class="form-control">
                            <option @if($question->correct_answer==="answer1") selected @endif value="answer1">1. cevap</option>
                            <option @if($question->correct_answer==="answer2") selected @endif value="answer2">2. cevap</option>
                            <option @if($question->correct_answer==="answer3") selected @endif value="answer3">3. cevap</option>
                            <option @if($question->correct_answer==="answer4") selected @endif value="answer4">4. cevap</option>
  
                        </select>
  
                    </div>
  
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm btn-block">Soruyu güncellle</button>
  
              </form>  
        </div>
    </div>
  
  </x-app-layout>