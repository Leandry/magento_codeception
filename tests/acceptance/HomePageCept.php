<?php 
$I = new AcceptanceTester($scenario);
$I->am('Customer');
$I->wantTo('Open home page');
$I->amOnPage('/');
$I->wantTo('See logo');
$I->waitForElement('header.page-header strong.logo'); // #1 - logo
$I->seeElement('header.page-header strong.logo img');

$I->seeElement('header.page-header div.panel.header'); // #2 - header panel
$I->see('Sign In', 'header.page-header div.panel.header li.authorization-link a');

$I->seeElement('#search'); // #3 - search input
$I->fillField('#search', 'Atwix test');
$I->seeInField('#search', 'Atwix test');

$I->seeElement('#store.menu'); // #4 - Navigation menu
$I->cantSeeElement('a#ui-id-27'); // #5 - Element in navigation menu
$I->moveMouseOver('#ui-id-6');
$I->waitForElementVisible('a#ui-id-27');
$I->canSeeElement('a#ui-id-27');

$I->seeElement('div.block-promo-wrapper');

$I->seeElement('div.block.widget.block-products-list.grid');

$I->seeElement('footer.page-footer'); // #6 Footer
$I->see('Copyright © 2016 Magento. All rights reserved.', 'small.copyright');

$I->fillField('#newsletter', 'leandry@atwix.com'); // #7 Newsletter
$I->click('form#newsletter-validate-detail button.action.subscribe.primary');
$I->waitForElementVisible('#maincontent div.messages div.message-success');
$I->see('Thank you for your subscription.', '#maincontent div.messages div.message-success');