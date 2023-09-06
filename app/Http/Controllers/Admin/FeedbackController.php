<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = feedback::with('user')->paginate(25);

        return view('admin.feedback.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $feedback = Feedback::all();

        return view('admin.feedback.form', [
            'title' => 'Создание',
            'feedback' => $feedback,
            'method' => 'POST',
            'route' => route('feedbacks.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Feedback::create($request->validate($this->rules));

        return redirect()->route('feedbacks.index')->with(['success' => 'Обратная связь успешно создана']);
    }

    /**
     * Display the specified resource.
     */

    public function edit(Feedback $feedback)
    {
        $feedbacks = Feedback::all();

        return view('admin.feedback.form', [
            'title' => 'Редактирование',
            'feedback' => $feedback,
            'feedbacks' => $feedbacks,
            'method' => 'PUT',
            'route' => route('feedbacks.update', $feedback->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Feedback $feedback, Request $request)
    {
        $feedback->update($request->validate($this->rules));

        return redirect()->route('feedbacks.index')->with(['success' => 'Обратная связь успешно отредактирована']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedbacks.index')->with(['success' => 'Обратная связь успешно удалена']);
    }

    private array $rules = [
        'user_id' => ['required'],
        'title' => ['required'],
        'text' => ['required'],
        'communication_method' => ['required'],
    ];
}
