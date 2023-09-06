<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Review::paginate(25);

        return view('admin.reviews.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviews = Review::all();

        return view('admin.reviews.form', [
            'title' => 'Создание',
            'reviews' => $reviews,
            'method' => 'POST',
            'route' => route('reviews.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Review::create($request->validate($this->rules));

        return redirect()->route('$reviews.index')->with(['success' => 'Отзыв успешно создана']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $reviews = Review::all();

        return view('admin.reviews.form', [
            'title' => 'Редактирование',
            'review' => $review,
            'reviews' => $reviews,
            'method' => 'PUT',
            'route' => route('reviews.update', $review->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Review $review, Request $request)
    {
        $review->update($request->validate($this->rules));

        return redirect()->route('reviews.index')->with(['success' => 'Отзыв успешно отредактирована']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with(['success' => 'Отзыв успешно удалена']);
    }

    private array $rules = [
        'user_id' => ['required', 'integer', 'exists:users,id'],
        'title' => ['required', 'string', 'max:255'],
        'text' => ['required', 'string'],
        'rating' => ['required', 'integer', 'min:1', 'max:5'],
    ];
}
