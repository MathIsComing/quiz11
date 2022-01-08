<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes= Quiz::withCount("questions");
        
        if(request()->get("title")){
                $quizzes=$quizzes->where("title","LIKE","%".request()->get('title')."%");
        }
        if(request()->get("status")){
            $quizzes=$quizzes->where("status",request()->get("status"));
            
    }

        $quizzes=$quizzes->paginate(5);
        return view("admin.quiz.list",compact("quizzes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.quiz.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        //return $request->post();
        Quiz::create($request->post());
        return redirect()->route("quizzes.index")->withSuccess("quiz başarı ile oluşturuldu");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
            $quiz = Quiz::with("questions.my_answer","my_result")->find($id);

            return view("admin.quiz.show", compact("quiz"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz=Quiz::withCount("questions")->find($id) ?? abort(404,"Quiz Bulunamadı");
        
        return view("admin.quiz.edit",compact("quiz"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request;
        $quiz=Quiz::find($id) ?? abort(404,"Quiz Bulunamadı");
         Quiz::find($request->id)->first()->update($request->except(["_method","_token"]));

        return redirect()->route("quizzes.index")->withSuccess("quiz güncelleme başarılı");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort(404,"quiz bulunamadı");
        $quiz->delete();
        return redirect()->route("quizzes.index")->withSucces("Quiz silme işlemi gerçekleşti");

    }
    

}
