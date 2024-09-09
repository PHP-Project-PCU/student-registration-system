<?php


namespace controllers;

use core\db\MySQL;
use models\PaymentModel;
use core\helpers\Constants;

class PaymentController
{
    private $paymentModel;
    public function __construct()
    {
        $this->paymentModel = new PaymentModel(new MySQL());
    }

    public function setPayment($data)
    {
        return $this->paymentModel->setPayment(Constants::$STUDENT_RECEIPT_TBL, $data);
    }

    public function getAllPayments()
    {
        return $this->paymentModel->getAllPayments(Constants::$STUDENT_RECEIPT_TBL);
    }

    public function getPaymentsBySemesterId($semesterId)
    {
        return $this->paymentModel->getPaymentsBySemesterId(Constants::$STUDENT_RECEIPT_TBL, $semesterId);
    }
}