<?php

namespace Todo\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Todo\Exceptions\ServiceException;
use Todo\Http\Controllers\Controller;
use Todo\Http\Resources\V1\TodoResource;
use Todo\Models\Todo;
use Todo\Services\TodoService;

class TodoController extends Controller
{
    /**
     * @param Request $request // Todo: Use Custom Request for Authorizations
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $todos = Todo::paginate(5);
        return TodoResource::collection($todos);
    }

    public function store(Request $request, TodoService $service): TodoResource
    {
        $todo = $service->create($request);
        return new TodoResource($todo);
    }

    public function update(Request $request, TodoService $service): TodoResource
    {
        try {
            $todo = $service->update($request);
        } catch (ServiceException $exception) {
            return $exception->renderJsonResonse();
        }
        return new TodoResource($todo);
    }

    public function markCompleted(Request $request, TodoService $service): TodoResource
    {
        try {
            $todo = $service->markCompleted($request);
        } catch (ServiceException $exception) {
            return $exception->renderJsonResonse();
        }
        return new TodoResource($todo);
    }

    public function delete(Request $request, TodoService $service): JsonResponse
    {
        try {
            $message = $service->deleteTodo($request);
        } catch (ServiceException $exception) {
            return $exception->renderJsonResonse();
        }
        return response()->json(['message' => $message]);
    }
}
