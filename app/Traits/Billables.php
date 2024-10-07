<?php

namespace App\Traits;

use App\Models\Bill;
use App\Models\Payment;

trait BillableTrait
{
    /**
     * Generate a bill for a student.
     *
     * @param int $studentId
     * @param float $amount
     * @param string|null $description
     * @return Bill
     */
    public function generateBill($studentId, $amount, $description = null)
    {
        return Bill::create([
            'student_id' => $studentId,
            'amount' => $amount,
            'description' => $description,
            'status' => 'unpaid',
        ]);
    }

    /**
     * Record a payment for a student.
     *
     * @param int $studentId
     * @param float $amount
     * @param string|null $description
     * @return Payment
     */
    public function recordPayment($studentId, $amount, $description = null)
    {
        $payment = Payment::create([
            'student_id' => $studentId,
            'amount' => $amount,
            'description' => $description,
        ]);

        $this->updateBillStatus($studentId);

        return $payment;
    }

    /**
     * Get the outstanding balance for a student.
     *
     * @param int $studentId
     * @return float
     */
    public function getOutstandingBalance($studentId)
    {
        $totalBills = Bill::where('student_id', $studentId)->sum('amount');
        $totalPayments = Payment::where('student_id', $studentId)->sum('amount');

        return $totalBills - $totalPayments;
    }

    /**
     * Update the bill status after payment.
     *
     * @param int $studentId
     * @return void
     */
    protected function updateBillStatus($studentId)
    {
        $outstandingBalance = $this->getOutstandingBalance($studentId);

        if ($outstandingBalance <= 0) {
            Bill::where('student_id', $studentId)->update(['status' => 'paid']);
        } else {
            Bill::where('student_id', $studentId)->update(['status' => 'partial']);
        }
    }

    /**
     * Get the payment history for a student.
     *
     * @param int $studentId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPaymentHistory($studentId)
    {
        return Payment::where('student_id', $studentId)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Get all bills for a student.
     *
     * @param int $studentId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllBills($studentId)
    {
        return Bill::where('student_id', $studentId)->orderBy('created_at', 'desc')->get();
    }
}
