<?php
function dd($arg)
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    die();
};
function d($arg)
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
};

require_once('./items/Kiwi.php');
require_once('./items/Nuts.php');
require_once('./items/Orange.php');
require_once('./items/Pepper.php');
require_once('./items/Potato.php');
require_once('./items/Raspberry.php');
require_once('./items/Salt.php');



class Product
{
    public string $name;
    public int $price;
    public bool $sellingByKg;

    public function __construct($name, $price, $sellingByKg)
    {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }
    public function getPrice(): int
    {

        return $this->price;
    }
}



class MarketStall
{
    public array $products;

    public function __construct(array $items)
    {
        $this->products = $items;
    }


    public function addProductToMarket($product)
    {

        $this->products[$product->name] = $product;
    }

    public function getItem($item, $amount)
    {
        if (array_key_exists($item, $this->products) === true) {
            return ['amount' => $amount, 'item' => $this->products[$item]];
        } else {
            return false;
        };
    }
};


class Cart
{
    public array $cartItems = [];

    public function addToCart($item)
    {
        array_push($this->cartItems, $item);
    }
    public function printReceipt()
    {
        $finalPrice = 0;
        if (empty($this->cartItems)) {
            return 'your card is empty';
        } else {
            foreach ($this->cartItems as $product) {
                $amount = $product['amount'];
                $amountString = '';
                if ($type = $product['item']->sellingByKg === true &&  $amount = 1) {
                    $amountString = "{$amount} kg";
                } elseif ($type = $product['item']->sellingByKg === true && $amount > 1) {
                    $amountString = "{$amount} kgs";
                } else {
                    $amountString = "{$amount} gunny sacks";
                }
                $price = $amount * $product['item']->price;
                echo "{$product['item']->name} | $amountString | total = $price <br>";
                $finalPrice += $product['item']->price;
                echo "$finalPrice <hr>";
            }
        }
    }
}





$orange = new Orange('Orange', 35, true);
$potato = new Potato('Potato', 240, false);
$nuts = new Nuts('Nuts', 850, true);
$kiwi = new Kiwi('Kiwi', 670, false);
$pepper = new Pepper('Pepper', 330, true);
$raspberry = new Raspberry('Raspberry', 555, false);
$salt = new Salt('Salt', 100, true);




$marketStall1 = new MarketStall(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);
$marketStall2 = new MarketStall(['kiwi' => $kiwi, 'pepper' => $pepper, 'raspberry' => $raspberry]);


$marketStall1->addProductToMarket($salt);

// d($marketStall1->products);

$cart = new Cart();

$cart->addToCart($marketStall1->getItem('orange', 3));
$cart->addToCart($marketStall1->getItem('potato', 2));
$cart->addToCart($marketStall1->getItem('nuts', 13));
$cart->addToCart($marketStall2->getItem('kiwi', 3));
$cart->addToCart($marketStall2->getItem('pepper', 1));
$cart->addToCart($marketStall2->getItem('raspberry', 8));


// d($cart->cartItems);




echo "<hr/>";


$cart->printReceipt();
