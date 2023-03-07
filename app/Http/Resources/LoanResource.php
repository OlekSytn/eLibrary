<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LoanResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $book = [];
        if ($this->book) {
            $book = [
                'id' => $this->book->id,
                'title' => $this->book->title,
                'isbn' => $this->book->isbn
            ];
        }
        $member = [];
        if ($this->user) {
            $member = [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'address' => $this->user->address,
                'phone_number' => $this->user->phone_number
            ];
        }
        $status = 1;
        if ($this->return_date) {
            $status = 2;
        }
        return [
            'id' => $this->id,
            'loan_date' => $this->loan_date,
            'must_returned_date' => $this->must_returned_date,
            'return_date' => $this->return_date,
            'amount_fines' => $this->amount_fines,
            'status' => $status,
            'member_id' => $this->member_id,
            'member_name' => $this->user ? $this->user->name : '-',
            'book_id' => $this->book_id,
            'book_title' => $this->book ? $this->book->title : '-',
            'book' => $book,
            'member' => $member
        ];
    }
}
