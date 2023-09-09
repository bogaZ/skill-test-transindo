<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{
    // Show Dashboard Admin
    public function show()
    {
        return view('dashboard')->with([
            'datas' => Book::all()
        ]);
    }

    // Show View Create Book
    public function showViewCreateBook()
    {
        return view('createbook');
    }

    // Create data book
    public function store(Request $request)
    {
        try {
            // Validasi data
            $data = $request->validate([
                'book_code' => ['unique:books,book_code'],
                'name' => ['required'],
                'description' => ['required']
            ]);

            Book::create($data);

            return redirect('/dashboard')->with('success', 'Tambah data buku Berhasil');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan registrasi. Silakan coba lagi nanti.');
        }
    }

    // Delete data book
    public function destroy($id)
    {
        $data = Book::all()->find($id);

        $nameBook = $data['name'];

        $data->delete();

        return redirect('/dashboard')->with('success', $nameBook . ' berhasil dihapus');
    }
}
