<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show all tasks.
     *
     * @return string
     */
    public function index()
    {
        $activeTasks = Task::where(
            'status',
            Task::getStatus('Active')
        )->orderBy('updated_at','DESC')
        ->get();

        $completedTasks = Task::where(
            'status',
            Task::getStatus('Completed')
        )->orderBy('updated_at','DESC')
        ->get();

        return view('tasks.index', [
            'activeTasks'       => $activeTasks,
            'completedTasks'    => $completedTasks,
        ]);
    }

    /**
     * Show form for new task.
     *
     * @return string
     */
    public function add(){
        return view('tasks.add',[
            'defaultStatus' => Task::getStatus('Active')
        ]);
    }

    /**
     * Store new task.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(StoreTaskRequest $request){

        return redirect(
            route('tasks.show',
                ['task' => Task::create($request->validated())]
            )
        );
    }

    /**
     * Show a single task.
     *
     * @param Task $task
     * @return string
     */
    public function show(Task $task){
        return view('tasks.show', ['task'=> $task]);
    }

    /**
     * Show edit form for a single task.
     *
     * @param Task $task
     * @return string
     */
    public function edit(Task $task){
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update a single task
     *
     * @param Task $task
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTaskRequest $request, Task $task){
        if($task->update($request->validated()))
        {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Task updated successsfully'
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
     * @param Task $task
     * @return string
     */
    public function delete(Request $request, Task $task){
        if($task->delete())
        {
            $request->session()->flash('status', [
                'success' => true,
                'message' => 'Task deleted successsfully'
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
