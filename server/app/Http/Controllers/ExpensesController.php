<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailableClass;
use App\Http\Requests\createExpenseRequest;


class ExpensesController extends Controller
{
    public function index()
    {
        return response()->json([
            'expenses' => auth()->user()->expenses
        ]);
    }

    public function store(createExpenseRequest $request)
    {
        $validatedRequest = $request->validated();

        $expense = Expenses::create([
            'type' => $validatedRequest["type"],
            'value' => $validatedRequest["value"],
            'date' => $validatedRequest["date"],
            'description' => $validatedRequest["description"],
            'user_id' => auth()->user()->id
        ]);

        // $messageContent = "Despesa do valor $request->value cadastrada com sucesso!";
        // $email = new MailableClass($messageContent);
        // $email->build();
        // Mail::to(auth()->user()->email)->send($email);

        return response()->json([
            'expense' => $expense
        ], 201);
    }
}
