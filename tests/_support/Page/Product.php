<?php
namespace Page;

class Product
{
    // include url of current page
    public static $simpleURL = '/aim-analog-watch.html';
    public static $configurableURL = '/deirdre-relaxed-fit-capri.html';
    public static $shoppingCartURL = '/checkout/cart/';

    public static $pageLogo = 'header.page-header strong.logo';
    public static $successMsg = 'div.message-success';
    public static $qtyCounter = 'span.counter.qty';
    public static $numberCounter = 'span.counter-number';

    public static $pageTitle = 'h1.page-title';
    public static $productName = 'Aim Analog Watch';
    public static $breadcrumbs = 'div.breadcrumbs';
    public static $simplePrice = '#product-price-36';
    public static $inStock = 'div.stock.available';
    public static $qty = '#qty';
    public static $addCartBtn = '#product-addtocart-button';

    public static $configProductName = 'Deirdre Relaxed-Fit Capri';
    public static $configOptions = '#product-options-wrapper';
    public static $colorOption = '//*[@id="product-options-wrapper"]/div/div/div[1]/div/div[1]'; //blue
    public static $colorOptionName = 'Blue';
    public static $colorOptionSelected = 'div.swatch-attribute.color span.swatch-attribute-selected-option';
    public static $sizeOption = '//*[@id="product-options-wrapper"]/div/div/div[2]/div/div[2]';
    public static $sizeOptionName = '29';
    public static $sizeOptionSelected = 'div.swatch-attribute.size  span.swatch-attribute-selected-option';

    public static $cartItem = 'tbody.cart.item';
    public static $cartQtyFirstItem = '//*[@id="shopping-cart-table"]/tbody/tr[1]/td[3]/div/div/input';
    public static $cartProductOption = '#shopping-cart-table  tbody.cart.ite,  tr.item-info  td.col.item   dl.item-options dd';




}
