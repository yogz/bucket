<?php
class Default_Model_Users
{
    protected $_idUsr;
	protected $_statusUsr;
    protected $_emailUsr;
    protected $_pwdUsr;
    protected $_ftnameUsr;
    protected $_ltnameUsr;
    protected $_nickUsr;
    protected $_dobUsr;
    protected $_phoneUsr;
    protected $_cityUsr;
    protected $_addressUsr;
    protected $_zipUsr;
    protected $_createdUsr;
    protected $_updatedUsr;
    protected $_deletedUsr;
    protected $_lastUsr;
    protected $_mapperUsr;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid users property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid users property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setIdUsr($idUsr) {
    	$this->_idUsr = (int) $idUsr;
        return $this;
    }
    
    public function getIdUsr() {
    	return $this->_idUsr;
    }
    
    public function setStatusUsr($statusUsr) {
    	$this->_statusUsr = (string) $statusUsr;
        return $this;
    }
    
    public function getStatusUsr() {
    	return $this->_statusUsr;
    }
    
    public function setEmailUsr($emailUsr) {
    	$this->_emailUsr = (string) $emailUsr;
        return $this;
    }
    
    public function getEmailUsr() {
    	return $this->_emailUsr;
    }
    
    public function setPwdUsr($pwdUsr) {
    	$this->_pwdUsr = (string) $pwdUsr;
        return $this;
    }
    
    public function getPwdUsr() {
    	return $this->_pwdUsr;
    }
    
    public function setFtnameUsr($ftnameUsr) {
    	$this->_ftnameUsr = (string) $ftnameUsr;
        return $this;
    }
    
    public function getFtnameUsr() {
		return $this->_ftnameUsr;    	
    }
    
    public function setLtnameUsr($ltnameUsr) {
    	$this->_ltnameUsr = (string) $ltnameUsr;
        return $this;
    }
    
    public function getLtnameUsr() {
    	return $this->_ltnameUsr;
    }
    
    public function setNickUsr($nickUsr) {
    	$this->_nickUsr = (string) $nickUsr;
        return $this;
    }
    
    public function getNickUsr() {
    	return $this->_nickUsr;
    }
    
    public function setDobUsr($dobUsr) {
    	$this->_dobUsr = $dobUsr;
        return $this;
    }
    
    public function getDobUsr() {
    	return $this->_dobUsr;
    }
    
    public function setPhoneUsr($phoneUsr) {
    	$this->_phoneUsr = (string) $phoneUsr;
        return $this;
    }
    
    public function getPhoneUsr() {
    	return $this->_phoneUsr;
    }
    
    public function setCityUsr($cityUsr) {
    	$this->_cityUsr = (string) $cityUsr;
        return $this;
    }
    
    public function getCityUsr() {
    	return $this->_cityUsr;
    }
    
    public function setAddressUsr($addressUsr) {
    	$this->_addressUsr = (string) $addressUsr;
        return $this;
    }
    
    public function getAddressUsr() {
    	return $this->_addressUsr;
    }
    
    public function setZipUsr($zipUsr) {
    	$this->_zipUsr = (int) $zipUsr;
        return $this;
    }
    
    public function getZipUsr() {
    	return $this->_zipUsr;
    }
    
    public function setCreatedUsr($createdUsr) {
    	$this->_createdUsr = $createdUsr;
        return $this;
    }
    
    public function getCreatedUsr() {
    	return $this->_createdUsr;
    }
    
    public function setUpdatedUsr($updatedUsr) {
    	$this->_updatedUsr = $updatedUsr;
        return $this;
    }
    
    public function getUpdatedUsr() {
    	return $this->_updatedUsr;
    }
    
    public function setDeletedUsr($deletedUsr) {
    	$this->_deletedUsr = $deletedUsr;
        return $this;
    }
    
    public function getDeletedUsr() {
    	return $this->_deletedUsr;
    }
    
    public function setLastUsr($lastUsr) {
    	$this->_lastUsr = $lastUsr;
        return $this;
    }
    
    public function getLastUsr() {
    	return $this->_lastUsr;
    }

    public function setMapperUsr($mapperUsr)
    {
        $this->_mapperUsr = $mapperUsr;
        return $this;
    }

    public function getMapperUsr()
    {
        if (null === $this->_mapperUsr) {
            $this->setMapperUsr(new Default_Model_UsersMapper());
        }
        return $this->_mapperUsr;
    }

    public function save()
    {
        $this->getMapperUsr()->save($this);
    }

    public function find($id)
    {
        $this->getMapperUsr()->find($id, $this);
        return $this;
    }

    public function fetchAll()
    {
        return $this->getMapperUsr()->fetchAll();
    }
}
