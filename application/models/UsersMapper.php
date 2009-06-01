<?php

class Default_Model_UsersMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Default_Model_DbTable_Users');
        }
        return $this->_dbTable;
    }

    public function save(Default_Model_Users $users)
    {
        $data = array(
        	'statusUsr'  => $users->getStatusUsr(),
            'emailUsr'   => $users->getEmailUsr(),
            'pwdUsr'     => $users->getPwdUsr(),
            'ftnameUsr'  => $users->getFtnameUsr(),
            'ltnameUsr'  => $users->getLtnameUsr(),
            'nickUsr'    => $users->getNickUsr(),
            'dobUsr'     => $users->getDobUsr(),
            'phoneUsr'   => $users->getPhoneUsr(),
            'cityUsr'    => $users->getCityUsr(),
            'addressUsr' => $users->getAddressUsr(),
            'zipUsr'     => $users->getZipUsr(),
            'updatedUsr' => date('Y-m-d H:i:s'),
        	'deletedUsr' => $users->getDeletedUsr(),
            'lastUsr'    => $users->getLastUsr(),
        );

        if (null === ($idUsr = $users->getIdUsr())) {
            unset($data['idUsr']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idUsr = ?' => $idUsr));
        }
    }

    public function find($idUsr, Default_Model_Users $users)
    {
        $result = $this->getDbTable()->find($idUsr);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $users->setIdUsr($row->idUsr)
                  ->setStatusUsr($row->statusUsr)
                  ->setEmailUsr($row->emailUsr)
                  ->setPwdUsr($row->pwdUsr)
                  ->setFtnameUsr($row->ftnameUsr)
                  ->setLtnameUsr($row->ltnameUsr)
                  ->setNickUsr($row->nickUsr)
                  ->setDobUsr($row->dobUsr)
                  ->setPhoneUsr($row->phoneUsr)
                  ->setCityUsr($row->cityUsr)
                  ->setAddressUsr($row->addressUsr)
                  ->setZipUsr($row->zipUsr)
                  ->setCreatedUsr($row->createdUsr)
                  ->setUpdatedUsr($row->updatedUsr)
                  ->setDeletedUsr($row->deletedUsr)
                  ->setLastUsr($row->lastUsr);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Default_Model_Users();
            $entry->setIdUsr($row->idUsr)
                  ->setStatusUsr($row->statusUsr)
                  ->setEmailUsr($row->emailUsr)
                  ->setPwdUsr($row->pwdUsr)
                  ->setFtnameUsr($row->ftnameUsr)
                  ->setLtnameUsr($row->ltnameUsr)
                  ->setNickUsr($row->nickUsr)
                  ->setDobUsr($row->dobUsr)
                  ->setPhoneUsr($row->phoneUsr)
                  ->setCityUsr($row->cityUsr)
                  ->setAddressUsr($row->addressUsr)
                  ->setZipUsr($row->zipUsr)
                  ->setCreatedUsr($row->createdUsr)
                  ->setUpdatedUsr($row->updatedUsr)
                  ->setDeletedUsr($row->deletedUsr)
                  ->setLastUsr($row->lastUsr)
                  ->setMapperUsr($this);
            $entries[] = $entry;
        }
        return $entries;
    }
}