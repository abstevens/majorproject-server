<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function index(News $news)
    {
        // Store all news data
        $news = $news::all();

        // Return addresses data
        return $this->respondData($news);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // Validate news request
        if ($validator->fails()) {
            return redirect('news/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create news model instance with request
            $news = new News($request->all());

            // Save the news request
            $result = $news->save();

            return $this->respondCondition($result, 'news.store_failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * TODO: perform id validation!!
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return $this->respondData($news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO: Need to fix this.

        // Set validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('news/')
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create news model instance with request
            $address = new News($request->all());

            // Save the news request
            $result = $address->save();

            return $this->respondCondition($result, 'news.update_failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $result = $news->delete();

        return $this->respondCondition($result, 'news.destroy_failed');
    }

    public function search(Request $request, $searchString)
    {
        $news = News::where('title', 'LIKE', "%{$searchString}%")
            ->get();

        return $this->respondData($news);
    }
}
