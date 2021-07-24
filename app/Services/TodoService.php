<?php


namespace Todo\Services;


use Illuminate\Http\Request;
use Todo\Exceptions\ServiceException;
use Todo\Models\Todo;

class TodoService extends Service
{

    /**
     * Create a new Todo.
     * @param Request $request
     * @return Todo
     */
    public function create(Request $request): Todo
    {
        $todo = $this->processData($request, (new Todo()));
        $todo->save();
        return $todo;
    }

    /**
     * @param Request $request
     * @param Todo $todo
     * @return Todo
     */
    private function processData(Request $request, Todo $todo): Todo
    {
        $todo->item = $request->item;
        return $todo;
    }

    /**
     * Update a Todo
     * @param Request $request
     * @return Todo
     * @throws ServiceException
     */
    public function update(Request $request): Todo
    {
        $todo = Todo::find($request->id);
        if (empty($todo)) {
            throw new ServiceException('Invalid Todo');
        }
        $todo = $this->processData($request, $todo);
        $todo->save();
        return $todo;
    }

    /**
     * Deletes the todo.
     * @param Request $request
     * @return string
     * @throws ServiceException
     */
    public function deleteTodo(Request $request): string
    {
        $todo = Todo::find($request->id);
        if (empty($todo)) {
            throw new ServiceException('Invalid Todo');
        }
        $todo->delete();
        return 'Todo deleted successfully';
    }

    /**
     * Marks Todo as complete.
     * @param Request $request
     * @return Todo
     * @throws ServiceException
     */
    public function markCompleted(Request $request): Todo
    {
        $todo = Todo::find($request->id);
        if (empty($todo)) {
            throw new ServiceException('Invalid Todo');
        }
        $todo->is_completed = !$todo->is_completed;
        $todo->save();
        return $todo;
    }
}
