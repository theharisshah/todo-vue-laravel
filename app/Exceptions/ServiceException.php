<?php


namespace Todo\Exceptions;


use Illuminate\Http\JsonResponse;

class ServiceException extends \Exception
{
    /**
     * Return Exception Message in Json Response with error code 422.
     * @return JsonResponse
     */
    public function renderJsonResonse(): JsonResponse
    {
        return response()->json(['error' => $this->getMessage(), 'message' => $this->getMessage()], 422);
    }
}
