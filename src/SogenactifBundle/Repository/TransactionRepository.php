<?php

namespace SogenactifBundle\Repository;

use SogenactifBundle\Entity\Transaction;

/**
 * TransactionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TransactionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * This function hydrate Transaction object with response data from Sogenactif Api
     * It is called from TransactionController, responseAction
     *
     * @param Transaction $transaction
     * @param $array
     * @return Transaction
     */
    public function update(Transaction $transaction, $array){

        $transaction->setAuthorisationId($array[13]);
        $transaction->setBankResponseCode($array[18]);
        $transaction->setCaddie($array[22]);
        $transaction->setCaptureDay($array[30]);
        $transaction->setCaptureMode($array[31]);
        $transaction->setCardNumber($array[15]);
        $transaction->setCardValidity($array[36]);
        $transaction->setCode($array[1]);
        $transaction->setComplementaryCode($array[19]);
        $transaction->setComplementaryInfo($array[20]);
        $transaction->setCustomerIpAddress($array[29]);
        $transaction->setCvvFlag($array[16]);
        $transaction->setCvvResponseCode($array[17]);
        $transaction->setData($array[32]);
        $transaction->setError($array[2]);
        $transaction->setLanguage($array[25]);
        $transaction->setMerchantCountry($array[4]);
        $transaction->setMerchantId($array[3]);
        $transaction->setMerchantLanguage($array[24]);
        $transaction->setOrderId($array[27]);
        $transaction->setOrderValidity($array[33]);
        $transaction->setPaymentCertificate($array[12]);
        if('' === $array[10]){
            $transaction->setPaymentDate(new \DateTime());
        }else{
            $transaction->setPaymentDate(\DateTime::createFromFormat('Ymd', $array[10]));
        }
        $transaction->setPaymentMeans($array[7]);
        $transaction->setReceiptComplement($array[23]);
        $transaction->setResponseCode($array[11]);
        $transaction->setReturnContext($array[21]);
        $transaction->setScoreColor($array[38]);
        $transaction->setScoreInfo($array[39]);
        $transaction->setScoreProfile($array[41]);
        $transaction->setScoreThreshold($array[40]);
        $transaction->setScoreValue($array[37]);
        $transaction->setStatementReference($array[35]);
        $transaction->setTransactionCondition($array[34]);
        $transaction->setTransmissionDate(\DateTime::createFromFormat('YmdHis', $array[8]));
        $transaction->setUpdated(new \DateTime());

        return $transaction;
    }
}
