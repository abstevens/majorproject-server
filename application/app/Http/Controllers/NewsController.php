<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(News $news): JsonResponse
    {
        $news = $news::all();

        return $this->respondData($news);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $news = new News($request->all());

        $result = $news->save();

        return $this->respondCondition($result, $news->id, 'news.store_failed');
    }

    public function show(News $news): JsonResponse
    {
        return $this->respondData($news);
    }

    public function update(Request $request, int $newsId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(), [
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'string|max:255',
            ]
        );

        $this->respondErrorOnValidationFail($validator);

        $news = new News($request->all());

        $result = $news->save();

        return $this->respondCondition($result, $newsId, 'news.update_failed');
    }

    public function destroy(News $news): JsonResponse
    {
        $result = $news->delete();

        return $this->respondCondition($result, $news->id, 'news.destroy_failed');
    }

    public function search(Request $request, $searchString): JsonResponse
    {
        $news = News::where('title', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($news);
    }
}
