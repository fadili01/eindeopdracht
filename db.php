<?php
class Database{
    public $pdo;
 
    public function __construct($db = "auto_winkel", $user ="root", $pwd="", $host="localhost:3307") {
 
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
 
        }

        public function addCar($merk, $model, $jaar, $kenteken, $beschikbaarheid, $foto)
        {
            $stmt = $this->pdo->prepare("INSERT INTO auto (merk, model, jaar, kenteken, beschikbaarheid, foto) VALUES (?, ?, ?, ?, ?, ?)");
        
            // Bind parameters
            $stmt->bindParam(1, $merk);
            $stmt->bindParam(2, $model);
            $stmt->bindParam(3, $jaar);
            $stmt->bindParam(4, $kenteken);
            $stmt->bindParam(5, $beschikbaarheid);
            $stmt->bindParam(6, $foto);
        
            // Execute the statement
            $stmt->execute();
        }

        public function addklant($naam, $achternaam, $geboortedatum, $email, $wachtwoord)
{
    $stmt = $this->pdo->prepare("INSERT INTO klant (naam, achternaam, geboortedatum, email, wachtwoord) VALUES (?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bindParam(1, $naam);
    $stmt->bindParam(2, $achternaam);
    $stmt->bindParam(3, $geboortedatum);
    $stmt->bindParam(4, $email);
    $stmt->bindParam(5, $wachtwoord);
    
    // Execute the statement
    $stmt->execute();
}
public function selectAllklanten() : array {
  $stmt = $this->pdo->query("SELECT * FROM klant");
  $result = $stmt->fetchAll();
  return $result; 
}

        public function aanmelden($naam, $achternaam, $geboortedatum, $email, $password) {
          $stmt = $this->pdo->prepare("INSERT INTO klant (naam,achternaam,geboortedatum,email,wachtwoord) values (?,?,?,?,?)");
          $stmt->execute([$naam, $achternaam, $geboortedatum, $email, $password]);
      } 
      public function login($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM klant where email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }       
 
    public function loginadmin($email) {
      $stmt = $this->pdo->prepare("SELECT * FROM admins where email = ?");
      $stmt->execute([$email]);
      $result = $stmt->fetch();
      return $result;
  } 
  public function addadmin(string $naam, string $achternaam, string $email, string $wachtwoord) {
    $stmt = $this->pdo->prepare("INSERT INTO admins (naam, achternaam, email, wachtwoord) VALUES (?, ?, ?, ?)");
    
    // Hash the password using password_hash
    $hashedPassword = password_hash($wachtwoord, PASSWORD_BCRYPT);

    // Bind parameters
    $stmt->bindParam(1, $naam);
    $stmt->bindParam(2, $achternaam);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $hashedPassword); // Bind the hashed password
    
    // Execute the statement
    $stmt->execute();
}

public function selectAllcars() : array {
    $stmt = $this->pdo->query("SELECT * FROM auto");
    $result = $stmt->fetchAll();
    return $result; 
}
// Database.php
public function updateUser(string $merk, string $model, int $jaar, string $kenteken, int $beschikbaarheid, int $id) {
  $stmt = $this->pdo->prepare("UPDATE auto SET Merk = ?, Model = ?, Jaar = ?, Kenteken = ?, Beschikbaarheid = ? WHERE AutoID = ?");
  $stmt->execute([$merk, $model, $jaar, $kenteken, $beschikbaarheid, $id]);
}


public function deleteUser(int $autoID) {
  $stmt = $this->pdo->prepare("DELETE FROM auto WHERE AutoID = ?");
  $stmt->execute([$autoID]);
}


public function upload($file) {
  $stmt = $this->pdo->prepare("INSERT INTO foto (photo) values (?)");
  $stmt->execute([$file]);
}
public function getAllCars()
    {
        $stmt = $this->pdo->query("SELECT * FROM auto");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateklant(string $naam, string $achternaam, string $geboortedatum, string $email, string $wachtwoord,  int $id) {
      $stmt = $this->pdo->prepare("UPDATE klant SET naam = ?, achternaam = ?, geboortedatum = ?, email = ?, wachtwoord = ? WHERE klantID = ?");
      $stmt->execute([$naam, $achternaam, $geboortedatum, $email, $wachtwoord, $id]);
    }
    
    public function deleteklant(int $klantID) {
      $stmt = $this->pdo->prepare("DELETE FROM klant WHERE klantID = ?");
      $stmt->execute([$klantID]);
    }
    

    

            
            
 
          
            public function getCarByID($autoID) {
              try {
                  $sql = "SELECT * FROM auto WHERE AutoID = ?";
                  $stmt = $this->pdo->prepare($sql);
                  $stmt->bindParam(1, $autoID, PDO::PARAM_INT);
                  $stmt->execute();
                  $car = $stmt->fetch(PDO::FETCH_ASSOC);
                  $stmt->closeCursor();
      
                  return $car;
              } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                  return null;
              }
          }
      
          public function insertReservation($autoID, $start_date, $end_date, $costs) {
            try {
                $sql = "INSERT INTO verhuring (AutoID, Verhuurdatum, KlantID, HuurperiodeInDagen, Kosten) VALUES (?, NOW(), NULL, DATEDIFF(?, ?), ?)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(1, $autoID, PDO::PARAM_INT);
                $stmt->bindParam(2, $end_date, PDO::PARAM_STR);
                $stmt->bindParam(3, $start_date, PDO::PARAM_STR);
                $stmt->bindParam(4, $costs, PDO::PARAM_STR);
        
                return $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        
}
?>