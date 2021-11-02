# Magento 2 Module Lofmp FacebookLiveChat

    ``landofcoder/module-seller-facebooklivechat``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)

* Note: 
This module is an addon for [Magento 2 Multi-Vendor Marketplace](https://landofcoder.com/magento-2-marketplace-extension.html/)

## DEMO Addon
[Check DEMO](https://magento2.landofcoder.com/index.php/seller/andyhoanghuu.html)

## Main Functionalities
Magento 2 marketplace multi vendor facebook live chat for seller

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Lofmp`
 - Enable the module by running `php bin/magento module:enable Lofmp_FacebookLiveChat`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require landofcoder/module-seller-facebooklivechat`
 - enable the module by running `php bin/magento module:enable Lofmp_FacebookLiveChat`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

- Enable module in admin > Stores > Configuration > Landofcoder Extensions > Seller Facebook Live Chat
- Admin manage seller facebook live chat: Admin > Marketplace > Seller Facebook Live Chat > Facebook Live Chat
- Seller should Get the seller facebook fanpage id 
- Seller login on his panel, then go to > Facebook Live Chat > Facebook Chat then input there information:
+ Facebook Page Id: Id of the fanpage
+ Logged In Greeting: Welcome text for logged in user
+ Logged Out Greeting: Welcome text for guest
+ Theme Color: Input hexa color code, example: #44bec7
+ Status: Enable/Disable feature on seller page

- Frontend will show facebook chat box on seller detail page, and seller's product detail page.


## Specifications

 - Block
	- FacebookChat > facebookchat.phtml

 - GraphQl Endpoint
	- GetSellerFacebookChat

 - Model
	- Sellerfacebook


## Attributes



