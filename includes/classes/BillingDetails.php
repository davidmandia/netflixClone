<?php
class BillingDetails
{
    public static function insertDetails($con, $agreement, $token, $username)
    {
        $query = $con->prepare("INSERT INTO billingdetails (agreementId, nextBillingDate, token, username)
                                VALUES(:agreementId, :nextBillingDate, :token, :username)");

        $agreementDetails = $agreement->getAgreementDetails();

        $query->bindValue(":agreementId", $agreement->getId());
        $query->bindValue(":nextBillingdate", $agreementDetails->getNextBillingDate());
        $query->bindValue(":token", $token);
        $query->bindValue(":username", $username);

        echo "\nPDOStatement::errorInfo():\n";
        $arr = $con->errorInfo();
        print_r($arr);

        return $query->execute();
    }
}
