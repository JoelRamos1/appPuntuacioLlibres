<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(15);
        
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'publication_date' => 'required|date',
            'price' => 'required',
            'image' => 'required',
            'minimal_age' => 'required',
            'category_id' => 'required'
        ]);

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'summary' => $request->input('summary'),
            'publication_date' => $request->input('publication_date'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'minimal_age' => $request->input('minimal_age'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('admin.books.index')->with('success', 'La categoria ha sido correctamente creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $bookValuation = $book->valuation()->avg('score') ?? 0;
        return view('admin.books.show', compact('book', 'bookValuation', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datosValidados = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'summary' => 'required',
            'publication_date' => 'required',
            'price' => 'required',
            'image' => 'required',
            'minimal_age' => 'required',
            'category_id' => 'required'
        ]);

        $book = Book::findOrFail($id);

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->summary = $request->input('summary');
        $book->publication_date = $request->input('publication_date');
        $book->price = $request->input('price');
        $book->image = $request->input('image');
        $book->minimal_age = $request->input('minimal_age');
        $book->category_id = $request->input('category_id');

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Libro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
        }

        return redirect()->back()->with('success', 'Libro borrado correctamente');
    }
}
