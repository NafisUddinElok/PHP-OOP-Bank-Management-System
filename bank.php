class BankAccount{
    private $accountNumber;
    private $holderName;
    private $balance;

    public function __construct($accNo, $name, $initialBalance = 0){
        $this->accountNumber = $accNo;
        $this->holderName = $name;
        $this->balance = $initialBalance;
    }

    public function deposit($amount){
        if($amount > 0){
            $this->balance += $amount;
            echo " Deposited $amount. New Balance : $this->balance<br>";
        } else {
            echo " Invalid deposit amount. <br>";
        }
    }

    public function withdraw($amount){
        if($amount > 0 && $amount <= $this->balance){
            $this->balance = $amount ;
            echo " Withdrawn $amount. Remaining balance : $this->balance<br>";
        } else {
            echo " Invalid balance or invalid amount. <br>";
        }
    }

    public function checkBalance(){
        echo " Balance for {$this->holderName} (Acc : {$this->accountNumber}) is {$this->balance} taka<br>";
    }

    public function getInfor(){
        return [
            'number' => $this->accountNumber,
            'name' => $this->holderName,
            'balance'=> $this->balance
        ];
    }
}

$accounts = [];

$accounts[] = new BankAccount('1001', "Nafis", 5000);
$accounts[] = new BankAccount('1002', "Elok", 3000);

$accounts[0]->deposit(1000);
$accounts[1]->withdraw(500);

$accounts[0]->checkBalance();
$accounts[1]->checkBalance();

echo "<h2> All Accounts: </h2>";
foreach($accounts as $acc){
    $info = $acc->getInfo();
    echo "Account No: {$info['number']}, Name : {$info['name']}, Balance : {$info['balance']} <br>";
}