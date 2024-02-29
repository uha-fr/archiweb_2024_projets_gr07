<?php
namespace webapp\model;
class AccountModel extends Model{
    
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $username;
    protected $address;
    protected $country_id;
    protected $user_type_id;


    public function __construct() {
        parent::__construct();

        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->password = '';
        $this->username = '';
        $this->address = '';
        $this->country_id = -1;
        $this->user_type_id = -1;

    }
    protected static function getTableName() {
        return 'user'; 
    }
    public function setFirstName($firstname) {
        $this->firstname = $firstname;
    }
    public function setLastName($lastname) {
        $this->lastname = $lastname;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setAddress($address) {
        $this->address = $address;
    }
    public function setUserName($username) {
        $this->username = $username;
    }
    public function setCountryID($country_id) {
        $this->country_id = $country_id;
    }
    public function setUserTypeID($user_type_id) {
        $this->user_type_id = $user_type_id;
    } 
    public function getPassword() {
      return  $this->password;
    } 

    public static function startSession() {
        session_start();
    }
    public static function storeUserInSession($user_id) {
        $_SESSION['user_id'] = $user_id;
    }
    public static function getUserIdFromSession() {
        return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    }
   function submitLogin($post){
        $email = $post['email']; 
        $password = $post['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $data = AccountModel::select("*")
        ->where('email','=',$email)
        ->get()[0];
        $passBDD = null;

        if ($data) {
            $user = new AccountModel();
            $user->setPropertiesFromData($data);
            $passBDD  = $user->getPassword();
        }
        if (password_verify($password, $passBDD)) {
            $user = $this::getByID($data['id']);
            $user_id = $data['id'];
            AccountModel::storeUserInSession($user_id);
            return $user ;
        } 
        else {
            echo "Mot de passe incorrect. Veuillez réessayer.";
            return null;
        }
   }
   function submitSignup($post){

       $firstname = $post['prenom'];
       $lastname = $post['nom'];
       $username = $post['username'];
       $email = $post['email'];
       $address = $post['address'];
       $password = $post['password'];
       $country = $post['country'];
       $user_type = $post['usertype'];
   
   
       $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       $country_id = CountryModel::getCountry($country);
       $user_type_id = USerTypeModel::getUserType($user_type);
       $this->setFirstName($firstname);
       $this->setLastName($lastname);
       $this->setPassword($hashed_password);
       $this->setUserName($username);
       $this->setAddress($address);
       $this->setEmail($email);
       $this->setCountryId($country_id);
       $this->setUserTypeId($user_type_id);
       $this->save();
   
   }

}

?>