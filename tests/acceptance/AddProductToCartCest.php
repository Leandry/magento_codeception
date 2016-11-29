<?php
use \AcceptanceTester as AT;

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
        $I->waitForElement('header.page-header strong.logo');
        $I->seeElement('header.page-header strong.logo img');
    }
    public function addSimple(AT $I)
    {
        $I->wantTo('Add simple product to the cart');
        $I->amOnPage('/aim-analog-watch.html');//open product page
        $I->waitForElement('h1.page-title'); // wait and check product name
        $I->see('Aim Analog Watch', 'h1.page-title');

        $I->seeElement('div.breadcrumbs'); //breadcrumbs
        $I->seeElement('#product-price-36');//product price
        $I->see('In stock','div.stock.available');//In stock

        $I->seeElement('#qty');//Qty input
        $I->fillField('#qty', 2); // change qty to 2

        $I->click('#product-addtocart-button');//click on "add to cart" button

        $I->waitForElement('div.message-success');
        $I->see('You added Aim Analog Watch to your shopping cart.', 'div.message-success');
        $I->waitForElementVisible('span.counter.qty');
        $I->see(2, 'span.counter-number');

        $I->wantTo('Open and checkShopping cart');
        $I->amOnPage('/checkout/cart/');//open product page
        $I->seeInCurrentUrl('/checkout/cart/');
        $I->waitForElement('h1.page-title');
        $I->see('Shopping cart', 'h1.page-title');

        $I->seeElement('tbody.cart.item');
        $I->seeInField('//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/input', 2);//check if qty = 2 for the first element in tbody

    }
    public function addConfigProduct(AT $I){
        $I->wantTo('Add Configurable product to the cart');
        $I->amOnPage('/deirdre-relaxed-fit-capri.html');//open product page
        $I->waitForElement('h1.page-title'); // wait and check product name
        $I->see('Deirdre Relaxed-Fit Capri', 'h1.page-title');

        $I->seeElement('div.breadcrumbs'); //breadcrumbs
        $I->seeElement('#product-options-wrapper');


        $I->click('//*[@id="product-options-wrapper"]/div/div/div[1]/div/div[1]');
        $I->click('//*[@id="product-options-wrapper"]/div/div/div[2]/div/div[2]');
        $I->see('Blue', 'div.swatch-attribute.color span.swatch-attribute-selected-option');
        $I->see('29', 'div.swatch-attribute.size  span.swatch-attribute-selected-option');
        $I->see('In stock','div.stock.available');//In stock

        $I->click('#product-addtocart-button');//click on "add to cart" button

        $I->waitForElement('div.message-success');
        $I->see('You added Deirdre Relaxed-Fit Capri to your shopping cart.', 'div.message-success');
        $I->waitForElementVisible('span.counter.qty');
        $I->see(1, 'span.counter-number');


        $I->wantTo('Open and checkShopping cart');
        $I->amOnPage('/checkout/cart/');//open product page
        $I->seeInCurrentUrl('/checkout/cart/');
        $I->waitForElement('h1.page-title');
        $I->see('Shopping cart', 'h1.page-title');

        $I->seeElement('tbody.cart.item');
        $I->see('Blue', '#shopping-cart-table  tbody.cart.ite,  tr.item-info  td.col.item   dl.item-options dd');
        $I->see('29', '#shopping-cart-table  tbody.cart.ite,  tr.item-info  td.col.item   dl.item-options dd');
    }
}
