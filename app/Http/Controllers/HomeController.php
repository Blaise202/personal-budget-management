<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $transactions = Transaction::orderByDesc('created_at')->get();
    $deposits = Transaction::where('type', 'deposit')->sum('amount');
    $withdraws = Transaction::where('type', 'withdraw')->sum('amount');
    return view(
      'index',
      compact(
        'transactions',
        'deposits',
        'withdraws'
      )
    );
  }

  public function create(Request $request, $type)
  {
    $request->validate([
      'amount' => 'required|numeric|min:0.01',
    ]);

    Transaction::create([
      'type' => $type,
      'amount' => $request->amount
    ]);
    return redirect()->route('home');
  }

  public function update(Request $request, $id)
  {
    $transaction = Transaction::find($id);
    $request->validate([
      'amount' => 'required|numeric|min:0.01',
    ]);

    $transaction->amount = $request->amount;
    $transaction->save();
    return redirect()->back();
  }

  public function delete($id)
  {
    $transaction = Transaction::find($id);
    $transaction->delete();
    return redirect()->route('home');
  }
}
