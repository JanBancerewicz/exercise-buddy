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
     * Show all tasks.
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

        return view('tasks.index', [
            'activeExercises'       => $activeExercises,
            'completedExercises'    => $completedExercises,
        ]);
    }

    /**
     * Show form for new task.
     *
     * @return string
     */
    public function add(){
        return view('tasks.add',[
            'defaultStatus' => Exercise::getStatus('Active')
        ]);
    }

    /**
     * Store new task.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreExerciseRequest $request){

        return redirect(
            route('tasks.show',
                ['task' => Exercise::create($request->validated())]
            )
        );
    }

    /**
     * Show a single task.
     *
     * @param Exercise $task
     * @return string
     */
    public function show(Exercise $task){
        return view('tasks.show', ['task'=> $task]);
    }

    /**
     * Show edit form for a single task.
     *
     * @param Exercise $task
     * @return string
     */
    public function edit(Exercise $task){
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update a single task
     *
     * @param Exercise $task
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExerciseRequest $request, Exercise $task){
        if($task->update($request->validated()))
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
            route('tasks.show',
                ['task' => $task]
            )
        );
    }

    /**
     * Delete a single task.
     *
     * @param Exercise $task
     * @return string
     */
    public function delete(Request $request, Exercise $task){
        if($task->delete())
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
            route('tasks.index')
        );
    }
}
