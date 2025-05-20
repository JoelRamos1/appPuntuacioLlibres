<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Book;
use App\Models\Category;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $userAge = Carbon::parse($user->birthday_date)->age;

        $books = Book::where('minimal_age', '<=', $userAge)->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.valuation', compact('book', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:10',
            'valuation' => 'required|string'
        ]);
    
        $book = Book::findOrFail($id);
        
        $book->valuation()->attach(auth()->id(), [
            'score' => $request->score,
            'valuation' => $request->valuation
        ]);

        return redirect()->route('books.show', compact('book', 'id'))->with('success', 'Valoración guardada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $bookValuation = $book->valuation()->avg('score') ?? 0;
        $bookCategory = Category::find($book->category_id);
        return view('books.show', compact('id', 'book', 'bookValuation', 'bookCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userId = auth()->id();

        $book = Book::findOrFail($id);
        $userValuation = $book->valuation()->where('user_id', $userId)->first();
        return view('books.edit', ['evaluation' => $userValuation->pivot,
                                    'book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validarValoracion = $request->validate([
            'score' => 'required|integer|min:0|max:10',
            'valuation' => 'required|string'
        ]);

        $book = Book::findOrFail($id);
        $book->valuation()->updateExistingPivot(auth()->id(), [
            'score' => $validarValoracion['score'],
            'valuation' => $validarValoracion['valuation']
        ]);

        return redirect()->route('books.show', $book)->with('success', 'Valoración actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
