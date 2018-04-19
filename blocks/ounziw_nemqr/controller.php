<?php
namespace Concrete\Package\OunziwNemqr\Block\OunziwNemqr;

use Concrete\Core\Block\BlockController;
use Concrete\Core\Package\Package;


class Controller extends BlockController
{
    protected $btTable = 'btOunziwNemqr';
    protected $btInterfaceWidth = "360";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "400";
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;

    public function getBlockTypeDescription()
    {
        return t('Creates NEM QR Code');
    }

    public function getBlockTypeName()
    {
        return t("NEM QR");
    }
    public function view()
    {
        $pkg = Package::getByHandle('qr_code');
        if (is_object($pkg)) {
            $vendorPath = $pkg->getPackagePath() . '/vendor/';
            require_once $vendorPath . '/autoload.php';

            if ($this->wallet && $this->amount) {
                $nemdata = json_encode(array(
                    'v' => 2,
                    'type' => 2,
                    'data' => array(
                        'addr' => str_replace('-','',$this->wallet),
                        'amount' => intval(1000000 * $this->amount),
                        'msg' => $this->message,
                        'name' => 'ounziw_nemqr',
                    )
                ));

                if (!$this->size) {
                    $this->size = 250;
                }
                if (!$this->padding) {
                    $this->padding = 10;
                }
                $qrCode = new \Endroid\QrCode\QrCode();
                $qrCode
                    ->setText($nemdata)
                    ->setSize($this->size)
                    ->setPadding($this->padding);

                $this->set('qrCode', $qrCode);

                $alt = $this->amount . ' XEM';
                $this->set('alt', $alt);
            }
        } else {
            \Log::addEntry("Package qr_code seems not exist.");
        }
    }
}