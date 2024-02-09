<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Show all exercises.
     *
     * @return string
     */
    public function index()
    {
        $activeExercises = Exercise::where(
            'status',
            Exercise::getStatus('Active')
        )->orderBy('updated_at','DESC')
        ->get();

        $completedExercises = Exercise::where(
            'status',
            Exercise::getStatus('Completed')
        )->orderBy('updated_at','DESC')
        ->get();

        return view('exercises.index', [
            'activeExercises'       => $activeExercises,
            'completedExercises'    => $completedExercises,
        ]);
    }

    /**
     * Show form for new exercise.
     *
     * @return string
     */
    public function add(){
        return view('exercises.add',[
            'defaultStatus' => Exercise::getStatus('Active')
        ]);
    }

    /**
     * Store new exercise.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreExerciseRequest $request){

        return redirect(
            route('exercises.show',
                ['exercise' => Exercise::create($request->validated())]
            )
        );
    }

    /**
     * Show a single exercise.
     *
     * @param Exercise $exercise
     * @return string
     */
    public function show(Exercise $exercise){
        return view('exercises.show', ['exercise'=> $exercise]);
    }

    /**
     * Show edit form for a single exercise.
     *
     * @param Exercise $exercise
     * @return string
     */
    public function edit(Exercise $exercise){
        return view('exercises.edit', [
            'exercise' => $exercise
        ]);
    }

    /**
     * Update a single exercise
     *
     * @param Exercise $exercise
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise){
        if($exercise->update($request->validated()))
        {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Exercise updated successsfully'
            ]);
        }else{
            $request->session()->flash('status', [
                'success' => false,
                'message' => 'Update error!'
            ]);
        }

        return redirect(
            route('exercises.show',
                ['exercise' => $exercise]
            )
        );
    }

    /**
     * Delete a single exercise.
     *
     * @param Exercise $exercise
     * @return string
     */
    public function delete(Request $request, Exercise $exercise){
        if($exercise->delete())
        {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Exercise deleted successsfully'
            ]);
        }else{
            $request->session()->flash('status', [
                'success' => false,
                'message' => 'Delete error!'
            ]);
        }

        return redirect(
            route('exercises.index')
        );
    }


    /**
     * Show all exercises.
     *
     * @return string
     */
    public function setall(int $param)
    {
        if($param == 1){
            $activeExercises = Exercise::where(
                'status',
                Exercise::getStatus('Active')
            )->get();

            if (!empty($activeExercises)){
                foreach ($activeExercises as $activeExercise){
                    $activeExercise->update(['status' => Exercise::getStatus('Completed')]);
                }
            }
        }else{
            $completedExercises = Exercise::where(
                'status',
                Exercise::getStatus('Completed')
            )->get();

            if (!empty($completedExercises)){
                foreach ($completedExercises as $completedExercise){
                    $completedExercise->update(['status' => Exercise::getStatus('Active')]);
                }
            }
        }

        return redirect(
            route('exercises.index')
        );

        // return "hejka".$param;
    }

}
