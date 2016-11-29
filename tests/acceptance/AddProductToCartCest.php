<?php
use \AcceptanceTester as AT;
use Page\Product as Product;

class AddProductToCartCest
{
    public function _before(AT $I)
    {
    }

    public function _after(AT $I)
    {
    }

    public function openHomepage(AT $I)
    {
        $I->am('Customer');
        $I->wantTo('See Home Page');

        $I->amGoingTo('Open Home page');
        $I->amOnPage('/');
        $I->waitForElement(Product::$pageLogo);
        $I->seeElement(Product::$pageLogo.' img');
    }
    public function addSimple(AT $I)
    {
        $I->wantTo('Add simple product to the cart');
        $I->amOnPage(Product::$simpleURL);
        $I->waitForElement(Product::$pageTitle); // wait and check product name
        $I->see(Product::$productName, Product::$pageTitle);

        $I->seeElement(Product::$breadcrumbs);
        $I->seeElement(Product::$simplePrice);
        $I->see('In stock', Product::$inStock);

        $I->seeElement(Product::$qty);
        $I->fillField(Product::$qty, 2); // change qty to 2

        $I->click(Product::$addCartBtn);//click on "add to cart" button

        $I->waitForElement(Product::$successMsg);
        $I->see('You added '.Product::$productName.' to your shopping cart.', Product::$successMsg);
        $I->waitForElementVisible(Product::$qtyCounter);
        $I->see(2, Product::$numberCounter);

        $I->wantTo('Open and check Shopping cart');
        $I->amOnPage(Product::$shoppingCartURL);
        $I->seeInCurrentUrl(Product::$shoppingCartURL);
        $I->waitForElement(Product::$pageTitle);
        $I->see('Shopping cart', Product::$pageTitle);

        $I->seeElement(Product::$cartItem);
        $I->seeInField(Product::$cartQtyFirstItem, 2);//check if qty = 2 for the first element in tbody

    }
    public function addConfigProduct(AT $I){
        $I->wantTo('Add Configurable product to the cart');
        $I->amOnPage(Product::$configurableURL);
        $I->waitForElement(Product::$pageTitle);
        $I->see(Product::$configProductName, Product::$pageTitle);

        $I->seeElement(Product::$breadcrumbs);
        $I->seeElement(Product::$configOptions);


        $I->click(Product::$colorOption);
        $I->click(Product::$sizeOption);
        $I->see(Product::$colorOptionName, Product::$colorOptionSelected);
        $I->see(Product::$sizeOptionName, Product::$sizeOptionSelected);
        $I->see('In stock',Product::$inStock);

        $I->click(Product::$addCartBtn);

        $I->waitForElement(Product::$successMsg);
        $I->see('You added '.Product::$configProductName.' to your shopping cart.', Product::$successMsg);
        $I->waitForElementVisible(Product::$qtyCounter);
        $I->see(1, Product::$numberCounter);


        $I->wantTo('Open and check Shopping cart');
        $I->amOnPage(Product::$shoppingCartURL);
        $I->seeInCurrentUrl(Product::$shoppingCartURL);
        $I->waitForElement(Product::$pageTitle);
        $I->see('Shopping cart', Product::$pageTitle);

        $I->seeElement(Product::$cartQtyFirstItem);
        $I->see(Product::$colorOptionName, Product::$cartProductOption);
        $I->see(Product::$sizeOptionName, Product::$cartProductOption);
    }
}
