<?php
namespace Concrete\Package\OunziwNemqr;

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Package\Package;
use Concrete\Core\Block\BlockType\BlockType;

class Controller extends Package {
    protected $pkgHandle = 'ounziw_nemqr';
    protected $appVersionRequired = '8.3.2';
    protected $pkgVersion = '0.8';

    public function getPackageName()
    {
        return t('NEM QR Code');
    }

    public function getPackageDescription()
    {
        return t('Creates NEM QR Code');
    }

    public function install()
    {
        $QrCodePkg = Package::getByHandle('qr_code');
        if (!is_object($QrCodePkg)) {
            throw new \Exception(t('Installation requires a <a href="%s" target="_blank">Remo QR Code</a> addon.', 'http://www.concrete5.org/marketplace/addons/qr-code1'));
        } else {
            $pkg = parent::install();
            BlockType::installBlockType('ounziw_nemqr', $pkg);

        }
    }

}